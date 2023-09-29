<?php
// Arquivo para iniciar e gerenciar a sessão do usuário
session_start();

// Função para verificar se o usuário está logado
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}
?>
