<?php
/*$servidor = "localhost";
$bd = "sisgeresaude";
$usuario = "root";
$senha = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
*/

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'sisgeresaude';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>

