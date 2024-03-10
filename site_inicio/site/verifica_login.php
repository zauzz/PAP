<?php
// Verifica se as informações de login estão presentes nas cookies
if(isset($_COOKIE['usuario']) && isset($_COOKIE['senha'])) {
    // Se as informações estiverem presentes, redirecione para a página própria
    header("Location: ja_logado.html");
    exit; // Certifique-se de sair após o redirecionamento
} else {
    // Se as informações não estiverem presentes, exiba a página de login
    header("Location: login.html");
    exit; // Certifique-se de sair após o redirecionamento
}
?>
