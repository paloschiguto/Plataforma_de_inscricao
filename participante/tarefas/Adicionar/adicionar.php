<?php
include '../../../default/header/header.php';
include '../../../conexao.php';
?>

<head>
    <title>Participante</title>
    <link href="../../css/adicionar.css" rel="stylesheet">
</head>

<div class="cad">
    <form action="adicionar.php" method="post">
        <h1>Cadastro Participante</h1>

        <div class="input-container">
            <input name="nome" type="text" class="input " required>
            <label for="nome" class="label">Nome</label>
            <div class="underline"></div>
        </div>

        <div class="input-container">
            <input name="cpf" type="text" class="input " required>
            <label for="cpf" class="label">CPF</label>
            <div class="underline"></div>
        </div>

        <div class="input-container">
            <input name="email" type="text" class="input " required>
            <label for="email" class="label">E-mail</label>
            <div class="underline"></div>
        </div>

        <div class="input-container">
            <input name="endereco" type="text" class="input " required>
            <label for="endereco" class="label">Endereço</label>
            <div class="underline"></div>
        </div>

        <div class="input-container">
            <input name="cidade" type="text" class="input " required>
            <label for="cidade" class="label">Cidade</label>
            <div class="underline"></div>
        </div>

        <div class="input-btn">
            <button type="submit">Cadastrar-se</button>
        </div>
    </form>
</div>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];

    $sql =
        "INSERT INTO
            participante (nome, cpf, email, endereco, cidade)
        VALUES
            ('$nome','$cpf','$email','$endereco','$cidade')";

    if ($conexao->query($sql) === TRUE) {
        header("Location: ../Listar/listar.php");
    } else {
        echo "Erro: " . $conexao->error;
    }
}
include '../../../default/rodape/footer.php';

?>