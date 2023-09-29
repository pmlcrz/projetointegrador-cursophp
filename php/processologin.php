<?php
session_start();
require 'conexao.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT tipo FROM funcionarios WHERE nome = '$username' AND senha = '$password'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $tipoFuncionario = $row['tipo'];

    $_SESSION['tipoFuncionario'] = $tipoFuncionario;

    if ($tipoFuncionario == 'medico') {
        header("Location: pagina_medico.php");
    } elseif ($tipoFuncionario == 'enfermeiro') {
        header("Location: pagina_enfermeiro.php");
    } elseif ($tipoFuncionario == 'agentescomusaude') {
        header("Location: pagina_agente.php");
    } else {
        echo "Tipo de funcionário desconhecido.";
    }
} else {
    echo "Credenciais inválidas.";
}

mysqli_close($conn);
?>
