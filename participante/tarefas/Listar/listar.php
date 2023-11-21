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
            echo "<td colspan='5'>Sem Participante</td>";
        }
        ?>
    </tbody>
</table><br>

<button class="novo_participante">
    <a id="add" href="../Adicionar/adicionar.php">Adicionar novo participante</a>
</button>



<?php
$conexao->close();
?>