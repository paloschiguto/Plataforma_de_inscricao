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
                        <a id='alt' href='../Alterar/alterar.php?ID=" . $row["ID"] . "'><button class='btn_alterar'>Alterar</button></a>
                        <a id='del' href='../Excluir/deletar.php?ID=" . $row["ID"] . "'><button class='btn_deletar'>Deletar</button></a> 
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<td colspan='9'>Sem Participante</td>";
        }
        ?>
    </tbody>
</table><br>

<a href="../Adicionar/adicionar.php"><button class="add_veiculo">Adicionar novo veículo</button></a>
<a href="../../../participante/tarefas/Adicionar/adicionar.php"><button class="add_participante">Adicionar novo
        participante</button></a>



<?php
$conexao->close();
?>