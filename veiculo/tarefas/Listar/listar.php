<?php
include '../../../conexao.php';
$sql = "SELECT veiculo.id as ID,
               veiculo.modelo as Modelo,
               veiculo.marca as Marca,
               veiculo.ano_fabricacao,
               veiculo.placa as Placa,
               participante.nome as Participante,
               veiculo.criado as Criado,
               veiculo.atualizado as Atualizado
        FROM veiculo
        LEFT JOIN participante on veiculo.participante_id = participante.id";
$result = $conexao->query($sql);
?>

<head>
    <link rel="stylesheet" href="../../css/listar.css">
</head>
<h1>Veículos</h1>
<table id="customers" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Ano de fabricação</th>
            <th>Placa</th>
            <th>Participante</th>
            <th>Criado</th>
            <th>Atualizado</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        </tr>
        </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["Modelo"] . "</td>";
                echo "<td>" . $row["Marca"] . "</td>";
                echo "<td>" . $row["ano_fabricacao"] . "</td>";
                echo "<td>" . $row["Placa"] . "</td>";
                echo "<td>" . $row["Participante"] . "</td>";
                echo "<td>" . $row["Criado"] . "</td>";
                echo "<td>" . $row["Atualizado"] . "</td>";
                echo "<td>
                        <button class='btn_alterar'>
                            <a id='alt' href='../Alterar/alterar.php?ID=" . $row["ID"] . "'>Alterar</a>
                        </button>
                        <button class='btn_deletar'>
                            <a id='del' href='../Excluir/deletar.php?ID=" . $row["ID"] . "'>Deletar</a>
                        </button> 
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<td colspan='9'>Sem Participante</td>";
        }
        ?>
    </tbody>
</table><br>

<button class="novo_veiculo">
    <a id="add_veiculo" href="../Adicionar/adicionar.php">Adicionar novo veículo</a>
</button>

<button class="novo_participante">
    <a id="add_participante" href="../../../participante/tarefas/Adicionar/adicionar.php">Adicionar novo participante</a>
</button>



<?php
$conexao->close();
?>