<?php
include '../../includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $preco = floatval($_POST['preco']);
    $categoria_id = !empty($_POST['categoria_id']) ? intval($_POST['categoria_id']) : 'NULL';
    
    if (!empty($nome) && $preco > 0) {
        $sql = "INSERT INTO produtos (nome, preco, categoria_id) 
                VALUES ('$nome', $preco, $categoria_id)";
        mysqli_query($conn, $sql);
    }
}
?>
