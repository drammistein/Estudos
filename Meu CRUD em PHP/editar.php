<?php
    require 'config.php';

    $info = []; // Vai ter as informações dos usuários
    $id = filter_input(INPUT_GET, 'id');

    if($id) { // Se foi enviado algum id vai prosseguir
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id); // vai mandar o $id
        $sql->execute(); // vai verificar no BD

        if($sql->rowCount() > 0) { // Se for maior que zero, foi achado o ID
            // Vai ser preenchido as informações
            // fetch() - vai pegar o primeiro item
            $info = $sql->fetch( PDO::FETCH_ASSOC ); 
            // Sendo preechida as informções vai ser pulado para o form

        } else {
            header('Location: index.php');
            exit;
        }

    } else { // Se não foi enviado ficará na mesma página
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
        
        <input type="hidden" name="id" value="<?php echo $info['id'];?>" />

        <label">
            Nome:<br/>
            <input type="text" name="name" value="<?php echo $info['nome'];?>" />
        </label><br/><br/>

        <label>
        E-mail:<br/>
        <input type="email" name="email" value="<?php echo $info['email'];?>" />
        </label><br/><br/>
        
        <input type="submit" value="Salvar" />
    </form>
    
</body>
</html>