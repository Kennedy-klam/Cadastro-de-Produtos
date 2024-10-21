<?php

include("db/dbConect.php");

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

//Inscript para remover produtos do db
if (isset($_POST['remover'])) {
    $id_produto = $_POST['id_produto'];

    // SQL para remover o produto do banco de dados
    $sql_delete = "DELETE FROM produtos WHERE id = $id_produto";

    //Verficar a remoção do produto
    if ($conn->query($sql_delete) === TRUE) {
        header("Location: removido.html");
        exit();
    } else {
        echo "Erro ao remover o produto: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="style/listProdutos.css">
</head>
<body>
    <div class="container">
        <h1>Produtos Cadastrados</h1>

        <?php
        // Verificar se existem produtos cadastrados
        if ($result->num_rows > 0) {

            echo "<table>";
            echo "<tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Código</th>
            <th>Preço</th>
            <th>Data de Fabricação</th>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Remover Produto</th>
            </tr>";

            // Loop através de cada produto e exibir seus dados
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['codigo'] . "</td>";
                echo "<td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>";
                echo "<td>" . $row['data_fabricacao'] . "</td>";
                echo "<td>" . ucfirst($row['categoria']) . "</td>";
                echo "<td>" . $row['descricao'] . "</td>";

                //Botão remover
                echo "<td>
                <form method='POST' action=''>
                <input type='hidden' name='id_produto' value='" . $row['id'] . "'>
                <button type='submit' name='remover' class='btn-remover'>Remover</button>
                </form>
                </td>";

                echo "</tr>";
            }
            
            echo "</table>";

        } else {

            echo "<p>Nenhum produto cadastrado.</p>";
        }

        $conn->close();
        ?>

        <div class="bt">
            <a href="produto.php" class="botao">Cadastrar Produto</a>
        </div>

    </div>
</body>
</html>