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

    <?php if(isset($_POST)): ?> 
        <p>Name : <?= $_POST["name"] ?></p>       
  
    <?php endif ?>

    <?php 
    $getPerson = 85;

    /**
     * Allow you to modify a person and his/her contributions + risks
     * @return bool
     */
    function edit() : bool
    {
      
        if(!empty($_POST["name"]))
        {             
            $idPerson = htmlentities($getPerson); 
                
            if(Person::getById($idPerson) instanceof Person)
            {
                $person = Person::getById($idPerson);
                $path = $person->getImage();

                if(!empty($_FILES['imgPerson']['size']))
                {
                    if($_FILES['imgPerson']['size'] > 0)
                        $path = Tools::putImage('imgPerson', 'person', $idPerson);                                           
                }
                else if(empty($path)) 
                    $path = "assets/img/person/no-img.jpg";

                    $person->setName(trim(htmlentities($_POST["name"])));                
                    $person->setImage($path);                                    

                    $person->edit();
            
                    if(isset($_POST['contribution']) && is_array($_POST['contribution']))
                    $selectedContribs = $_POST['contribution'];
                    else 
                    $selectedContribs = [];

                    if(isset($_POST['risk']) && is_array($_POST['risk']))
                        $selectedRisks = $_POST['risk'];
                    else 
                        $selectedRisks = [];
                

                    if(isset($_GET["page"]) 
                        && is_numeric($_GET["page"])
                        && isset($_GET["rank"]) 
                        && is_numeric($_GET["rank"])
                        && isset($_GET["offset"]) 
                        && is_numeric($_GET["offset"])
                        && isset($_GET["limit"]) 
                        && is_numeric($_GET["limit"])                    
                    )
                    {
                        // BECAUSE OF ANCHOR I CHOOSE TO REDIRECT INSTEAD OF USING RENDERVIEW() TO SEND ALL PARAMETERS TO THE PAGE WILL BE RELOADED WITH GOOD PARAMETERS
                        $this->redirectTo('index.php?class=person&action=show&person='.$getPerson.'&rank='.$_GET["rank"].'&page='.$_GET["page"].'&offset='.$_GET["offset"].'&limit='.$_GET["limit"].'#title');                    
                    }
                    else
                    {      
                        Tools::redirectTo('index.php?class=person&action=show&person='.$getPerson.'');
                    }                  
                    
                return true;
            }
            else
            {
                (new DefaultController())->index(); 
                return false;
            }
        } // if(!empty($_POST["name"]) && !empty($getPerson) && is_numeric($getPerson)
        else if(!empty($getPerson) && is_numeric($getPerson))
        {
            if(Person::getById($getPerson) instanceof Person)
            {
                $idPerson = $getPerson; 
                $this->renderView("admin/edit_person_view", [
                    "person" => Person::getById($idPerson)                        
                ]);
                return false;    
            }
            else
            {
                (new DefaultController())->index();   
                return false; 
            }
        }
        else
        {
            (new DefaultController())->index();   
            return false;              
        }        
    }
?>




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