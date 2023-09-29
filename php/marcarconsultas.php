<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$success_message = $error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "sisgeresaude");

    $nomepaciente = $_POST["nomepaciente"];
    $cpfpaciente = $_POST["cpfpaciente"];
    $numcartaosus = $_POST["numcartaosus"];
    $motivoconsulta = $_POST["motivoconsulta"];
    $profissionalsolicitante = $_POST["profissionalsolicitante"];
    $dataconsulta = $_POST["dataconsulta"];
    $horaconsulta = $_POST["horaconsulta"];

    // Verifique a disponibilidade do horário
    $query_disponibilidade = "SELECT COUNT(*) as horarios_ocupados FROM horarios_ocupados WHERE data = ? AND hora = ?";
    $stmt_disponibilidade = $conn->prepare($query_disponibilidade);
    $stmt_disponibilidade->bind_param("ss", $dataconsulta, $horaconsulta);
    $stmt_disponibilidade->execute();
    $result_disponibilidade = $stmt_disponibilidade->get_result();

    $row_disponibilidade = $result_disponibilidade->fetch_assoc();
    if ($row_disponibilidade["horarios_ocupados"] > 0) {
        $error_message = "Horário indisponível. Por favor, escolha outro horário.";
    } else {
        // Insira a consulta se o horário estiver disponível
        $query_inserir_consulta = "INSERT INTO consulta (nomepaciente, cpfpaciente, numcartaosus, motivoconsulta, profissionalsolicitante, dataconsulta, horaconsulta)
                                   VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt_inserir_consulta = $conn->prepare($query_inserir_consulta);
        $stmt_inserir_consulta->bind_param("sssssss", $nomepaciente, $cpfpaciente, $numcartaosus, $motivoconsulta, $profissionalsolicitante, $dataconsulta, $horaconsulta);

        if ($stmt_inserir_consulta->execute()) {
            // Adicione o horário à tabela horarios_ocupados
            $query_adicionar_horario = "INSERT INTO horarios_ocupados (data, hora, tipo, cpfpaciente) VALUES (?, ?, 'consulta', ?)";
            $stmt_adicionar_horario = $conn->prepare($query_adicionar_horario);
            $stmt_adicionar_horario->bind_param("ssi", $dataconsulta, $horaconsulta, $cpfpaciente);

            if ($stmt_adicionar_horario->execute()) {
                $success_message = "Consulta marcada com sucesso!";
            } else {
                $error_message = "Erro ao marcar consulta: " . $conn->error;
            }
        } else {
            $error_message = "Erro ao marcar consulta: " . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcar consulta</title>
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
<?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <h2 class="text-center sombreado-notexto">Marcar consulta</h2>
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
                <label class="form-label">Nome do Paciente:</label>
                <input name="nomepaciente" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">CPF do Paciente:</label>
                <input name="cpfpaciente" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Número do Cartão SUS:</label>
                <input name="numcartaosus" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Motivo da Consulta:</label>
                <input name="motivoconsulta" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Profissional Solicitante:</label>
                <input name="profissionalsolicitante" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Data da Consulta:</label>
                <input type="date" name="dataconsulta" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Hora da Consulta:</label>
                <input type="time" name="horaconsulta" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-info">Marcar Consulta</button>
        </form>
        <br>
        <a href="dashboard.php" class="btn btn-primary mb-2 mr-6">Voltar</a>
        <a href="consultasmarcadas.php" class="btn btn-light mb-2 ml-4">Ver consultas marcadas</a>

    </div>

    <footer style="background-color: #007bff; color: white; text-align: center; padding: 20px 0;">
    Desenvolvido por <a href="https://mtech-solutions.vercel.app/" style="color: black; text-decoration: underline;">M.TECH - soluções em T.I</a>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
