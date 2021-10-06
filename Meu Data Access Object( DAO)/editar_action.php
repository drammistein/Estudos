<?php
    require 'config.php';
    require 'dao/UsuarioDaoMysql.php';

    $usuarioDao = new UsuarioDaoMysql($pdo);
    
    $id = filter_input(INPUT_POST, 'id');
    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if($id && $name && $email) {
        // Vai atualizar os dados
        //$usuario = $usuarioDao->findById($id);
        $usuario = new Usuario();
        $usuario->setId($id);
        $usuario->setNome($name);
        $usuario->setEmail($email);

        $usuarioDao->update($usuario);
        // Após atualização dos dados volta para o index.php
        header('Location: index.php');
        exit;

    } else {
        // Se der problema vai voltar para o editar com o ID do usuario
        header('Location: editar.php?id='.$id);
        exit;
    }

?>