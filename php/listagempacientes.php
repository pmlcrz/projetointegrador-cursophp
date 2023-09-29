<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login2.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "sisgeresaude");

$query = "SELECT * FROM pacientes";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-image: url('img/pac.jpeg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .sombreado-notexto {
    color: #fff;
    text-shadow: 2px 2px 4px #000;
}

</style>

</head>
<body>
<?php include 'navbar.php'; ?>

    <div class="container mt-5">
    <h2 class="text-center sombreado-notexto">Lista de pacientes cadastrados</h2>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>RG</th>

                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["nomepaciente"]; ?></td>
                        <td><?php echo $row["cpfpaciente"]; ?></td>
                        <td><?php echo $row["rgpaciente"]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <a href="dashboard.php" class="btn btn-primary mb-4">Voltar</a>
    </div>

    <footer style="background-color: #007bff; color: white; text-align: center; padding: 20px 0;">
    Desenvolvido por <a href="https://mtech-solutions.vercel.app/" style="color: black; text-decoration: underline;">M.TECH - soluções em T.I</a>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
