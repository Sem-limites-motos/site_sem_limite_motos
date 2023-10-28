<?php 

namespace Application_Controller; 


global $conn;

class Application_Controller{

    private $nome, $cpf, $endereco, $voucher, $valor_total_carrinho, $senha ,$gmail;

    public function Cadastrar($nome ,$cpf,$endereco, $gmail){
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->endereco = $endereco;
        $this->gmail = $gmail;


        require "../sql/db_conexao.php";

        $sql = "INSERT INTO cadastro(nome, cpf, endereco, gmail) VALUES ('$nome','$cpf','$endereco','$gmail')";
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
            $porcentagemDesconto = 90;

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


    public function Logar($gmail, $senha){

        $this->gmail = $gmail;
        $this->senha = $senha;

        require "../sql/db_conexao.php";

                $gmail = $conn->real_escape_string($gmail);
                $senha = $conn->real_escape_string($senha);
          
                $sql = "SELECT * FROM cadastro WHERE gmail ='$gmail'  AND cpf ='$senha'";
          
                $sql_query = $conn->query($sql) or die("Falha ao se conectar". $conn->error);
          
                $quantidade = $sql_query->num_rows;
                if($quantidade == 1){
          
                    $usuario = $sql_query->fetch_assoc();
          
                    if(!isset($_SESSION)){
                        session_start();
                    }
                    $_SESSION['idcadastro'] = $usuario['idcadastro'];
                    $_SESSION['nome'] = $usuario['nome'];
                    $_SESSION['cpf'] = $usuario['cpf'];
                    $_SESSION['endereco'] = $usuario['endereco'];
                    $_SESSION['gmail'] = $usuario['gmail'];
          
                    
                    session_write_close();
          
                    header('Location:../index.html');
          
                }else{
                  //   echo "Falha ao logar! E-mail ou senha incorretos";
                    header('Location:../tela_de_erro.html');
          
                }
                mysqli_close($conn);
                
    }
}

?>