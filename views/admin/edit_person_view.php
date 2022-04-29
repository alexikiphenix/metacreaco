<?php
require_once "header.php";

?>

<section>


<?php if(!empty($message)): ?>
        <marquee>
            <h3 class='alert-txt center-txt'> <?= Tools::showMessage($message) ?> </h3>   
        </marquee>                     
<?php endif ?>


<h1 id="title">Modifier une fiche ADMIN</h1>


<form class="add-form" action="" enctype="multipart/form-data" method="post" >
    
    <fieldset class="field">
        <legend>Etat civil</legend>
                         
            <p>   
                <label for="name">Nom : </label>        
                <input type="text" id="name" name="name" required value="<?= html_entity_decode($person->getName()); ?>">
            </p>
            <p class="centering-block">
                Saisir le nom de naissance, et le nom usuel dans la rubrique surnom.
            </p> 
                                        
            <p>
                <label for="firstname">Prénom : </label>
                <input type="text" id="firstname" name="firstname" required value="<?= html_entity_decode($person->getFirstname()); ?>">
            </p>

            <p class="centering-block">
                Si plusieurs prénoms, il faut les séparer par des virgules.
            </p> 
        
        
            <p>                              
                <label for="aka">Surnom / diminutif : </label>
                <input type="text" id="aka" name="aka" value="<?= html_entity_decode($person->getAka()); ?>">
            </p>

            <p class="centering-block">
                Ex : l'Abbé Pierre, Mister Perfect...
            </p> 
            
                                    
            <p>    
                <span class="field-name">Sexe :</span>
                <input type="radio" class="input-radio" name="gender" id="H" value="H" required <?php if($person->getGender() === "H") echo "checked"; ?>>
                <label class="label-radio" for="H">Homme</label>  
            
                <input type="radio" class="input-radio" name="gender" id="F" value="F" required <?php if($person->getGender() === "F") echo "checked"; ?>>
                <label class="label-radio" for="F">Femme</label>
            
                <input type="radio" class="input-radio" name="gender" id="X" value="X" required <?php if($person->getGender() === "X") echo "checked"; ?>>
                <label class="label-radio" for="X">Autre</label> 
            </p>                        

            <p class="centering-block">
                Autre : intersexuel, transgenre,...
            </p> 

            <p>  
                <label for="birth">Date de naissance</label>
                <input type="date" id="birth" name="birth" max="<?= date('Y-m-d') ?>" value="<?= $person->getBirth() ?>">
            </p>
            <p class="centering-block">
                * Information obligatoire.
            </p> 
        

            <p>  
                <label for="nationality">Nationalité</label>
                <input type="text" name="nationality" id="nationality" value="<?= $person->getNationality() ?>">
            </p>
            <p class="centering-block">
                Ex: française, russe, tchadienne... 
            </p> 

            <p>  
                <label for="link">Lien vers un site internet</label>
                <input type="text" name="link" id="link" value="<?= html_entity_decode($person->getLink()) ?>">
            </p>
            <p class="centering-block">
                Ex: www.site.fr
            </p> 

            <p>  
                <label for="profession">Profession</label>
                <input type="text" name="profession" id="profession" value="<?= html_entity_decode($person->getProfession()) ?>">
            </p>

            <p class="centering-block">
                Si plusieurs professions, utiliser des virgules pour séparer.
            </p> 

            <p>  
                <label for="death">Décès (le cas échéant)</label>
                <input type="date" id="death" name="death" value="<?= $person->getDeath() ?>">
            </p>

            <p class="centering-block">
                Si possible expliquer les circonstances du décès dans la biographie.
            </p> 

            <p>
                <img class="edit-form-img" src="<?= $person->getImage() ?>" alt="<?= strip_tags(html_entity_decode($person->getName())) ?>" >   
                <label for="imgPerson">Photo</label>
                <input type="file" id="imgPerson" name="imgPerson">             
            </p>

            <p class="centering-block">
                8 Mo max, formats acceptés : JPEG, JPG, JTIF, PNG, GIF, TIFF, WEBP.                               
            </p> 

    </fieldset>
    <fieldset class="field">
        <legend>Contributions</legend>
        <?php 
            $listContributions = Contribution::list(); 
            $personContributions = JnctPersonContribution::listByIdPerson($person->getId());         
        ?>

        <div class="field">  
            <?php foreach($listContributions as $lc): ?>
          
                <p>   
                    <input type="checkbox" class="input-checkbox" id="contribution" name="contribution[]" value="<?= $lc->getId() ?>" <?php if(JnctPersonContribution::checkContrib($lc->getId(), $personContributions)){echo " checked";}; ?> >
                    <label class="label-checkbox" for="contribution[]"> <?= $lc->getName() ?> </label>
                </p>
            
                <p class="centering-block">   
                    <?= html_entity_decode($lc->getDescription()) ?>
                </p>
                
            <?php endforeach ?>
        </div>
       
    </fieldset>
    

    <fieldset class="field">    
        <legend>Risques encourus</legend>
        <div class="field"> 
            <?php 
                $listRisks = Risk::list(); 
                $personRisks= JnctPersonRisk::listByIdPerson($person->getId());            
            ?>

            <?php foreach($listRisks as $lr): ?>
                
                <p>   
                    <input type="checkbox" class="input-checkbox" id="risk[]" name="risk[]" value="<?= $lr->getId() ?>" <?php if(JnctPersonRisk::checkRisk($lr->getId(), $personRisks)){echo " checked";}; ?>>
                    <label class="label-checkbox" for="risk[]"> <?= $lr->getName() ?> </label>
                </p>
            
                <p class="centering-block">   
                    <?= $lr->getDescription() ?> 
                </p>
                
            <?php endforeach ?>            
        </div>
    </fieldset>
    <fieldset class="field">
        <legend>Biographie</legend>                  

            <p>
                Décrivez l'histoire de la personne, les contributions apportées et les risques pris le cas échéant.
            </p>
            <textarea name="description" id="description" cols="30" rows="10"><?= html_entity_decode($person->getDescription()) ?></textarea>
                 
    </fieldset>


    <button class="enhanced_button-2" type="submit">
        <i class="far fa-save"></i>Enregistrer
    </button>

</form>
</section>

<?php
require_once "footer.php";
?>
