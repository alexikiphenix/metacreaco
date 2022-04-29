<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test conversion date</title>
    <style>




    </style>

</head>
<body>

    <?php
        require_once "utilities/Tools.php";
            spl_autoload_register("Tools::MyAutoloader");        
            
            $user1 = 
            [
                "id" => 1,
                "email" => "b_jordan@poumail.com",
                "aka" => "b_jordan",
                "password" => '$2y$10$Tg0f51JZkUSF/Ehh7rhHmePMeSYJF9VmlPjkbXziplzgscn9X6LJO',
                "name" => "Jordan",
                "firstname" => "Abd",
                "address" => null,
                "postcode" => 0,
                "city" => null,
                "image" => "assets/img/users/23/23.jpg",
                "createdAt" => 2020-12-29,
                "role" => "user",
                "activated" => 0,
                "points" => 8500,
                "lastLogin" => 0000-00-00,
                "activationId" => 2837536371,
                "nbActivationsRq" => 0
            ];

            $user2 = $user1;
            
            $user1 = json_encode($user1);
               
        //$user = new User;
        $user = User::getById(1);             
    ?>


    <pre>
        <?php print_r($user1); ?>
    </pre>

    <pre>
        <?php print_r($user); ?>
    </pre>

    
    <pre>
        
        <?php 
            $user1 = json_decode($user1);
            print_r($user1); 
        ?>
    </pre>



</body>
</html>