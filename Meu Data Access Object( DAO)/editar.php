<?php
    require 'config.php';
    require 'dao/UsuarioDaoMysql.php';

    $usuarioDao = new UsuarioDaoMysql($pdo);

    $usuario = false; // Vai ter as informações dos usuários
    $id = filter_input(INPUT_GET, 'id');

    if($id) { 
        // Se não for achado o usuário será false
        $usuario = $usuarioDao->findById($id);
    }
    if($usuario === false) {
        header('Location: index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css"/>

    <title>Editar Usuário</title>
</head>
<body>

    <h1 id="editUser">Editando Usuário</h1> <br/>
        
    <form action="editar_action.php" method="POST" class="edit">
        
        <input type="hidden" name="id" value="<?php echo $usuario->getId();?>" />

        <label">
            Nome:<br/>
            <input type="text" name="name" value="<?php echo $usuario->getNome();?>" />
        </label><br/><br/>

        <label>
        E-mail:<br/>
        <input type="email" name="email" value="<?php echo $usuario->getEmail();?>" />
        </label><br/><br/>
        
        <input type="submit" value="Salvar" />
    </form>
    
</body>
</html>