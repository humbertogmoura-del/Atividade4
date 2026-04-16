<?php
include '../../includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $preco = floatval($_POST['preco']);
    $categoria_id = !empty($_POST['categoria_id']) ? intval($_POST['categoria_id']) : 'NULL';
    
    if (!empty($nome) && $preco > 0 && $id > 0) {
        $sql = "UPDATE produtos SET nome = '$nome', preco = $preco, categoria_id = $categoria_id WHERE id = $id";
        mysqli_query($conn, $sql);
    }
}
?>
