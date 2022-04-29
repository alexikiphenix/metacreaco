<?php
    //require_once "header.php";
    require_once "../../utilities/Database.php";
    require_once "../../modeles/Person.php";


?>

        <div class="subcontainer">


            <?php 
                    $id_person = $_GET["person"];
                    Person::addClaims($id_person);

                    if(isset($_GET['addDuplicates']) && $_GET['addDuplicates'] == 1 )
                    {
                        Person::addDuplicates($id_person);
                    }

            ?>



        </div> <!--End of subcontainer ([section [article+aside]] + section) -->

<?php //require_once "footer.php"; ?>