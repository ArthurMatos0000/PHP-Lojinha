<?php
include "conexao.php";

// Consultas estatísticas
$sqlProdutos = "SELECT COUNT(*) AS total FROM produtos";
$resultProdutos = mysqli_query($conexao, $sqlProdutos);
$totalProdutos = mysqli_fetch_assoc($resultProdutos);

$sqlFuncionarios = "SELECT COUNT(*) AS total FROM funcionarios";
$resultFuncionarios = mysqli_query($conexao, $sqlFuncionarios);
$totalFuncionarios = mysqli_fetch_assoc($resultFuncionarios);

$sqlClientes = "SELECT COUNT(*) AS total FROM clientes";
$resultClientes = mysqli_query($conexao, $sqlClientes);
$totalClientes = mysqli_fetch_assoc($resultClientes);

$sqlMaiorPreco = "SELECT MAX(Preco) AS maior_preco FROM produtos";
$resultMaiorPreco = mysqli_query($conexao, $sqlMaiorPreco);
$maiorPreco = mysqli_fetch_assoc($resultMaiorPreco);

$sqlMaiorSalario = "SELECT MAX(Salario) AS maior_salario FROM funcionarios";
$resultMaiorSalario = mysqli_query($conexao, $sqlMaiorSalario);
$maiorSalario = mysqli_fetch_assoc($resultMaiorSalario);

include "componentes/header.php";
?>

<main class="container">
    <section class="hero">
        <h1>Painel Empresarial PHP e MySQL</h1>
        <p>Dashboard de consulta criado com SELECT, PHP, HTML e CSS.</p>
    </section>

    <section class="cards-resumo">
        <article class="card-resumo">
            <span>Total de produtos</span>
            <strong><?php echo $totalProdutos["total"]; ?></strong>
        </article>
        <article class="card-resumo">
            <span>Total de funcionários</span>
            <strong><?php echo $totalFuncionarios["total"]; ?></strong>
        </article>
        <article class="card-resumo">
            <span>Total de clientes</span>
            <strong><?php echo $totalClientes["total"]; ?></strong>
        </article>
        <article class="card-resumo destaque">
            <span>Maior preço</span>
            <strong>R$ <?php echo number_format($maiorPreco["maior_preco"], 2, ",", "."); ?></strong>
        </article>
        <article class="card-resumo destaque">
            <span>Maior salário</span>
            <strong>R$ <?php echo number_format($maiorSalario["maior_salario"], 2, ",", "."); ?></strong>
        </article>
    </section>
</main>

<?php include "componentes/footer.php"; ?>