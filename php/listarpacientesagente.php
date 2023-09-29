<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login2.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "sisgeresaude");

$search_result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST["search"];

    $query = "SELECT * FROM pacientes WHERE numcartaosus LIKE '%$search%'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $search_result = $result;
    } else {
        $search_result = "Nenhum paciente encontrado com esse número do cartão SUS.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
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
        <h2 class="text-center sombreado-notexto">Lista de Pacientes</h2>

        <form method="post" class="mb-4">
            <div class="mb-3">
                <label class="form-label sombreado-notexto">Pesquisar paciente por número do cartão SUS:</label>
                <div class="input-group">
                    <input type="text" name="search" class="form-control" required>
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </div>
        </form>

        <?php if ($search_result !== "") { ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($search_result !== "Nenhum paciente encontrado com esse número do cartão SUS.") {
                        while ($row = $search_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["nomepaciente"]; ?></td>
                                <td><?php echo $row["cpfpaciente"]; ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="4"><?php echo $search_result; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>

        <a href="dashboard.php" class="btn btn-light mt-3">Voltar</a>
    </div>


    <footer style="background-color: #007bff; color: white; text-align: center; padding: 20px 0; position: fixed; bottom: 0; width: 100%;">
    Desenvolvido por <a href="https://mtech-solutions.vercel.app/" style="color: black; text-decoration: underline;">M.TECH - soluções em T.I</a>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
