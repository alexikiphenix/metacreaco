<?php
require_once "header.php";
?>

<section>                     
        <h2 id="title" class="center-txt">Inscription</h2>

        <article>
                
                <?php if(!empty($message)): ?>
                        <h4 class='center-txt'> <?= Tools::showMessage($message) ?> </h4>                                
                <?php endif ?>

                
                <form enctype="multipart/form-data" action="" method="post" class="width80 inline_2_boxes">
                    <fieldset>
                        <legend>s'inscrire</legend>
                        <div style="border: 1px solid black;">
                                <label for="email">Email*</label>
                                <?php if(!empty($_POST['email'])): ?>
                                        <input type="email" id="email" name="email" value="<?= htmlentities($_POST['email']) ?>">
                                <?php else: ?>
                                        <input type="email" id="email" name="email">
                                <?php endif ?>

                        </div>
                        <div style="border: 1px solid black;">
                                Obligatoire ! Cette information est masquée, vous serez le/la seul(e)
                                à la voir.
                        </div>                      
        
                        
                        <div>
                                <label for="aka">Pseudo</label>
                                <input type="text" id="aka" name="aka">
                        </div>
                        <div>
                                Essayez d'être original
                        </div>
                
                        
                        <div>
                                <label for="password">Mot de passe</label>
                                <input type="password" id="password" name="password">
                        </div>
                        <div>
                                <p>
                                        Minimum 8 caractères. Minuscules, majuscules, chiffres...
                                        Caratères spéciaux autorisés.
                                </p>                                
                        </div>
                
                    
                        <div>
                                <label for="name">Nom</label>
                                <input type="text" id="name" name="name">
                        </div>      
                        <div>
                                <p>
                                        Facultatif, le nom est masqué
                                </p>
                        </div>
                
                        
                        <div>
                                <label for="firstname">Prénom</label>
                                <input type="text" id="firstname" name="firstname">
                        </div>
                        <div>
                                <p>
                                        Facultatif, le prénom est masqué
                                </p>                               
                        </div>
                    
                        
                        <div>
                                <label for="address">Adresse</label>
                                <textarea id="address" name="address">
                                </textarea>
                        </div>
                        <div>
                                <p>
                                        Ne pas oublier le numéro de rue et l'indice de répétition.
                                </p>                               
                        </div>

                        <div>
                                <label for="postcode">Code postal</label>
                                <input type="text" id="postcode" name="postcode">
                        </div>
                        <div>
                                <p>
                                        Facultatif, le prénom est masqué
                                </p>                               
                        </div>

                        <div>
                                <label for="city">Ville</label>
                                <input type="text" id="city" name="city">
                        </div>
                        <div>
                                <p>
                                        Facultatif, la ville est masquée
                                </p>                               
                        </div>
                
                        <div>
                                <label for="emailMsg">Message</label>
                                <textarea id="emailMsg" name="emailMsg">
                                </textarea>
                        </div>
                        <div>
                                <p>
                                        Le commentaire est facultatif
                                </p>                               
                        </div>

                        <div>
                                <p class="width50">
                                        <label for="avatar">Photo</label>
                                        <input type="file" id="avatar" name="avatar">            
                                </p>                                
                        </div>
                        <div>
                                <p>
                                        Taille maximale de l'image 2mo
                                </p>                               
                        </div>


                        <p>
                                <input type="submit">
                        </p>
                    </fieldset>
                </form>

               
            
            
        </article>


</section>