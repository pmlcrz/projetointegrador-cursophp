<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $password = $_POST["senha"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    include "conexao.php";

    $query = "INSERT INTO funcionarios (tipo, nome, matricula, senha) VALUES ('$tipo', '$nome', '$matricula', '$hashed_password')";

    if ($conn->query($query) === TRUE) {
        $_SESSION["success_message"] = "Funcionário cadastrado com sucesso!";
    } else {
        $_SESSION["error_message"] = "Erro ao cadastrar funcionário: " . $conn->error;
    }

    $conn->close();

    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
</head>
<body>
    <h2>Cadastrar Funcionário</h2>
    <?php
    if (isset($_SESSION["success_message"])) {
        echo "<p>{$_SESSION["success_message"]}</p>";
        unset($_SESSION["success_message"]);
    }
    if (isset($_SESSION["error_message"])) {
        echo "<p>{$_SESSION["error_message"]}</p>";
        unset($_SESSION["error_message"]);
    }
    ?>
    <form method="post">
        <label>Tipo:</label>
        <select name="tipo" required>
            <option value="medico">Médico</option>
            <option value="enfermeiro">Enfermeiro</option>
            <option value="agentescomusaude">Agente de Saúde</option>
        </select><br>
        <label>Nome:</label>
        <input type="text" name="nome" required><br>
        <label>Matrícula:</label>
        <input type="text" name="matricula" required><br>
        <label>Senha:</label>
        <input type="password" name="senha" required><br>
        <button type="submit">Cadastrar</button>
    </form>
    <br>
    <a href="listarfunc.php">Ver Lista de Funcionários</a>
    <br>
    <a href="index.php">Inicio</a>

</body>
</html>
