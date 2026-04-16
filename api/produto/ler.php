<?php
include '../../includes/conexao.php';

$sql = "SELECT p.id, p.nome, p.preco, c.nome as categoria_nome 
        FROM produtos p 
        LEFT JOIN categorias c ON p.categoria_id = c.id
        ORDER BY p.nome";

$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>ID</th><th>Nome</th><th>Preço</th><th>Categoria</th><th>Ações</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $categoria = $row['categoria_nome'] ?? 'Sem categoria';
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['nome']}</td>";
    echo "<td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>";
    echo "<td>{$categoria}</td>";
    echo "<td>
        <button class='editar' onclick='abrirEditarProduto({$row['id']}, \"{$row['nome']}\", {$row['preco']}, " . ($row['categoria_id'] ?? 'null') . ")'>Editar</button>
        <button class='excluir' onclick='excluirProduto({$row['id']})'>Excluir</button>
    </td>";
    echo "</tr>";
}

echo "</table>";
?>
