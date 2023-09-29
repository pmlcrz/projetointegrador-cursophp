<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomepaciente = $_POST["nomepaciente"];
    $cpfpaciente = $_POST["cpfpaciente"];
    $rgpaciente = $_POST["rgpaciente"];
    $enderecopaciente = $_POST["enderecopaciente"];
    $datanascimento = $_POST["datanascimento"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $numcartaosus = $_POST["numcartaosus"];
    $equipe = $_POST["equipe"];
    $nomemae = $_POST["nomemae"];
    $nomepai = $_POST["nomepai"];
    $raca = $_POST["raca"];
    $sexo = $_POST["sexo"];
    $tiposanguineo = $_POST["tiposanguineo"];
    $nacionalidade = $_POST["nacionalidade"];
    $statuspac = $_POST["statuspac"];
    $doencapreexis = $_POST["doencapreexis"];

    if ($doencapreexis == "sim") {
        $detalhesDoenca = $_POST["doencapreexis_qual"];
    } else {
        $detalhesDoenca = "";
    }

    $conn = new mysqli("localhost", "root", "", "sisgeresaude");

    $query = "INSERT INTO pacientes (nomepaciente, cpfpaciente, rgpaciente, enderecopaciente, datanascimento, telefone, email, numcartaosus, equipe, nomemae, nomepai, raca, sexo, tiposanguineo, nacionalidade, statuspac, doencapreexis, detalhesdoenca) VALUES ('$nomepaciente', '$cpfpaciente', '$rgpaciente', '$enderecopaciente', '$datanascimento', '$telefone', '$email', '$numcartaosus', '$equipe', '$nomemae', '$nomepai', '$raca', '$sexo', '$tiposanguineo', '$nacionalidade', '$statuspac', '$doencapreexis', '$detalhesDoenca')";

    if ($conn->query($query) === TRUE) {
        $success_message = "Paciente cadastrado com sucesso!";
    } else {
        $error_message = "Erro ao cadastrar paciente: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar paciente</title>
    <style>
            body {
            background-color: #007bff;
            background-size: cover;
            font-family: 'Times New Roman', Times, serif;
            color: #000;
            justify-content: center;
        }
    </style>
</head>
<body>
    <h2>Cadastrar paciente</h2>
    <?php if (isset($success_message)) echo "<p>$success_message</p>"; ?>
    <?php if (isset($error_message)) echo "<p>$error_message</p>"; ?>
    <a href="cadpacientes.php">Voltar</a>
    <br>
    <a href="index.php">Inicio</a>

    <script>
    setTimeout(function() {
        window.location.href = "dashboard.php";
    }, 1000); // Redireciona após 3 segundos (ajuste conforme necessário)
</script>
</body>
</html>
