<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="style/cadastroProduto.css">
</head>
<body>
    <!-- formulario -->
    <div class="container">
        <h1>Cadastro de Produto</h1>
        <form action="produto.php" method="POST">
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="codigo">Código do Produto:</label>
            <input type="text" id="codigo" name="codigo" required>

            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" required>

            <label for="data-fabricacao">Data de Fabricação:</label>
            <input type="date" id="data-fabricacao" name="data-fabricacao" required>

            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria" required>
                <option value="eletronico">Eletrônico</option>
                <option value="eletrodomestico">Eletrodoméstico</option>
                <option value="vestuario">Vestuário</option>
                <option value="alimentos">Alimentos</option>
            </select>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" required></textarea>

            <button type="submit">Cadastrar</button>
        </form>

        <div class="bt">
            <a href="listProdutos.php" class="botao">Produtos Cadastrados</a>
        </div>
    </div>
</body>
</html>

<?php 

include("db/dbConect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $preco = $_POST['preco'];
    $data_fabricacao = $_POST['data-fabricacao'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO produtos (nome, codigo, preco, data_fabricacao, categoria, descricao) 
            VALUES ('$nome', '$codigo', '$preco', '$data_fabricacao', '$categoria', '$descricao')";

    if ($conn->query($sql) === TRUE) {
        header("Location: sucesso.html");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>
