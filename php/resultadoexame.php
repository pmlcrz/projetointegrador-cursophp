<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Verificar Resultados de Exames</title>
</head>
<body>
<style>
    body {
        background-color: #6495ED;
    }

    .navbar-custom {
        background-color: #3498db;
    }

    .navbar-custom .navbar-brand {
        color: white;
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

    footer {
        text-align: center;
        background-color: #1a8afa;
        color: #fff;
        padding: 10px;
        margin-top: 117px;
    }
</style>

<nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">CMS Augusta King</a>
    <span class="navbar-text ml-auto">Cuidar das pessoas é o nosso dever</span>
</nav>

<div class="container mt-5">
    <h2>Verificar Resultados de Exames</h2>
    <form method="post" action="processar_resultados.php">
        <div class="mb-3">
            <label for="numcartaosus">Número do Cartão do SUS ou CPF:</label>
            <input type="text" class="form-control" id="numcartaosus" name="numcartaosus" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Verificar</button>
        </div>
    </form>

    <?php

    ?>

</div>

<footer>
    <p>&copy; Desenvolvido por <a href="https://github.com/pmlcrz">M.TECH</a></p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>
