<?php
include '../../../conexao.php';
$sql = "SELECT veiculo.id as ID,
               veiculo.modelo as MODELO,
               veiculo.marca as MARCA,
               veiculo.ano_fabricacao as ANO_FABRICACAO,
               veiculo.placa as PLACA,
               participante.nome as PARTICIPANTE,
               veiculo.criado as CRIADO,
               veiculo.atualizado as ATUALIZADO
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
                echo "<td>" . $row["MODELO"] . "</td>";
                echo "<td>" . $row["MARCA"] . "</td>";
                echo "<td>" . $row["ANO_FABRICACAO"] . "</td>";
                echo "<td>" . $row["PLACA"] . "</td>";
                echo "<td>" . $row["PARTICIPANTE"] . "</td>";
                echo "<td>" . date('d-m-Y H:i:s', strtotime($row["CRIADO"])) . "</td>";
                echo "<td>" . date('d-m-y H:i:s', strtotime($row["ATUALIZADO"])) . "</td>";
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