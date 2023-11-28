<?php
include '../../../conexao.php';

$sql = "SELECT * FROM participante";
$result = $conexao->query($sql);
?>

<head>
    <link rel="stylesheet" href="../../css/listar.css">
</head>
<h1>Participantes</h1>
<table id="customers" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Endereco</th>
            <th>Cidade</th>
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
                echo "<td>" . $row["NOME"] . "</td>";
                echo "<td>" . $row["CPF"] . "</td>";
                echo "<td>" . $row["EMAIL"] . "</td>";
                echo "<td>" . $row["ENDERECO"] . "</td>";
                echo "<td>" . $row["CIDADE"] . "</td>";
                echo "<td>" . $row["CRIADO"] . "</td>";
                echo "<td>" . $row["ATUALIZADO"] . "</td>";
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
<a href="../Adicionar/adicionar.php"><button class="add_participante">Adicionar novo participante</button></a>
<a href="../../../veiculo/tarefas/Adicionar/adicionar.php"><button class="add_veiculo">Adicionar novo veículo</button></a>


<?php
$conexao->close();
?>