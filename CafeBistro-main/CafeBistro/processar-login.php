<?php

require "conexao.php";
require "autenticacao.php";

if ($_SERVER["REQUEST_METHOD"] =="POST"){
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $login = new autenticacao($conn);
    $usuario = $login->verificarUsuario($email, $senha);
    if($usuario){
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: index.php");
        exit;
    }else{

        header("Location: login.php?error=1");
    }
}
?>