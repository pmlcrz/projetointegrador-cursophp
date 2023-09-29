<?php
include "conexao.php";

$query = "SELECT * FROM funcionarios";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Tipo: {$row["tipo"]}, Nome: {$row["nome"]}, Matrícula: {$row["matricula"]}<br>";
    }
} else {
    echo "Nenhum funcionário cadastrado.";
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Listar funcionários</title>
</head>
<body>
    <h2>Listar Funcionários</h2>
    <a href="inserirfunc.php">Cadastrar novo funcionário</a>
    <br>
    <a href="index.php">Inicio</a>

</body>
</html>
