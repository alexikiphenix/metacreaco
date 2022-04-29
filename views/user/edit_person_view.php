<?php
require_once "header.php";
/*
private $id; private $name;
private $firstname; private $aka; private $gender; private $birth; private $createdAt;
private $votes; private $points; private $description; private $death;
private $editedAt; private $activated; private $duplicates; private $claims;
private $link_wiki; private $image; private $userId;
*/

?>

<?php if(isset($_FILES)): ?>
        <pre>
            <?= print_r($_FILES); ?>
        </pre>
<?php endif ?>



<section>

  


<h1 class="center_inline" style="border 1px solid;">Modifier une personne USER MODE</h1>


<?php if(!empty($message)): ?>
      <h3 class='alertTxt center-txt'> <?= Tools::showMessage($message) ?> </h3>                                
<?php endif ?>


<form action="" enctype="multipart/form-data" method="post" >


        <h2 class="center-txt">Etat civil</h2>
        <div class="large center_block regular padding_m">
                
                    <div class="display_flex border_b"> 
                        <p class="width50">   
                            <label for="name">Nom : </label>        
                            <input type="text" name="name" required maxlength="60" size="62" value="<?= htmlentities($person->getName()); ?>">
                        </p>
                        <p class="width50">
                            Explication
                        </p> 
                        
                    </div>

                    <div class="display_flex border_b"> 
                        <p class="width50">
                            <label for="firstname">Prénom : </label>
                            <input type="text" name="firstname" required maxlength="60" size="62" value="<?= htmlentities($person->getFirstname()); ?>">
                        </p>

                        <p class="width50">
                            Explication
                        </p> 
                    </div>

                    <div class="display_flex border_b"> 
                        <p class="width50">    
                            <label for="aka">Surnom / diminutif : </label>
                            <input type="text" name="aka" maxlength="60" size="62" value="<?= htmlentities($person->getAka()); ?>">
                        </p>

                        <p class="width50">
                            Explication
                        </p> 
                    </div>


                    <div class="display_flex border_b"> 
                        
                        
                        <div class="box width50">  
                            <div>Sexe : </div>
                            <div>
                                <input type="radio" name="gender" id="H" value="H" required <?php if($person->getGender() === "H") echo "checked"; ?>>
                                <label class="display_inline" for="H">Homme</label>
                            </div>

                            <div>
                                <input type="radio" name="gender" id="F" value="F" required <?php if($person->getGender() === "F") echo "checked"; ?>>
                                <label class="display_inline" for="F">Femme</label>
                            </div>

                            <div>
                                <input type="radio" name="gender" id="X" value="X" required <?php if($person->getGender() === "X") echo "checked"; ?>>
                                <label class="display_inline" for="X">Indéterminé</label>
                            </div>
                        </div>

                        <p class="width50">
                            Indéterminé : intersexuel, transgenre, sexe non officiellement déterminé.
                        </p> 
                    </div>

                    <div class="display_flex border_b"> 
                        <p class="width50">  
                            <label for="birth">Date de naissance</label>
                            <input type="date" name="birth" max="2020-01-01"  <?= 'value="'.$person->getBirth().'"';?>>
                        </p>
                        <p class="width50">
                            Explication
                        </p> 
                    </div>

                    <div class="display_flex border_b"> 
                        <p class="width50">  
                            <label for="link">Lien vers un site internet</label>
                            <input type="text" name="link" id="link" maxlength="60" size="62" <?= 'value="'.$person->getLink().'"';?>>
                        </p>
                        <p class="width50">
                            Précisions
                        </p> 
                    </div>


                    <div class="display_flex border_b"> 
                        <p class="width50">  
                            <label for="profession">Profession</label>
                            <input type="text" name="profession" id="profession" maxlength="60" size="62" <?= 'value="'.$person->getProfession().'"';?>>
                        </p>

                        <p class="width50">
                            Explication
                        </p> 
                    </div>


                    <div class="display_flex border_b"> 
                        <p class="width50">  
                            <label for="death">Décès (le cas échéant)</label>
                            <input type="date" id="death" name="death" <?= 'value="'.$person->getDeath().'"';?>>
                        </p>

                        <p class="width50">
                            Explication
                        </p> 
                    </div>




                    <div class="display_flex border_b">
                        <p class="width50">
                            <?= '<img class="width_m" src="'.$person->getImage().'" alt="'.$person->getName().'" >';?>    
                            <label for="imgPerson">Photo</label>
                            <input type="file" id="imgPerson" name="imgPerson">            
                        </p>

                        <p class="width50">
                            Explication
                        </p> 
                    </div>

        </div>
        

        <h2 class="center-txt">Contributions</h2>
        <div class="large center_block regular padding_m">
            

            <?php $listContrib = Contribution::list(); ?>
            <?php  
                    $person_contrib= JnctPersonContribution::listByIdPerson($person->getId()); 
                            
                                                        
            ?>

            <?php foreach($listContrib as $lc): ?>
                <div class="display_flex border_b">
                    <div class="width50">   
                            <input type="checkbox" id="<?= $lc->getId() ?>" name="contribution[]" value="<?= $lc->getId() ?>" <?php if(JnctPersonContribution::checkContrib($lc->getId(), $person_contrib)){echo " checked";}; ?>>
                            <label class="display_inline" for="contribution"> <?= html_entity_decode($lc->getName()) ?> </label>
                         
                    </div>
                
                    <div class="width50">   
                            <?= html_entity_decode($lc->getDescription()) ?> 
                    </div>
                </div>
            <?php endforeach ?>

        </div>


        <h2 class="center-txt">Risques encourus</h2>
        <div class="large center_block regular padding_m">
            

            <?php 
                $listRisk = Risk::list(); 
                $person_risk= JnctPersonRisk::listByIdPerson($person->getId()); 
               
            ?>

            <?php foreach($listRisk as $lr): ?>
                <div class="display_flex border_b">
                    <div class="width50">   
                            <input type="checkbox" id="<?= $lr->getId() ?>" name="risk[]" value="<?= $lr->getId() ?>" <?php if(JnctPersonRisk::checkRisk($lr->getId(), $person_risk)){echo " checked";}; ?> >
                            <label class="display_inline" for="risk[]"> <?= html_entity_decode($lr->getName()) ?> </label>
                    </div>
                
                    <div class="width50">   
                            <?= html_entity_decode($lr->getDescription()) ?> 
                    </div>
                </div>
            <?php endforeach ?>
            
        </div>

        <div class="large center_block padding_0">
            <h3>Biographie</h3>

                    <p>Essayez de préciser les informations certaines et préciser les incertitudes.
                    </p>
                    <textarea name="description" id="description" cols="30" rows="10"><?= html_entity_decode($person->getDescription()); ?></textarea>
                    
                
                
        


        </div>



        <button type="submit" class="button_center">Valider modifications</button>


        <?php

            if(isset($_POST["contribution"]) && $_POST["risk"])
            {
                echo "<pre>";
                   // var_dump($_POST['contribution']);
                    var_dump($_POST['risk']);
                echo "</pre>";            
            }

        ?>

</form>
</section>

<?php
require_once "footer.php";
?>
