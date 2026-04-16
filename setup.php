<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Setup - Criar Banco de Dados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .message {
            padding: 15px;
            margin: 20px 0;
            border-radius: 3px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
        .info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
            padding: 15px;
            border-radius: 3px;
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>🔧 Setup - Banco de Dados</h1>
    
    <div class="info">
        <strong>ℹ️ Informações:</strong><br>
        Este script irá criar o banco de dados <strong>loja_simples</strong> com as tabelas necessárias.
    </div>

    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'loja_simples';

    // Conectar sem especificar banco
    $conn = mysqli_connect($host, $user, $pass);

    if (!$conn) {
        echo '<div class="message error">❌ Erro ao conectar ao MySQL: ' . mysqli_connect_error() . '</div>';
        exit;
    }

    // Verificar se o banco já existe
    $checkDb = mysqli_query($conn, "SHOW DATABASES LIKE '$db'");
    
    if (mysqli_num_rows($checkDb) > 0) {
        echo '<div class="message success">✅ Banco de dados já existe!</div>';
    } else {
        // Criar banco de dados
        $sql = "CREATE DATABASE IF NOT EXISTS $db";
        if (mysqli_query($conn, $sql)) {
            echo '<div class="message success">✅ Banco de dados criado com sucesso!</div>';
        } else {
            echo '<div class="message error">❌ Erro ao criar banco: ' . mysqli_error($conn) . '</div>';
            exit;
        }
    }

    // Selecionar banco
    mysqli_select_db($conn, $db);

    // Criar tabelas
    $sql_categorias = "CREATE TABLE IF NOT EXISTS categorias (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(100) NOT NULL UNIQUE,
        data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $sql_produtos = "CREATE TABLE IF NOT EXISTS produtos (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(100) NOT NULL,
        preco DECIMAL(10, 2) NOT NULL,
        categoria_id INT,
        data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (categoria_id) REFERENCES categorias(id)
    )";

    if (mysqli_query($conn, $sql_categorias) && mysqli_query($conn, $sql_produtos)) {
        echo '<div class="message success">✅ Tabelas criadas com sucesso!</div>';
        echo '<div class="info">
            <strong>✨ Setup concluído!</strong><br>
            Você pode agora acessar: <a href="index.html" style="color: #0056b3; font-weight: bold;">index.html</a><br>
            O banco está pronto para usar!
        </div>';
    } else {
        echo '<div class="message error">❌ Erro ao criar tabelas: ' . mysqli_error($conn) . '</div>';
    }

    mysqli_close($conn);
    ?>

</div>

</body>
</html>
