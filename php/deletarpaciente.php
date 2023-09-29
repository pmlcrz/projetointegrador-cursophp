<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login2.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Conexão com o bd
    $conn = new mysqli("localhost", "root", "", "sisgeresaude");

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $query = "DELETE FROM pacientes WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        $success_message = "Paciente excluído com sucesso!";
    } else {
        $error_message = "Erro ao excluir paciente: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: listarpacientes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir paciente</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #87CEFA;
        }

        body, html {
            height: 100%;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Excluir paciente</h2>
                <?php if (isset($success_message)) echo "<p>$success_message</p>"; ?>
                <?php if (isset($error_message)) echo "<p>$error_message</p>"; ?>
                <a href="pacientes.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
