<?php
include '../../../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $id = $_GET['ID'];

    $sql = "DELETE 
            FROM participante
            WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: ../Listar/listar.php");
    } else {
        echo "Erro ao deletar: " . $conexao->error;
    }
}
$conexao->close();
?>