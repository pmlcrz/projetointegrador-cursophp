<?php
$conn = new mysqli("localhost", "root", "", "sisgeresaude");

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

$query = "SELECT * FROM pacientes";

$result = $conn->query($query);

if (!$result) {
    die("Erro na consulta ao banco de dados: " . $conn->error);
}

$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode(['data' => $data]);
?>
