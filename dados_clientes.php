<?php  

include("./sql/db_conexao.php");

session_start();

$gmail = $_SESSION['gmail'];

 $sql = "SELECT * FROM cadastro WHERE gmail = '$gmail' ";
 $result = $conn->query($sql);
 $obj = mysqli_fetch_assoc($result);



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Informações do Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .info-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }

        .info-container h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .info-container p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="info-container">
        <h2>Informações do Cliente</h2>
        <p><strong>Nome:</strong> <?php echo $obj['nome'] ?></p>
        <p><strong>CPF:</strong> <?php echo $obj['cpf'] ?></p>
        <p><strong>Gmail:</strong><?php echo $obj['gmail'] ?></p>
        <p><strong>Endereço:</strong> <?php echo $obj['endereco'] ?></p>
    </div>
</body>
</html>
