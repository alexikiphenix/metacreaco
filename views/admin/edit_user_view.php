<?php
require_once "header.php";

    

?>

<section>                     
        <h2 id="title" class="center-txt">Modifier mon profil</h2>

        <?php if(!empty($message)): ?>
                    <h3 class='alertTxt center-txt'> <?= Tools::showMessage($message) ?> </h3>                                
        <?php endif ?>

        <article>
               
            <?php if(!empty($_SESSION['user'])): ?>

                <form class="add-form" enctype="multipart/form-data" action="" method="post" class="width80 inline_2_boxes">
                <fieldset class="field"> 
                    <p>
                        <label class="warning" for="currentPassword">Saisir obligatoirement le mot de passe pour pouvoir modifier votre profil</label>
                        <input type="password" id="currentPassword" name="currentPassword">
                    </p>
                    <p class="centering-block">                       
                        Rappel, votre mot de passe a au minimum 8 caractères. Minuscules, majuscules, chiffres...
                        Caratères spéciaux autorisés.                                                           
                    </p>                    
            
                    <p>
                        <label class="side-txt stick-together" for="email">Votre email de connexion (<?= substr($_SESSION['user']['email'], 0, 2) ?>...<?= substr($_SESSION['user']['email'], -6, 6) ?>)</label>
                        <input class="hidden stick-together" type="email" id="email" name="email">
                        <a class="side-txt stick-together alert" href="index.php?class=user&action=editImportant"><i class="fas fa-exclamation-triangle"></i>modifier email</a>
                    </p>
                    <p class="centering-block">
                        L'email est volontairement masqué. Cliquer sur modifier vous envoie sur la page des modifications importantes..
                    </p>                          
                    
                    <p>
                        <label class="side-txt stick-together" for="pseudo">Votre pseudo (<?= $_SESSION['user']['aka'] ?>)</label>
                        <input class="hidden stick-together" type="text" id="aka" name="aka">
                        <a class="side-txt stick-together alert" href="index.php?class=user&action=editImportant"><i class="fas fa-exclamation-triangle"></i>modifier pseudonyme</a>
                    </p>
                    <p class="centering-block">
                        Ne pas remplir sauf si vous souhaitez le modifier
                    </p>
                                
                    <p>
                        <label class="stick-together" for="password">Mot de passe</label>
                        <input class="hidden stick-together" type="password" id="password" name="password">
                        <a class="stick-together" href="index.php?class=user&action=editImportant"><i class="fas fa-exclamation-triangle"></i>modifier mot de passe</a>
                    </p>
                    <p class="centering-block alert">
                        Uniquement si vous souhaitez modifier votre mot de passe.
                    </p>            
                    
                    <p>
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" value="<?= $user->getName() ?>">
                    </p>      
                    <p class="centering-block">
                        Facultatif, le nom est masqué
                    </p>
            
                    
                    <p>
                        <label for="firstname">Prénom</label>
                        <input type="text" id="firstname" name="firstname" value="<?= $user->getFirstname() ?>">
                    </p>
                    <p class="centering-block">
                         Facultatif, le prénom est masqué                           
                    </p>                    
                    
                    <p>
                        <label for="address">Adresse</label>
                        <textarea id="address" name="address"><?= $user->getAddress() ?></textarea>
                    </p>
                    <p class="centering-block">
                        Ne pas oublier le numéro de rue et l'indice de répétition.
                    </p>                               

                    <p>
                        <label for="postcode">Code postal</label>
                        <input type="text" id="postcode" name="postcode" placeholder="<?= $user->getPostcode() ?>">
                    </p>
                    <p class="centering-block">
                        Facultatif, le prénom est masqué                            
                    </p>

                    <p>
                        <label for="city">Ville</label>
                        <input type="text" id="city" name="city" placeholder="<?= $user->getCity() ?>">
                    </p>
                    <p class="centering-block">
                        Facultatif, la ville est masquée                            
                    </p>
            
                    <label for="emailMessage">Message</label>
                    <textarea id="emailMsg" name="emailMsg">
                    </textarea>                    
                    <p class="centering-block">
                        Le commentaire est facultatif
                    </p>

                    <p class="width50">                                                    
                        <?php if(!empty($user->getImage())): ?>
                                        <img class="width33" src="<?= $user->getImage() ?>" alt="<?= $user->getAka() ?>">
                        <?php endif ?>
                        <label for="avatar">Photo</label>
                        <input type="file" id="avatar" name="avatar">            
                    </p>            
                    <p class="centering-block">
                        Taille maximale de l'image 2mo
                    </p>           
                </fieldset>             
                <input type="submit">                    
                </form>        
        
            <?php else: ?> 
                    <h2 class="alert">Espace réservé aux membres connectés !</h2>
                    <h2 class="center-txt"><a href="index.php?class=user&ation=login">se connecter</a></h2>
            <?php endif ?> <!-- if(empty($_SESSION['user'])): -->
               
            
        </article>
</section>

<?php require_once "footer.php"; ?>