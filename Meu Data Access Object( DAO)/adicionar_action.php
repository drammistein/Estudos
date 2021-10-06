<?php
    require 'config.php';
    require 'dao/UsuarioDaoMysql.php';

    $usuarioDao = new UsuarioDaoMysql($pdo);

    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if($name && $email) {

        if($usuarioDao->findByEmail($email) === false) {
            // Se não achar nada vai adicionar um e-mail.
            $novoUsuario = new Usuario();
            $novoUsuario->setNome($name);
            $novoUsuario->setEmail($email);
            
            $usuarioDao->add( $novoUsuario );
            header("Location: index.php");
            exit;

        } else {
            header("Location: adicionar.php");
            exit;
        }

    } else {
        header("Location: adicionar.php");
        exit;
    }
?>