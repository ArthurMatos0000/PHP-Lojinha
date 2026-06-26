<?php
include "conexao.php";

$sql = "SELECT 
            funcionarios.Nome AS Funcionario,
            funcionarios.Email,
            funcionarios.Ramal,
            funcionarios.Salario,
            cargos.Nome AS Cargo,
            setor.Nome AS Setor
        FROM funcionarios
        LEFT JOIN cargos ON funcionarios.CargoID = cargos.CargoID
        LEFT JOIN setor ON funcionarios.SetorID = setor.SetorID
        ORDER BY funcionarios.Nome ASC";

$resultado = mysqli_query($conexao, $sql);

include "componentes/header.php";
?>

<main class="container">
    <section class="titulo-pagina">
        <h1>Funcionários</h1>
        <p>Listagem completa combinando tabelas de cargos, setores e remunerações.</p>
    </section>

    <div class="tabela-container">
        <table class="tabela-dados">
            <thead>
                <tr>
                    <th>Funcionário</th>
                    <th>E-mail</th>
                    <th>Ramal</th>
                    <th>Cargo</th>
                    <th>Setor</th>
                    <th>Salário</th>
                </tr>
            </thead>
            <tbody>
                <?php while($funcionario = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($funcionario["Funcionario"]); ?></strong></td>
                        <td><?php echo htmlspecialchars($funcionario["Email"]); ?></td>
                        <td><?php echo htmlspecialchars($funcionario["Ramal"]); ?></td>
                        <td><span class="badge-cargo"><?php echo htmlspecialchars($funcionario["Cargo"] ?? 'Não definido'); ?></span></td>
                        <td><?php echo htmlspecialchars($funcionario["Setor"] ?? 'Não definido'); ?></td>
                        <td class="valor-destaque">R$ <?php echo number_format($funcionario["Salario"], 2, ",", "."); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php include "componentes/footer.php"; ?>