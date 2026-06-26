<?php
include "conexao.php";

$sql = "SELECT ClienteID, Nome, Empresa, Email, Telefone, Cidade, Estado FROM clientes ORDER BY Empresa ASC";
$resultado = mysqli_query($conexao, $sql);

include "componentes/header.php";
?>

<main class="container">
    <section class="titulo-pagina">
        <h1>Clientes</h1>
        <p>Consulta simples de empresas e parceiros cadastrados no banco de dados.</p>
    </section>

    <div class="tabela-container">
        <table class="tabela-dados">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Empresa</th>
                    <th>Contato</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Cidade</th>
                    <th>UF</th>
                </tr>
            </thead>
            <tbody>
                <?php while($cliente = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td class="id-coluna"><?php echo $cliente["ClienteID"]; ?></td>
                        <td><strong><?php echo htmlspecialchars($cliente["Empresa"]); ?></strong></td>
                        <td><?php echo htmlspecialchars($cliente["Nome"]); ?></td>
                        <td><?php echo htmlspecialchars($cliente["Email"]); ?></td>
                        <td><?php echo htmlspecialchars($cliente["Telefone"]); ?></td>
                        <td><?php echo htmlspecialchars($cliente["Cidade"]); ?></td>
                        <td class="uf-destaque"><?php echo htmlspecialchars($cliente["Estado"]); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php include "componentes/footer.php"; ?>