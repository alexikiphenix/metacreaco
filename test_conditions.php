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
            $user = 7;
       
    ?>

    <?php if(!empty($_POST["role"])): ?> 
        <p>Id : <?= $_POST["userId"] ?></p>
        <p>Role : <?= $_POST["role"] ?></p>
        <?php if($_POST["role"] == "admin" || ($_POST["role"] == "user" && $user == $_POST["userId"])): ?>
            <p>Vous avez les pleins pouvoirs !</p>
        <?php endif ?>
    <?php else: ?>
        <strong>Saisissez les infos</strong>
    <?php endif ?>

    <form action="" method="post">

        <p>
            <label for="userId">Votre ID</label>
        </p>
        <p>
            <input type="text" id="userId" name="userId">
        </p>

        <p>
            <label for="role">Votre role</label>
        </p>
        <p>
            <input type="text" id="role" name="role">
        </p>



        
        <button type="submit">Envoyer</button>
    
    </form>

</body>
</html>