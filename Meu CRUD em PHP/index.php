<?php
    require 'config.php';

    $lista = []; 
    // Pegando os usuários
    $sql = $pdo->query("SELECT * FROM usuarios");
    if($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css"/>
    <title>My CRUD</title>
</head>
<body>  
    <section>
        <div class="title">
            <h1>Meu CRUD de Estudo em PHP</h1>
        </div>
        
        <a id="ad" href="adicionar.php">Adicionar Usuário</a>

        <table width="100%">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>AÇÕES</th>
            </tr>
            
            <?php // Vai exibir os dados na tabela em modo dinâmico ?>
            <?php foreach($lista as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['email']; ?></td> 
                    <td>
                        <a id="edit" href="editar.php?id=<?php echo $usuario['id'];?>">[ Editar ]</a>    
                        <a id="delete" href="excluir.php?id=<?php echo $usuario['id'];?>" onclick="return confirm('Você tem certeza que deseja excluir?')">[ Excluir ]</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

    </section>
     
</body>
</html>