<?php
require_once "header.php";

    

?>

<section>                     
        <h2 id="title" class="center-txt">Modifier mon email</h2>

        <?php if(!empty($message)): ?>
                    <h3 class='alertTxt center-txt'> <?= Tools::showMessage($message) ?> </h3>                                
        <?php endif ?>

        <article>
               
            <?php if(!empty($session) && $session->isLogged()): ?>

                <form class="add-form" enctype="multipart/form-data" action="" method="post" class="width80 inline_2_boxes">
                <fieldset class="field"> 
                    <p>
                        <label class="warning" for="currentPassword">Saisir votre mot de passe actuel</label>
                        <input type="password" id="currentPassword" name="currentPassword">
                    </p>
                    <p class="centering-block">                       
                        Rappel, votre mot de passe a au minimum 8 caractères. Minuscules, majuscules, chiffres...
                        Caratères spéciaux autorisés.                                                           
                    </p>     

                              
            
                    <p>
                        <label class="stick-together" for="email">Votre email actuel (<?= substr($session->getEmail(), 0, 2) ?>...<?= substr($_SESSION['user']['email'], -6, 6) ?>)</label>
                        <input class="stick-together" type="email" id="email" name="email">                        
                    </p>
                    <p class="centering-block">
                        L'email est volontairement masqué, vous devez obligatoirement confirmez votre email.
                    </p>      

                    <p>
                        <label class="stick-together" for="newEmail">Votre nouvel email</label>
                        <input class="stick-together" type="email" id="newEmail" name="newEmail">    
                        <label class="stick-together" for="newEmail2">Saisissez votre nouvel email une seconde fois</label>
                        <input class="stick-together" type="email" id="newEmail2" name="newEmail2">                      
                    </p>
                    <p class="centering-block stick-together">
                        l'email actuel sera supprimé de la base, seul le nouvel email sera conservé.
                    </p>
                                   

                </fieldset>             
                <button class="enhanced_button-2" type="submit">
                    <i class="far fa-save"></i>Enregistrer
                </button>                   
                </form>        
        
            <?php else: ?> 
                    <h2 class="alert">Espace réservé aux membres connectés !</h2>
                    <h2 class="center-txt"><a href="index.php?class=user&ation=login">se connecter</a></h2>
            <?php endif ?> <!-- if(empty($_SESSION['user'])): -->
               
            
        </article>
</section>

<?php require_once "footer.php"; ?>