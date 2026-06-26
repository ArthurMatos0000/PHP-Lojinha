<?php
include "conexao.php";

$busca = "";
if (isset($_GET["busca"])) {
    $busca = mysqli_real_escape_string($conexao, $_GET["busca"]);
}

$sql = "SELECT 
            produtos.ProdutoID,
            produtos.Nome AS Produto,
            produtos.Preco,
            produtos.Referencia,
            produtos.Peso,
            categorias.Nome AS Categoria
        FROM produtos
        LEFT JOIN categorias ON produtos.CategoriaID = categorias.CategoriaID
        WHERE produtos.Nome LIKE '%$busca%'
        ORDER BY produtos.Nome ASC";

$resultado = mysqli_query($conexao, $sql);

include "componentes/header.php";
?>

<main class="container">
    <section class="titulo-pagina">
        <h1>Produtos</h1>
        <p>Gerencie e busque os produtos cadastrados no sistema.</p>
    </section>

    <section class="grid-produtos">
        <?php while($produto = mysqli_fetch_assoc($resultado)) { ?>
            <article class="card-produto">
                <span><?php echo htmlspecialchars($produto["Categoria"] ?? 'Sem Categoria'); ?></span>
                <h2><?php echo htmlspecialchars($produto["Produto"]); ?></h2>
                <p>Referência: <?php echo htmlspecialchars($produto["Referencia"]); ?></p>
                <p>Peso: <?php echo $produto["Peso"]; ?> kg</p>
                <strong>R$ <?php echo number_format($produto["Preco"], 2, ",", "."); ?></strong>
                <a class="botao" href="produto-detalhe.php?id=<?php echo $produto["ProdutoID"]; ?>">Ver detalhe</a>
            </article>
        <?php } ?>
    </section>
</main>

<?php include "componentes/footer.php"; ?>