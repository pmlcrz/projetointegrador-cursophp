<?php
include "conexao.php";
$sql = "select * from pacientes";
$qry = mysqli_query($con,$sql);
//var_dump($qry);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listar Pacientes</h1>
    <hr>
    <?php

    while ($linha = mysqli_fetch_array($qry)){
        $id=$linha['id'];
        echo $linha['id']."<br>";
        echo "Nome do Paciente:".$linha ['nomepaciente']."<br>";
        echo "CPF do Paciente:" .$linha ['cpfpaciente']."<br>";
        echo "Endereço:" .$linha ['enderecopaciente']."<br>";
        echo "Data de nascimento:" .$linha ['datanascimento']."<br>";
        echo "Telefone:" .$linha ['telefone']."<br>";
        echo "Email:" .$linha ['email']."<br>";
        echo "Número do Cartão do Sus:" .$linha ['numcartaosus']."<br>";
        echo "Equipe:" .$linha ['equipe']."<br>";
        echo "Nome da Mãe:" .$linha ['nomemae']."<br>";
        echo "Nome do Pai:" .$linha ['nomepai']."<br>";
        echo "Raça:"  .$linha ['raca']."<br>";
        echo "Sexo:"  .$linha ['sexo']."<br>";
        echo "Nacionalidade:"  .$linha ['nacionalidade']."<br>";
        echo "Status do Paciente:"  .$linha ['statuspac']."<br>";
        echo "Doença Preexistente:" .$linha ["doencapreexis"]. "<br>";
        echo " Detalhes da Doença:" .$linha ['detalhesdoenca']. "<br>";
        echo "<a href='editarpaciente.php?id={$id}'>Editar</a>"."<br>";
        echo "<a href='deletarpaciente.php?id={$id}'>Deletar</a>";
        echo "<hr>";
    
    }
    ?>
</body>
</html>
