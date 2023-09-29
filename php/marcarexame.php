<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$success_message = $error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomepaciente = $_POST["nomepaciente"];
    $cpfpaciente = $_POST["cpfpaciente"];
    $numcartaosus = $_POST["numcartaosus"];
    $dataexame = $_POST["dataexame"];
    $tipoexame = $_POST["tipoexame"];
    $pronto = isset($_POST["pronto"]) ? $_POST["pronto"] : 0;

    $conn = new mysqli("localhost", "root", "", "sisgeresaude");

    $query = "INSERT INTO exames (nomepaciente, cpfpaciente, numcartaosus, tipoexame, dataexame, pronto) VALUES ('$nomepaciente', '$cpfpaciente', '$numcartaosus', '$tipoexame', '$dataexame', '$pronto')";

    if ($conn->query($query) === TRUE) {
        $success_message = "Exame marcado com sucesso!";
    } else {
        $error_message = "Erro ao marcar exame: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcar Exame</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

    <style>
    body {
        background-image: url('img/consu.jpeg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: #fff;
        font-family: 'Times New Roman', Times, serif;
    }
    .sombreado-notexto {
        color: #fff;
        text-shadow: 2px 2px 1px #000;
    }
</style>
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">CMS Augusta King</a>
    <span class="navbar-text ml-auto">Cuidar das pessoas é o nosso dever</span>
</nav>

    <div class="container mt-5">
        <h2 class="text-center">Marcar Exame</h2>
        <?php if (!empty($success_message)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php } ?>
        <?php if (!empty($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Paciente:</label>
                <input name="nomepaciente" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">CPF do paciente:</label>
                <input type="text" name="cpfpaciente" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Número do cartão do SUS:</label>
                <input type="text" name="numcartaosus" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Data do Exame:</label>
                <input type="date" name="dataexame" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Hora do Exame:</label>
                <input type="time" name="horaexame" class="form-control" required>
            </div>
             <div class="mb-3">
                <label class="form-label">Data Prevista para resultado:</label>
                <input type="date" name="dataprevisao" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo de Exame:</label>
                <input type="text" name="tipoexame" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-info mb-2">Marcar Exame</button>

        </form>
        </div>

        <a href="dashboard.php" class="btn btn-light mb-6 mr-4">Voltar</a>
        <a href="examesmarcados.php" class="btn btn-light mb-6">Exames marcados</a>


    <footer style="background-color: #007bff; color: white; text-align: center; padding: 10px 0; position: relative; bottom: 0; width: 100%;">
    Desenvolvido por <a href="https://mtech-solutions.vercel.app/" style="color: black; text-decoration: underline;">M.TECH - soluções em T.I</a>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
