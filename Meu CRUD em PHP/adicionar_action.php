<?php
    require 'config.php';

    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if($name && $email) {
        // Verificar se o mesmo e-mail foi adicionado mais de uma vez
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        // Inserindo os dados com segurança
        // Se não constar o e-mail no BD vai prosseguir com o procedimento
        if($sql->rowCount() === 0) {

            $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
            $sql->bindValue(':name', $name); // bindValue() - realiza a definição do valor do parâmetro
            $sql->bindValue(':email', $email);
            $sql->execute();

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