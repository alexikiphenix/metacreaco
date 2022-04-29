<?php
require_once "header.php";

?>

<section>

    <?php if(isset($person)): ?>

            <marquee>
                Dernière personne ajoutée :
                <span>
                    <?= $person->getId()?>
                </span>   

                <span>
                    <?= $person->getName()?>
                </span>

                <span>
                    <?= $person->getFirstname().' | ' ?>
                </span>

                <span>
                    <?= $person->getAka() ?>
                </span>
            </marquee>

    <?php endif ?>

    
    
    
    
    <?php if(!empty($message)): ?>
        <marquee>           
                <?= $message ?>           
        </marquee>
    <?php endif ?>




<h1 id="title">Ajouter une personne au classement Admin</h1>


<form class="add-form" action="" enctype="multipart/form-data" method="post" >
    
    <fieldset>
        <legend>Etat civil</legend>
        <div class="field">                    
                        <p>   
                            <label for="name">Nom : </label>        
                            <input type="text" id="name" name="name" required maxlength="60" size="62">
                        </p>
                        <p class="centering-block">
                            Saisir le nom de naissance, et le nom usuel dans la rubrique surnom.
                        </p> 
                                                   
                        <p>
                            <label for="firstname">Prénom : </label>
                            <input type="text" id="firstname" name="firstname" required maxlength="60" size="62">
                        </p>

                        <p class="centering-block">
                            Si plusieurs prénoms, il faut les séparer par des virgules.
                        </p> 
                    

                   
                        <p>                              
                            <label for="aka">Surnom / diminutif : </label>
                            <input type="text" name="aka" maxlength="60" size="62">
                        </p>

                        <p class="centering-block">
                            Ex : l'Abbé Pierre, Mister Perfect...
                        </p> 
                        
                                                
                        <p>    
                            <span class="field-name">Sexe :</span>
                            <input type="radio" class="input-radio" name="gender" id="H" value="H" required>
                            <label class="label-radio" for="H">Homme</label>  
                        
                            <input type="radio" class="input-radio" name="gender" id="F" value="F" required>
                            <label class="label-radio" for="F">Femme</label>
                       
                            <input type="radio" class="input-radio" name="gender" id="X" value="X" required>
                            <label class="label-radio" for="X">Autre</label> 
                        </p>
                        

                        <p class="centering-block">
                            Autre : intersexuel, transgenre,...
                        </p> 

                        <p>  
                            <label for="birth">Date de naissance</label>
                            <input type="date" id="birth" name="birth" max="2020-01-01">
                        </p>
                        <p class="centering-block">
                            * Information obligatoire.
                        </p> 
                    

                        <p>  
                            <label for="nationality">Nationalité</label>
                            <input type="text" name="nationality" id="nationality" maxlength="60" size="62">
                        </p>
                        <p class="centering-block">
                            Ex: française, russe, tchadienne... 
                        </p> 
   
                        <p>  
                            <label for="link">Lien vers un site internet</label>
                            <input type="text" name="link" id="link" maxlength="60" size="62">
                        </p>
                        <p class="centering-block">
                            Ex: www.site.fr
                        </p> 
    
                        <p>  
                            <label for="profession">Profession</label>
                            <input type="text" name="profession" id="profession" maxlength="60" size="62">
                        </p>

                        <p class="centering-block">
                            Si plusieurs professions, utiliser des virgules pour séparer.
                        </p> 

                        <p>  
                            <label for="death">Décès (le cas échéant)</label>
                            <input type="date" id="death" name="death">
                        </p>

                        <p class="centering-block">
                            Si possible expliquer les circonstances du décès dans la biographie.
                        </p> 

                        <p>
                            <label for="imgPerson">Photo</label>
                            <input type="file" id="imgPerson" name="imgPerson" srcset="image/jpeg" >            
                        </p>

                        <p class="centering-block">
                            8 Mo max, formats acceptés : JPEG, JPG, JTIF, PNG, GIF, TIFF, WEBP.                               
                        </p>


        </div> <!-- <div class="field"> -->
    </fieldset>
    <fieldset>
        <legend>Contributions</legend>
        <?php $listContrib = Contribution::list(); ?>
        <div class="field">  
            <?php foreach($listContrib as $lc): ?>
          
                <p>   
                        <input type="checkbox" class="input-checkbox" id="contribution" name="contribution[]" value="<?= $lc->getId() ?>" >
                        <label class="label-checkbox" for="contribution[]"> <?= $lc->getName() ?> </label>
                </p>
            
                <p class="centering-block">   
                        <?= $lc->getDescription() ?> 
                </p>
                
            <?php endforeach ?>
        </div>
       
    </fieldset>
    

    <fieldset>    
        <legend>Risques encourus</legend>
        <div class="field"> 
            <?php $listRisk = Risk::list(); ?>

            <?php foreach($listRisk as $lr): ?>
                
                <p>   
                        <input type="checkbox" class="input-checkbox" id="risk" name="risk[]" value="<?= $lr->getId() ?>" >
                        <label class="label-checkbox" for="risk[]"> <?= $lr->getName() ?> </label>
                </p>
            
                <p class="centering-block">   
                        <?= $lr->getDescription() ?> 
                </p>
                
            <?php endforeach ?>            
        </div>
    </fieldset>
    <fieldset>
        <legend>Biographie</legend>                  

            <p class="centering-block">
                Décrivez l'histoire de la personne, les contributions apportées et les risques pris le cas échéant.
            </p>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>

            <p class="field-name">
                Booster cette personne :
            </p>
            <p>
                <input class="input-radio" type="radio" id="boost" name="boost" value="yes">
                <label class="label-radio" for="boost">Oui</label>
            </p>
            <p>
                <input class="input-radio" type="radio" id="boost" name="boost" value="no">
                <label class="label-radio" for="boost">Non</label>    
            </p>
                 
    </fieldset>


    <button class="enhanced_button-2" type="submit">
        <i class="fas fa-plus-square"></i>Ajouter cette personne
    </button>



</form>
</section>

<?php
require_once "footer.php";
?>
