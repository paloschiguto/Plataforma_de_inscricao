<head>
    <link rel="stylesheet" href="../../css/alterar.css">
</head>
<?php
include '../../../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['ID'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];

    $sql_update = "UPDATE participante 
            SET nome='$nome', cpf='$cpf', email='$email', endereco='$endereco', cidade='$cidade'
            WHERE id=$id";
    if ($conexao->query($sql_update) === TRUE) {
        header("Location: ../Listar/listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['ID'];
    $sql = "SELECT *
            FROM participante
            WHERE id=$id";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
        $participante = $result->fetch_assoc();
    } else {
        echo "Participante não encontrado!";
        exit;
    }
}

$conexao->close();
?>
<div class="cad">
    <h1>
        Alterar Dados
    </h1>
    <form method="post" action="alterar.php">
        <input type="hidden" name="id" value="<?php echo $participante['ID']; ?>">
        <div class="input-container">
            <input name="nome" type="text" class="input" value="<?php echo $participante['NOME']; ?>" requird>
            <label for="nome" class="label">Nome</label>
            <div class="underline"></div>
        </div>
        <div class="input-container">
            <input name="cpf" type="text" class="input " value="<?php echo $participante['CPF']; ?>" required>
            <label for="cpf" class="label">CPF</label>
            <div class="underline"></div>
        </div>
        <div class="input-container">
            <input name="email" type="text" class="input" value="<?php echo $participante['EMAIL']; ?>" required>
            <label for="email" class="label">E-mail</label>
            <div class="underline"></div>
        </div>
        <div class="input-container">
            <input name="endereco" type="text" class="input" value="<?php echo $participante['ENDERECO']; ?>" required>
            <label for="endereco" class="label">Endereço</label>
            <div class="underline"></div>
        </div>
        <div class="input-container">
            <input name="cidade" type="text" class="input" value="<?php echo $participante['CIDADE']; ?>" required>
            <label for="cidade" class="label">Cidade</label>
            <div class="underline"></div>
        </div>
        <div class="input-btn">
            <button type="submit">Salvar</button>
        </div>
    </form>
</div>