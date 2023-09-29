<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// conectando com o banco de dados
$conn = new mysqli("localhost", "root", "", "sisgeresaude");

// variáveis da pesquisa
$cpfSearch = $numCartaoSusSearch = "";
$paciente = null;

// aqui ele verifica se o formulário de pesquisa foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpfSearch = $_POST["cpfSearch"];

    // vai executar a consulta com base no CPF do paciente
    if (!empty($cpfSearch)) {
        $query = "SELECT * FROM pacientes WHERE cpfpaciente = '$cpfSearch'";
    }

    // vai executar a consulta
    if (isset($query)) {
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $paciente = $result->fetch_assoc();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Pacientes</title>
    <style>
        body {
            /*margin-top: 56px;*/
            background-image: url('img/bgmed.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            padding: 0;
        }

.navbar-custom {
        background-color: #3498db;
        width: 100%;
        position: relative;
    }

    .navbar-custom .navbar-brand {
        color: #fff;
        font-size: 24px;
        font-weight: bold;
    }

    .navbar-custom .navbar-text {
        color: white;
        font-size: 18px;
        font-weight: bold;
    }

    .navbar-custom .navbar-nav {
        margin: 0 auto;
        display: table;
        table-layout: fixed;
        float: none;
    }

        .content {
            margin-top: 200px;
            margin-left: 350px;
        }

        form {
            margin-top: 50px;
            margin-right: 20px;
            display: inline-block;
        }
        label {
            color: #000;
            margin-bottom: 10px;
        }

        input[type="text"] {
            padding: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #000;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            margin: 150px auto;
            align-items: center;
            border-collapse: collapse;
            width: 80%;
            background-color: rgba(255, 255, 255, 0.7);
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            align-items: center;

        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        td {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            color: #fff;
        }

        .btn {
        border-radius: 2px;
        color: #fff;
        background-color: #007bff;
        width: 20px;
        height: 40px;
}

        footer {
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<!--
<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">CMS Augusta King</a>
    <span class="navbar-text ml-auto">Cuidar das pessoas é o nosso dever</span>
</nav> -->


    <div class="content">
        <h2>Gerenciar paciente</h2>
        <form method="POST" action="">
            <label for="cpfSearch">Digite o CPF do paciente:</label>
            <br>
            <input type="text" id="cpfSearch" name="cpfSearch" value="<?php echo $cpfSearch; ?>">
            <input type="submit" value="Pesquisar">
        </form>
        <br>
        <br>
        <a href="dashboard.php" class="btn">Voltar</a>
    </div>

        <?php if ($paciente) { ?>
           <!-- <h3>Gerenciar paciente</h3> -->
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
                <tr>
                    <td><?php echo $paciente["id"]; ?></td>
                    <td><?php echo $paciente["nomepaciente"]; ?></td>
                    <td><?php echo $paciente["cpfpaciente"]; ?></td>
                    <td>
                        <a href="editarpaciente.php?id=<?php echo $paciente["id"]; ?>">Editar</a> |
                        <a href="deletarpaciente.php?id=<?php echo $paciente["id"]; ?>">Excluir</a>
                    </td>
                </tr>
            </table>
        <?php } elseif ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <p>Nenhum paciente encontrado.</p>
        <?php } ?>




    <footer style="background-color: #007bff; color: white; text-align: center; padding: 20px 0; position: fixed; bottom: 0; width: 100%;">
    Desenvolvido por <a href="https://mtech-solutions.vercel.app/" style="color: black; text-decoration: underline;">M.TECH - soluções em T.I</a>
</footer>




</body>
</html>

<?php
$conn->close();
?>

