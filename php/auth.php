<?php
// Verifique as credenciais e crie uma sessão de usuário
session_start();
$_SESSION['user_id'] = 1; // ID do usuário autenticado
header('Location: dashboard.php');
?>
