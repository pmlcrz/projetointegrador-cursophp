<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica da familia Augusta King</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <span class="navbar-brand">CMS Augusta King</span>
    <span class="navbar-text ml-auto">Cuidar das pessoas é nosso dever</span>
</nav>

<div class="content text-center">
    <h1>Bem-vindo(a) à Clínica da família Augusta King</h1>
    <br>
    <?php include 'permissions.php'; ?>

    <a href="login2.php" class="btn btn-primary">Acessar sistema</a>
</div>

<!-- Vídeo de Fundo -->
<video autoplay muted loop style="color: #ffffff; position: fixed; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
    <source src="video/medicabg.mp4" type="video/mp4">
</video>

<footer style="background-color: #007bff; color: white; text-align: center; padding: 20px 0;">
    Desenvolvido por <a href="https://mtech-solutions.vercel.app/" style="color: black; text-decoration: underline;">M.TECH - soluções em T.I</a>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
