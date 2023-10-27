<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Carregamento com Redirecionamento</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }

        .loader {
            width: 100px;
            height: 100px;
            border: 10px solid transparent;
            border-top: 10px solid #3498db;
            border-radius: 50%;
            animation: spin 2s linear infinite;
            display: inline-block;
        }

        .loader-inner {
            width: 80px;
            height: 80px;
            border: 10px solid transparent;
            border-top: 10px solid #f4f4f4;
            border-radius: 50%;
            position: relative;
            top: 10px;
            left: 10px;
            animation: spin 2s linear reverse infinite;
        }

        .message {
            display: none;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="loader"></div>
    <div class="message" id="success-message">
        Dados Cadastrados com Sucesso
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.loader').style.display = 'none'; // Oculta o loader
            document.getElementById('success-message').style.display = 'block'; // Exibe a mensagem
            setTimeout(function() {
                // Redireciona para outra página após 3 segundos
                window.location.href = '../cadastro.html';
            }, 3000);
        }, 3000); // Espera 3 segundos antes de exibir a mensagem
    </script>
</body>
</html>
