<?php

include "conexao.php";
$cpfdepaciente = $_GET['cpf'];
$dataconsulta = $_GET['dataconsulta'];
$horaconsulta = $_GET['horaconsulta'];
$motivoconsulta = $_GET['motivoconsulta'];
$nomepaciente = $_GET['nomepaciente'];
$numcartaosus = $_GET['numcartaosus'];

$sql = "insert into consulta (cpfdepaciente, dataconsulta, horaconsulta, motivoconsulta, nomepaciente, numcartaosus)
values ('$cpfdepaciente', '$dataconsulta', '$horaconsulta', '$motivoconsulta', '$nomepaciente', '$numcartaosus)";


$qry = mysqli_query($con,$sql);

if ($qry) {
    header ('location: listarpaciente.php');
} else {
    echo "<h1>Registro não cadastrado</h1>";
}

?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Paciente</title>
</head>
<body>
    <form action="cadastropaciente.php">
        <div class="container">
            <div class= "row">
                <div class="col">

     Paciente   <input Type="text" name="paciente"><br>
</div>
<div class="col">
CPF   <input Type="text" name="cpf"><br>
</div>
<div class="col">
Numcartãosus   <input Type="text" name="numcartaosus"><br>
</div>
<div class="col">

     Motivodaconsulta   <input Type="text" name="motivodaconsulta"><br>
</div>
</div>

<div class= "row">
                <div class="col">

     Data consulta  <input Type="date" name="dataconsulta"><br>

</div>
 <div class="col">

     Hora consulta   <input Type="time" name="hora consulta"><br>
<input type="submit" value="Cadastrar">

</form>

    
</body>
</html>