<?php
include '../../../conexao.php';
include '../../../default/header/header.php';
?>
<head>
    <link href="../../css/adicionar.css" rel="stylesheet">
</head>

<body>
    <div class="cad">
        <form action="adicionar.php" method="post">
            <h1>Cadastro Veículo</h1>

            <div class="input-container">
                <input name="modelo" type="text" class="input " required>
                <label for="modelo" class="label">Modelo</label>
                <div class="underline"></div>
            </div>

            <div class="input-container">
                <input name="marca" type="text" class="input " required>
                <label for="modelo" class="label">Marca</label>
                <div class="underline"></div>
            </div>

            <div class="input-container">
                <input name="ano_fabricacao" type="text" class="input " required>
                <label for="ano_fabricacao" class="label">Ano de Fabricação</label>
                <div class="underline"></div>
            </div>

            <div class="input-container">
                <input name="placa" type="text" min="1"  class="input" required>
                <label for="placa" class="label">Placa</label>
                <div class="underline"></div>
            </div>

            <div class="input-container">
                <label for="participante_id" class="label"></label>
                <select name="participante_id" id="participante_id" required> 
                    <option value="">Selecione o participante</option>
                    <?php

                    $sql_participante =
                        "SELECT p.ID, p.NOME
                            FROM participante as p
                            LEFT JOIN veiculo as v on v.participante_id = p.id 
                            WHERE v.participante_id is null";

                    $result_sql_participante = $conexao->query($sql_participante);

                    while ($row = $result_sql_participante->fetch_assoc()) {
                        $participante_id = $row['ID'];
                        $participante_nome = $row['NOME'];
                        echo "<option value='$participante_id'>$participante_nome</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="input-btn">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $ano_fabricacao = $_POST['ano_fabricacao'];
    $placa = $_POST['placa'];
    $participante = $_POST['participante_id'];

    $sql_veiculo =
        "INSERT INTO
            veiculo (modelo, marca, ano_fabricacao, placa, participante_id)
        VALUES
            ('$modelo','$marca','$ano_fabricacao','$placa','$participante')";

        if ($conexao->query($sql_veiculo) === TRUE) {
            header("Location: ../Listar/listar.php");
        } else {
            echo "Erro: " . $conexao->error;
    }
}
include '../../../default/rodape/footer.php';
?>