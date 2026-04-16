<?php
include '../../includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    
    mysqli_query($conn, "DELETE FROM produtos WHERE id = $id");
}
?>
