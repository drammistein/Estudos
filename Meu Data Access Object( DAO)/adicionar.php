<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css"/>

    <title>Adicionar Usuário</title>
</head>
<body>

<div class="addUsers">

    <h1 id="addUser">Acidionar Usuário</h1>
        
    <form action="adicionar_action.php" method="POST" class="add">
        <label">
            Nome:<br/>
            <input type="text" name="name">
        </label><br/><br/>

        <label>
        E-mail:<br/>
        <input type="email" name="email" />
        </label><br/><br/>
        
        <input type="submit" value="Adicionar" />
    </form>
    
</div>    
</body>
</html>