<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "sisgeresaude");

$query = "SELECT * FROM consulta";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas marcadas</title>
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
        <h2 class="text-center sombreado-notexto">Consultas Marcadas</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do paciente</th>
                    <th>CPF do paciente</th>
                    <th>Número do cartão SUS</th>
                    <th>Motivo da consulta</th>
                    <th>Profissional solicitante</th>
                    <th>Data da consulta</th>
                    <th>Hora da consulta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["nomepaciente"]; ?></td>
                            <td><?php echo $row["cpfpaciente"]; ?></td>
                            <td><?php echo $row["numcartaosus"]; ?></td>
                            <td><?php echo $row["motivoconsulta"]; ?></td>
                            <td><?php echo $row["profissionalsolicitante"]; ?></td>
                            <td><?php echo $row["dataconsulta"]; ?></td>
                            <td><?php echo $row["horaconsulta"]; ?></td>
                        </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="8">Nenhuma consulta marcada.</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="dashboard.php" class="btn btn-light">Voltar</a>
    </div>

    <footer style="background-color: #007bff; color: white; text-align: center; padding: 20px 0; position: fixed; bottom: 0; width: 100%;">
    Desenvolvido por <a href="https://mtech-solutions.vercel.app/" style="color: black; text-decoration: underline;">M.TECH - soluções em T.I</a>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
