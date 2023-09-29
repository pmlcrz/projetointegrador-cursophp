<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "sisgeresaude");

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM funcionarios WHERE matricula = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["senha"])) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_type"] = $row["tipo"];
            header("Location: dashboard.php");
            exit();
        }
    }

    $error_message = "Credenciais inválidas.";
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/login.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

<?php include 'navbar.php'; ?>



<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="img/login.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post" action="">
                    <h2> ACESSAR SISTEMA</h2>
                    <br>
                    <div class="form-outline mb-4">
                    <label class="form-label" for="username">Matrícula:</label>
                        <input type="text" name="username" id="username" class="form-control form-control-lg"
                               placeholder="Digite sua matricula" />
                            </div>
                    <div class="form-outline mb-3">
                    <label class="form-label" for="password">Senha:</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg"
                               placeholder="Digite a senha" />
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

<footer style="background-color: #007bff; color: white; text-align: center; padding: 20px 0;">
    Desenvolvido por <a href="https://mtech-solutions.vercel.app/" style="color: black; text-decoration: underline;">M.TECH - soluções em T.I</a>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</body>
</html>
