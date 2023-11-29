<head>
    <title>Veículo</title>
    <link rel="stylesheet" href="../../css/alterar.css">
</head>
<?php
include '../../../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $ano_fabricacao = $_POST['ano_fabrucacao'];
    $placa = $_POST['placa'];

    $sql_update = "UPDATE veiculo 
            SET MODELO='$modelo', MARCA='$marca', ANO_FABRICACAO='$ano_fabricacao', PLACA='$placa'
            WHERE id=$id";
    if ($conexao->query($sql_update) === TRUE) {
        header("Location: ../Listar/listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['ID'];
    $sql = "SELECT *
            FROM veiculo
            WHERE id=$id";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
        $veiculo = $result->fetch_assoc();
    } else {
        echo "Participante não encontrado!";
        exit;
    }
}

$conexao->close();
?>

<body>
    <div class="cad">
        <h1>
            Alterar Dados
        </h1>
        <form method="post" action="alterar.php">
            <input type="hidden" name="id" value="<?php echo $veiculo['ID']; ?>">

            <div class="input-container">
                <input modelo="modelo" type="text" class="input" value="<?php echo $veiculo['MODELO']; ?>" required>
                <label for="modelo" class="label">Modelo</label>
                <div class="underline"></div>
            </div>

            <div class="input-container">
                <input name="marca" type="text" class="input" value="<?php echo $veiculo['MARCA']; ?>" required>
                <label for="modelo" class="label">Marca</label>
                <div class="underline"></div>
            </div>

            <div class="input-container">
                <input name="ano_fabricacao" type="text" class="input" value="<?php echo $veiculo['ANO_FABRICACAO']; ?>"
                    required>
                <label for="ano_fabricacao" class="label">Ano de Fabricação</label>
                <div class="underline"></div>
            </div>

            <div class="input-container">
                <input name="placa" type="text" min="1" class="input" value="<?php echo $veiculo['PLACA']; ?>" required>
                <label for="placa" class="label">Placa</label>
                <div class="underline"></div>
            </div>

            <div class="input-btn">
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</body>