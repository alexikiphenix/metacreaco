<?php
require_once "header.php";

    

?>

<section>                     
        <h2 id="title" class="center-txt">Inscription</h2>

        <article>
                
                <?php if(!empty($message)): ?>
                        <h4 class='center-txt'> <?= Tools::showMessage($message) ?> </h4>                                
                <?php endif ?>

                
                <form class="add-form" enctype="multipart/form-data" action="" method="post">
                    <fieldset class="field">
                        <legend>s'inscrire</legend>
                        <p>
                            <label for="email">Email*</label>
                            <?php if(!empty($_POST['email'])): ?>
                                    <input type="email" id="email" name="email" value="<?= htmlentities($_POST['email']) ?>">
                            <?php else: ?>
                                    <input type="email" id="email" name="email">
                            <?php endif ?>
                        </p>
                        <p class="centering-block">
                            Obligatoire ! Cette information est masquée, vous serez le/la seul(e)
                            à la voir.
                        </p>              
                        
                        <p>
                            <label for="aka">Pseudo</label>
                            <input type="text" id="aka" name="aka">
                        </p>
                        <p class="centering-block">
                            Essayez d'être original
                        </p>                
                        
                        <p>
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password">
                        </p>
                        <p class="centering-block">
                            Minimum 8 caractères. Minuscules, majuscules, chiffres...
                            Caratères spéciaux autorisés.                                                 
                        </p>
                
                    
                        <p>
                            <label for="name">Nom</label>
                            <input type="text" id="name" name="name">
                        </p>      
                        <p class="centering-block">
                            Facultatif, le nom est masqué
                        </p>                
                        
                        <p>
                            <label for="firstname">Prénom</label>
                            <input type="text" id="firstname" name="firstname">
                        </p>
                        <p class="centering-block">
                            Facultatif, le prénom est masqué                               
                        </p>
                    
                        
                        <p>
                            <label for="address">Adresse</label>
                            <textarea id="address" name="address"></textarea>
                        </p>
                        <p class="centering-block">
                            Ne pas oublier le numéro de rue et l'indice de répétition.                         
                        </p>

                        <p>
                            <label for="postcode">Code postal</label>
                            <input type="text" id="postcode" name="postcode">
                        </p>
                        <p class="centering-block">              
                            Facultatif, le prénom est masqué                        
                        </p>

                        <p>
                            <label for="city">Ville</label>
                            <input type="text" id="city" name="city">
                        </p>
                        <p class="centering-block">
                            Facultatif, la ville est masquée                           
                        </p>
                
                        <p>
                            <label for="emailMsg">Message</label>
                            <textarea id="emailMsg" name="emailMsg"></textarea>
                        </p>
                        <p class="centering-block">
                            Le commentaire est facultatif                             
                        </p>

                        <p>
                            <label for="avatar">Photo</label>
                            <input type="file" id="avatar" name="avatar">                          
                        </p>
                        <p class="centering-block">
                            Taille maximale de l'image 2mo                            
                        </p>
                        
                        <button class="enhanced_button-2" type="submit">
                            Enregistrer
                        </button>

                    </fieldset>
                </form>

               
            
            
        </article>


</section>