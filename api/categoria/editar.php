<?php
include '../../includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    
    if (!empty($nome) && $id > 0) {
        $sql = "UPDATE categorias SET nome = '$nome' WHERE id = $id";
        mysqli_query($conn, $sql);
    }
}
?>
