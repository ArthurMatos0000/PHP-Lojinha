<?php
$paginaAtual = basename($_SERVER["PHP_SELF"]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Empresarial - PHP + MySQL</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="topbar">
    <a class="menu-mobile" href="index.php" aria-label="Ir para o painel">PE</a>
    <div class="topbar-marca">
        <strong>Painel Empresarial</strong>
        <span>PHP + MySQL</span>
    </div>
    <form class="busca-global" method="GET" action="produtos.php">
        <input type="text" name="busca" placeholder="Buscar produto no sistema" value="<?php echo isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : ''; ?>">
        <button type="submit">Buscar</button>
    </form>
    <div class="usuario">admin</div>
</header>

<aside class="sidebar">
    <div class="logo-sistema">PE</div>
    <nav class="sidebarnav">
        <a class="<?php echo $paginaAtual == 'index.php' ? 'ativo' : ''; ?>" href="index.php">Dashboard</a>
        <a class="<?php echo ($paginaAtual == 'produtos.php' || $paginaAtual == 'produto-detalhe.php') ? 'ativo' : ''; ?>" href="produtos.php">Produtos</a>
        <a class="<?php echo $paginaAtual == 'funcionarios.php' ? 'ativo' : ''; ?>" href="funcionarios.php">Funcionários</a>
        <a class="<?php echo $paginaAtual == 'clientes.php' ? 'ativo' : ''; ?>" href="clientes.php">Clientes</a>
        <a class="<?php echo $paginaAtual == 'producao.php' ? 'ativo' : ''; ?>" href="producao.php">Produção</a>
    </nav>
</aside>