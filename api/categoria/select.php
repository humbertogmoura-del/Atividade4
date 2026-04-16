<?php
include '../../includes/conexao.php';

$result = mysqli_query($conn, "SELECT id, nome FROM categorias ORDER BY nome");

echo "<option value=''>-- Selecione uma categoria --</option>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
}
?>
