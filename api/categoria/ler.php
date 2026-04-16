<?php
include '../../includes/conexao.php';

$result = mysqli_query($conn, "SELECT * FROM categorias ORDER BY nome");

echo "<table>";
echo "<tr><th>ID</th><th>Nome</th><th>Ações</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['nome']}</td>";
    echo "<td>
        <button class='editar' onclick='abrirEditarCategoria({$row['id']}, \"{$row['nome']}\")'>Editar</button>
        <button class='excluir' onclick='excluirCategoria({$row['id']})'>Excluir</button>
    </td>";
    echo "</tr>";
}

echo "</table>";
?>
