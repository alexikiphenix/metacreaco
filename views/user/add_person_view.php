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




<h1 class="center_inline" style="border 1px solid;">Ajouter une personne au classement</h1>

<form action="" enctype="multipart/form-data" method="post" >

        <h2 class="center-txt">Etat civil</h2>
        <div class="large center_block regular padding_m">
                
                    <div class="display_flex border_b"> 
                        <p class="width50">   
                            <label for="name">Nom : </label>        
                            <input type="text" name="name" required maxlength="60" size="62">
                        </p>
                        <p class="width50">
                            Explication
                        </p> 
                        
                    </div>

                    <div class="display_flex border_b"> 
                        <p class="width50">
                            <label for="firstname">Prénom : </label>
                            <input type="text" name="firstname" required maxlength="60" size="62">
                        </p>

                        <p class="width50">
                            Explication
                        </p> 
                    </div>

                    <div class="display_flex border_b"> 
                        <p class="width50">    
                            <label for="aka">Surnom / diminutif : </label>
                            <input type="text" name="aka" maxlength="60" size="62">
                        </p>

                        <p class="width50">
                            Explication
                        </p> 
                    </div>


                    <div class="display_flex border_b"> 
                        
                        
                        <div class="box width50">  
                            <div>Sexe : </div>
                            <div>
                                <input type="radio" name="gender" id="H" value="H" required>
                                <label class="display_inline" for="H">Homme</label>
                            </div>

                            <div>
                                <input type="radio" name="gender" id="F" value="F" required>
                                <label class="display_inline" for="F">Femme</label>
                            </div>

                            <div>
                                <input type="radio" name="gender" id="X" value="X" required>
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
                            <input type="date" name="birth" max="2020-01-01">
                        </p>
                        <p class="width50">
                            Explication
                        </p> 
                    </div>

                    <div class="display_flex border_b"> 
                        <p class="width50">  
                            <label for="link">Lien vers un site internet</label>
                            <input type="text" name="link" id="link" maxlength="60" size="62">
                        </p>
                        <p class="width50">
                            Précisions
                        </p> 
                    </div>


                    <div class="display_flex border_b"> 
                        <p class="width50">  
                            <label for="profession">Profession</label>
                            <input type="text" name="profession" id="profession" maxlength="60" size="62">
                        </p>

                        <p class="width50">
                            Explication
                        </p> 
                    </div>


                    <div class="display_flex border_b"> 
                        <p class="width50">  
                            <label for="death">Décès (le cas échéant)</label>
                            <input type="date" name="death">
                        </p>

                        <p class="width50">
                            Explication
                        </p> 
                    </div>




                    <div class="display_flex border_b">
                        <p class="width50">
                            <label for="image">Photo</label>
                            <input type="file" name="imgPerson" size="50">            
                        </p>

                        <p class="width50">
                            Explication
                        </p> 
                    </div>

        </div>


        <h2 class="center-txt">Contributions</h2>
        <div class="large center_block regular padding_m">
            

            <?php $listContrib = Contribution::list(); ?>

            <?php foreach($listContrib as $lc): ?>
                <div class="display_flex border_b">
                    <div class="width50">   
                            <input type="checkbox" id="<?= $lc->getId() ?>" name="contribution[]" value="<?= $lc->getId() ?>" >
                            <label class="display_inline" for="contribution"> <?= $lc->getName() ?> </label>
                    </div>
                
                    <div class="width50">   
                            <?= $lc->getDescription() ?> 
                    </div>
                </div>
            <?php endforeach ?>

        </div>


        <h2 class="center-txt">Risques encourus</h2>
        <div class="large center_block regular padding_m">
            

            <?php $listRisk = Risk::list(); ?>

            <?php foreach($listRisk as $lr): ?>
                <div class="display_flex border_b">
                    <div class="width50">   
                            <input type="checkbox" id="<?= $lr->getId() ?>" name="risk[]" value="<?= $lr->getId() ?>" >
                            <label class="display_inline" for="risk[]"> <?= $lr->getName() ?> </label>
                    </div>
                
                    <div class="width50">   
                            <?= $lr->getDescription() ?> 
                    </div>
                </div>
            <?php endforeach ?>
            
        </div>

        <div class="large center_block padding_0">
            <h3>Biographie</h3>

                    <p>Essayez de préciser les informations certaines et préciser les incertitudes.
                    </p>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    
                
                
        


        </div>



        <button type="submit" class="button_center">Ajouter cette personne</button>

</form>
</section>

<?php
require_once "footer.php";
?>
