<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'sisgeresaude';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>
