<?php
include "conexao.php";

$sql = "SELECT 
            producao.ProducaoID,
            produtos.Nome AS Produto,
            funcionarios.Nome AS Funcionario,
            clientes.Empresa AS Cliente,
            producao.DataProducao,
            producao.DataEntrega
        FROM producao
        LEFT JOIN produtos ON producao.ProdutoID = produtos.ProdutoID
        LEFT JOIN funcionarios ON producao.FuncionarioID = funcionarios.FuncionarioID
        LEFT JOIN clientes ON producao.ClienteID = clientes.ClienteID
        ORDER BY producao.DataProducao DESC";

$resultado = mysqli_query($conexao, $sql);

include "componentes/header.php";
?>

<main class="container">
    <section class="titulo-pagina">
        <h1>Produção</h1>
        <p>Acompanhamento integrado de ordens de serviço distribuídas entre 4 tabelas.</p>
    </section>

    <div class="tabela-container">
        <table class="tabela-dados">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Funcionário</th>
                    <th>Cliente</th>
                    <th>Data Produção</th>
                    <th>Data Entrega</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while($item = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td class="id-coluna"><?php echo $item["ProducaoID"]; ?></td>
                        <td><strong><?php echo htmlspecialchars($item["Produto"] ?? 'Desconhecido'); ?></strong></td>
                        <td><?php echo htmlspecialchars($item["Funcionario"] ?? 'Sem atribuição'); ?></td>
                        <td><?php echo htmlspecialchars($item["Cliente"] ?? 'Não definido'); ?></td>
                        <td><?php echo date("d/m/Y", strtotime($item["DataProducao"])); ?></td>
                        <td>
                            <?php echo ($item["DataEntrega"] == null) ? "Em aberto" : date("d/m/Y", strtotime($item["DataEntrega"])); ?>
                        </td>
                        <td>
                            <?php if($item["DataEntrega"] == null) { ?>
                                <span class="badge status-aberto">Em aberto</span>
                            <?php } else { ?>
                                <span class="badge status-concluido">Concluída</span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php include "componentes/footer.php"; ?>