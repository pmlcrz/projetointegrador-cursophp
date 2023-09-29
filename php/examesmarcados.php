<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login2.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "sisgeresaude");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$query = "SELECT * FROM exames";

$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exames Marcados</title>

    <!-- <link rel="stylesheet" href="css/examesmarc.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
<style>
body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url('./img/exa.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.navbar {
    font-family: 'Times New Roman', Times, serif;
    text-align: center;
    background-color: #007bff;
    color: white;
    padding: 10px 0;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
 }

.navbar a {
    text-align: center;
    color: white;
     text-decoration: none;
}

h2.text-center{
    color: #fff;
    text-shadow: 2px 2px 4px black;

}

table {
    margin-top: 50px;
    background-color: white;
    border-radius: 10px;
    border-collapse: collapse;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

table th, table td {
    padding: 10px;
    text-align: left;
}

footer {
    background-color: #007bff;
    color: white;
    text-align: center;
    padding: 10px;
    width: 100%;
    position: absolute;
    bottom: 0;
}

footer a {
    color: white;
    text-decoration: underline;
}

    </style>

</head>
<body>

<?php include 'navbar.php'; ?>


    <div class="container mt-5">
        <h2 class="text-center">Exames Marcados</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>CPF do Paciente</th>
                    <th>Número do Cartão do SUS</th>
                    <th>Data do Exame</th>
                    <th>Hora do Exame</th>
                    <th>Tipo de Exame</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nomepaciente"] . "</td>";
                        echo "<td>" . $row["cpfpaciente"] . "</td>";
                        echo "<td>" . $row["numcartaosus"] . "</td>";
                        echo "<td>" . $row["dataexame"] . "</td>";
                        echo "<td>" . $row["horaexame"] . "</td>";
                        echo "<td>" . $row["tipoexame"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Nenhum exame marcado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="dashboard.php" class="btn btn-primary">Voltar</a>
        <a href="index.php" class="btn btn-info">Deslogar</a>


    </div>

    <footer style="background-color: #007bff; color: white; text-align: center; padding: 20px 0;">
    Desenvolvido por <a href="https://mtech-solutions.vercel.app/" style="color: black; text-decoration: underline;">M.TECH - soluções em T.I</a>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
