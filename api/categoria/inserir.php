<?php
include '../../includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    
    if (!empty($nome)) {
        $sql = "INSERT INTO categorias (nome) VALUES ('$nome')";
        mysqli_query($conn, $sql);
    }
}
?>
