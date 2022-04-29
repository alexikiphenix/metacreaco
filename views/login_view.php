<?php
require_once "header.php";  

?>


<section>
    <?php if(!empty($message)): ?>
            <p class="alert center-txt"> <?= Tools::showMessage($message) ?> </p>
    <?php endif ?>

    <?php if(!empty($requestNewLink)): ?>
            <?php if($requestNewLink == true): ?>
                    <a href="index.php?class=user&action=sendLink&id=<?= $id ?>">Cliquez ici pour obtenir un nouveau lien de validation</a>
            <?php endif ?>   
    <?php endif ?>

    <h2 id="title" class="center-txt">Connexion ADMIN</h2>

    <article> 
        <form class="add-form" action="" method="post">   
            <fieldset class="field">
            <legend>Mes identifiants</legend>
                <P>
                    <label for="idLogin">Identifiant</label>
                    <input type="text" id="idLogin" name="idLogin">
                </p>
                <p class="centering-block">
                    Soit votre email, soit votre identifiant composé de lettres minuscules avec éventuellement un chiffre et un
                    caractère spécial (-_.).
                </p>

                <p>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                </p>
                <p class="centering-block">
                    Rappel : votre mot de passe est composé de lettres minuscules ou majuscules avec obligatoire au moins un chiffre et un
                    caractère spécial (@#&+-_.~^`...).
                </p>            
               
            </fieldset>                 

            <button class="enhanced_button-2" type="submit" id="connexion">Connexion</button>
            <p class="stick-to-block">
                <a href="index.php?class=user&action=register#title">S'inscrire</a>
            </p>            
        </form>
    </article>


</section>