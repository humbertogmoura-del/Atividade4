<?php
// Configurações do banco de dados
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'loja_simples';

// Conectar ao banco de dados
$conn = mysqli_connect($host, $user, $pass, $db);

// Verificar conexão
if (!$conn) {
    die('Erro de conexão: ' . mysqli_connect_error());
}

// Definir charset para UTF-8
mysqli_set_charset($conn, "utf8");
?>
