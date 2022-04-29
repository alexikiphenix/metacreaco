<?php
require_once "header.php";

    

?>

<section>                     
        <h2 class="center-txt">Modifier mon profil</h2>

        <article>
                
            <?php if(!empty($message)): ?>
                    <h3 class='alertTxt center-txt'> <?= Tools::showMessage($message) ?> </h3>                                
            <?php endif ?>
                
            <?php if(!empty($_SESSION['user'])): ?>

                        <form enctype="multipart/form-data" action="" method="post" class="width80 inline_2_boxes">

                                <div>
                                        <label class="warning" for="currentPassword">Saisir obligatoirement le mot de passe pour pouvoir modifier</label>
                                        <input class="regularFormField" type="password" id="currentPassword" name="currentPassword">
                                </div>
                                <div>
                                        <p>
                                                Minimum 8 caractères. Minuscules, majuscules, chiffres...
                                                Caratères spéciaux autorisés.
                                        </p>                                
                                </div>
                                
                        
                                <div style="border: 1px solid black;">
                                        <label for="email">Email*</label>
                                        <input class="regularFormField" type="email" id="email" name="email" value="<?= $email ?>">
                                </div>
                                <div style="border: 1px solid black;">
                                        Obligatoire ! Cette information est masquée, vous serez le/la seul(e)
                                        à la voir.
                                </div>                      
                
                                
                                <div>
                                        <label for="aka">Pseudo</label>
                                        <input class="regularFormField" type="text" id="aka" name="aka" value="<?= $aka ?>">
                                </div>
                                <div>
                                        Essayez d'être original
                                </div>
                        
                                
                                <div>
                                        <label for="password">Mot de passe</label>
                                        <input class="regularFormField" type="password" id="password" name="password">
                                </div>
                                <div>
                                        <p>
                                                Minimum 8 caractères. Minuscules, majuscules, chiffres...
                                                Caratères spéciaux autorisés.
                                        </p>                                
                                </div>
                        
                                
                                <div>
                                        <label for="name">Nom</label>
                                        <input class="regularFormField" type="text" id="name" name="name" value="<?= $name ?>">
                                </div>      
                                <div>
                                        <p>
                                                Facultatif, le nom est masqué
                                        </p>
                                </div>
                        
                                
                                <div>
                                        <label for="firstname">Prénom</label>
                                        <input class="regularFormField" type="text" id="firstname" name="firstname" value="<?= $firstname ?>">
                                </div>
                                <div>
                                        <p>
                                                Facultatif, le prénom est masqué
                                        </p>                               
                                </div>
                        
                                
                                <div>
                                        <label for="address">Adresse</label>
                                        <textarea class="regularFormField" id="address" name="address">
                                                <?= $address ?>
                                        </textarea>
                                </div>
                                <div>
                                        <p>
                                                Ne pas oublier le numéro de rue et l'indice de répétition.
                                        </p>                               
                                </div>

                                <div>
                                        <label for="postcode">Code postal</label>
                                        <input class="regularFormField" type="text" id="postcode" name="postcode" placeholder="<?= $postcode ?>">
                                </div>
                                <div>
                                        <p>
                                                Facultatif, le prénom est masqué
                                        </p>                               
                                </div>

                                <div>
                                        <label for="city">Ville</label>
                                        <input class="regularFormField" type="text" id="city" name="city" placeholder="<?= $city ?>">
                                </div>
                                <div>
                                        <p>
                                                Facultatif, la ville est masquée
                                        </p>                               
                                </div>
                        
                                <div>
                                        <label for="emailMessage">Message</label>
                                        <textarea class="regularFormField" id="emailMsg" name="emailMsg">
                                        </textarea>
                                </div>
                                <div>
                                        <p>
                                                Le commentaire est facultatif
                                        </p>                               
                                </div>

                                <div>
                                        <p class="width50">                                                    
                                                <?php if(!empty($image)): ?>
                                                                <img class="width33" src="<?= $image ?>" alt="<?= $aka ?>">
                                                <?php endif ?>
                                                <label for="avatar">Photo</label>
                                                <input class="regularFormField" type="file" id="avatar" name="avatar">            
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
                        </form>        
        
            <?php else: ?> 
                                <h2 class="warning">Espace réservé aux membres connectés !</h2>
            <?php endif ?> <!-- if(empty($_SESSION['user'])): -->
               
            
            
        </article>


</section>