<?php
$usuario_correto = "lucasbontempo1@gmail.com";
$senha_correta = "123456";

// Pega dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Verifica login
if ($email === $usuario_correto && $senha === $senha_correta) {
    header("Location: area/index.php");
    exit;
} else {
    echo "<script>alert('E-mail ou senha incorretos!'); window.location.href='area.html';</script>";
}
?>
    