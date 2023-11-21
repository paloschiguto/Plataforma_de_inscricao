<head>
    <!--<link href="../../css/adicionar.css" rel="stylesheet">-->
</head>
<style>
</style>

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
                <input name="placa" type="text" class="input " required>
                <label for="placa" class="label">Placa</label>
                <div class="underline"></div>
            </div>

            <div class="input-container">
                <input name="participante_id" type="text" class="input " required>
                <label for="participante_id" class="label">Participante</label>
                <div class="underline"></div>
            </div>
            
            <div class="input-btn">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
<?php
include '../../../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $ano_fabricacao = $_POST['ano_fabricacao'];
    $placa = $_POST['placa'];
    $participante = $_POST['$participante_id'];

    $sql_veiculo =
        "INSERT INTO
            veiculo (modelo, marca, ano_fabricacao, placa, participante_id)
        VALUES
            ('$modelo','$marca','$ano_fabricacao','$placa','$participante')";

    if ($conexao->query($sql_veiculo) === TRUE) {
        /*header("Location: ../Listar/listar.php");*/
        echo"Cadastro realizado com sucesso";
    } else {
        echo "Erro: " . $conexao->error;
    }
}

?>