<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php            
        require_once "utilities/Tools.php";
            spl_autoload_register("Tools::MyAutoloader");  
        $password = "pa.3wa@2021";
        $hash = password_hash($password, PASSWORD_BCRYPT);
        echo "hash : ".$hash;
    ?>

    <?php if(!empty($_POST["password"]) && password_verify($_POST["password"], $hash)): ?>

        <strong>Mot de Passe valide !</strong>
    <?php else: ?>
        <strong>Mot de Passe invalide !</strong>
    <?php endif ?>

    <form action="" method="post">

        <p>
            <label for="password">Mot de passe</label>
        </p>
        <p>
            <input type="password" id="password" name="password">
        </p>

        
        <button type="submit">Envoyer</button>
    
    </form>

</body>
</html>