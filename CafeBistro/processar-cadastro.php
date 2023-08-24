<?php
      include "conexao.php";
      include "Usuario.php";
      

      if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $confirmarsenha = $_POST["confirmarsenha"];

        if ($senha === $confirmarsenha){
            //conexão com o banco de dados;
            $usuario = new Usuario($conn);
            //cadastrar o usuario
            if ($usuario ->cadastrar($nome, $email, $senha)){
                //redirecionar para a origem de sucesso após o cadastro
                header("Location: cadastrar-usuario-sucesso.php");
                exit();
            }else{
                echo "Erro! Tente novamente!";
            }
        } else{
            header("Location: cadastrar-usuario.php?erro=1");
        }
      }
?>