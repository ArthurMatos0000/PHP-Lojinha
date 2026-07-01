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

        <?php
        $imagem = "padrao.jpg";

        switch ($produto["Produto"]) {

            case "Adaptador de chave":
                $imagem = "adaptador_de_chave.jpg";
                break;

            case "Armario expositor":
                $imagem = "armario_expositor.jpg";
                break;

            case "Armário para ferramentas":
                $imagem = "armario_para_ferramentas.jpg";
                break;

            case "Bancada com 1 módulo":
                $imagem = "bancada_1_modulo.jpg";
                break;

            case "Bancada com suporte":
                $imagem = "bancada_com_suporte.jpg";
                break;

            case "Caixa Sanfona":
                $imagem = "caixa_sanfona.jpg";
                break;

            case "Chave Canhão":
                $imagem = "chave_canhao.jpg";
                break;

            case "Chave de compasso":
                $imagem = "chave_de_compasso.jpg";
                break;

            case "Chave estrelar de bater":
                $imagem = "chave_estrelar_de_bater.jpg";
                break;

            case "Chave fenda":
                $imagem = "chave_fenda.jpg";
                break;

            case "Chave Fixa":
                $imagem = "chave_fixa.jpg";
                break;

            case "Chave Gancho":
                $imagem = "chave_gancho.jpg";
                break;

            case "Chave industrial":
                $imagem = "chave_industrial.jpg";
                break;

            case "Chave pesada":
                $imagem = "chave_pesada.jpg";
                break;
        }
        ?>

            <article class="card-produto"
            style="
            background-image:url('img/<?php echo $imagem; ?>');
            background-size:contain;
            background-repeat:no-repeat;
            background-position:center;
            
            min-height:250px;">
            
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