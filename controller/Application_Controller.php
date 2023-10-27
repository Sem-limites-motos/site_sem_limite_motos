<?php 

namespace Application_Controller; 


global $conn;

class Application_Controller{

    private $nome, $cpf, $endereco;

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
}

?>