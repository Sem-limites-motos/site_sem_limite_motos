<?php 

namespace Application_Controller; 


global $conn;

class Application_Controller{

    private $nome, $cpf, $endereco, $voucher, $valor_total_carrinho;

    public function Cadastrar($nome ,$cpf,$endereco){
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->endereco = $endereco;

        require "../sql/db_conexao.php";

        $sql = "INSERT INTO cadastro(nome, cpf, endereco) VALUES ('$nome','$cpf','$endereco')";
        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";

        header('Location:../tela_carregamento/cadastro.php');
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    

    } 

    public function Voucher($voucher, $valor_total_carrinho){
        $this->voucher = $voucher;
        $this->valor_total_carrinho = $valor_total_carrinho;

        require "../sql/db_conexao.php";


        
        $sql = "SELECT * FROM voucher WHERE idvoucher = 1 ";
        $result = $conn->query($sql);
        $obj = mysqli_fetch_assoc($result);

        if($obj["nome"] == $voucher){

            // Valor original
            $valorOriginal = $valor_total_carrinho;

            // Porcentagem de desconto
            $porcentagemDesconto = 10;

            // Cálculo do desconto (valor - (valor * porcentagem / 100))
            $desconto = $valorOriginal * ($porcentagemDesconto / 100);

            // Valor final após o desconto
            $valorFinal = $valorOriginal - $desconto;

            echo "O desconto de $porcentagemDesconto% aplicado a $$valorOriginal é: R$$desconto<br>";
            echo "O valor final após o desconto é: $$valorFinal";

            // print("Você recebeu um desconto de 10%");
        }else{
            print("Voucher Invalido");
        }


    }
}

?>