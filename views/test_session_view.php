<?php require_once "header.php"; ?>


<?php if(!empty($session) && $session->isLogged()): ?>

    <?php
        echo '$session<pre>';
        print_r($session);
        echo '</pre>';
    ?>

    <?php
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
    ?>

    <p>
        Id : <?= $session->getId() ?>
    </p>

    <p>
        Alias : <?= $session->getAka() ?>
    </p>

    <p>
        Email: <?= $session->getEmail() ?>
    </p>
<?php else: ?>
    <p>
        Vous n'êtes pas connecté !
    </p>

    <p>
        <a href="index.php?class=user&action=login">Se connecter</a>
    </p>


<?php endif ?>


<?php
