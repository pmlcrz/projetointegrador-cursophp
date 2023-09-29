<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: inserirfunc.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];

    $password = $_POST["senha"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $conexao = new mysqli("localhost", "root", "", "sisgeresaude");

    $query = "INSERT INTO funcionarios (tipo, nome, matricula, ..., senha) VALUES ('$tipo', '$nome', '$matricula', ..., '$hashed_password')";

    if ($conexao->query($query) === TRUE) {
        $success_message = "Funcionário cadastrado com sucesso!";
    } else {
        $error_message = "Erro ao cadastrar funcionário: " . $conn->error;
    }

    $conexao->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Funcionário</title>
</head>
<body>
    <h2>Cadastrar Funcionário</h2>
    <?php if (isset($success_message)) echo "<p>$success_message</p>"; ?>
    <?php if (isset($error_message)) echo "<p>$error_message</p>"; ?>
    <form method="post">
        <label>Tipo:</label>
        <select name="tipo" required>
            <option value="medico">Médico</option>
            <option value="enfermeiro">Enfermeiro</option>
            <option value="agentescomusaude">Agente de Saúde</option>
        </select><br>
        <label>Senha:</label>
        <input type="password" name="senha" required><br>
        <button type="submit">Cadastrar</button>
    </form>
    <br>
    <a href="index.php">Inicio</a>

</body>
</html>
