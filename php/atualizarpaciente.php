<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "sisgeresaude");

    $id = $_POST["id"];
    $nomepaciente = $_POST["nomepaciente"];
    $rgpaciente = $_POST["rgpaciente"];
    $cpfpaciente = $_POST["cpfpaciente"];
    $telefone = $_POST["telefone"];
    $enderecopaciente = $_POST["enderecopaciente"];
    $email = $_POST["email"];
    $equipe = $_POST["equipe"];
    $nacionalidade = $_POST["nacionalidade"];
    $nomemae = $_POST["nomemae"];
    $nomepai = $_POST["nomepai"];
    $numcartaosus = $_POST["numcartaosus"];
    $raca = $_POST["raca"];
    $sexo = $_POST["sexo"];
    $tiposanguineo = $_POST["tiposanguineo"];
    $datanascimento = $_POST["datanascimento"];
    $statuspac = $_POST["statuspac"];

    $query = "UPDATE pacientes SET nomepaciente = '$nomepaciente', rgpaciente = '$rgpaciente', cpfpaciente = '$cpfpaciente', telefone = '$telefone', enderecopaciente = '$enderecopaciente', email = '$email', equipe = '$equipe', nacionalidade = '$nacionalidade', nomemae = '$nomemae', nomepai = '$nomepai', numcartaosus = '$numcartaosus', raca = '$raca', sexo = '$sexo', tiposanguineo = '$tiposanguineo', datanascimento = '$datanascimento', statuspac = '$statuspac' WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        header("Location: pacientes.php"); 
        exit();
    } else {
        echo "Erro ao atualizar os dados: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: pacientes.php");
    exit();
}
?>
