<?php
$servidor ='localhost';
$usuario = 'root';
$senha = '';
$bd = 'sisgeresaude';
$con = mysqli_connect('localhost',$usuario,$senha,$bd);

if ($con) {
    echo "conectado ao sisgeresaude";
} else{
    echo "<h1>Erro na Conexão</h1>";
}