<?php
// Arquivo com funções de verificação de permissões
include 'session.php';

// Função para verificar permissões de gerenciamento de pacientes
function podeGerenciarPacientes() {
    // Lógica para verificar permissões aqui
    return isLoggedIn(); // Exemplo: Qualquer usuário logado pode gerenciar pacientes
}

// Função para verificar permissões de marcação de consultas
function podeAgendarConsultas() {
    // Lógica para verificar permissões aqui
    return isLoggedIn(); // Exemplo: Qualquer usuário logado pode marcar consultas
}
?>
