<?php
include '../../includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    
    // Atualizar produtos para remover referência à categoria
    mysqli_query($conn, "UPDATE produtos SET categoria_id = NULL WHERE categoria_id = $id");
    
    // Excluir categoria
    mysqli_query($conn, "DELETE FROM categorias WHERE id = $id");
}
?>
