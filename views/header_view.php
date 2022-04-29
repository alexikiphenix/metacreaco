<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">    
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css"> <!--
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/style.css"> -->
    <?php 
        $session = new Session;  
    ?>
    <script src="assets/js/app.js"></script>
    <title>Document</title>
</head>

<body>

<nav class="nav-connexions">
    <figure>
        <a href="index.php?class=value&action=show">
            <img src="assets/img/logo.png" alt="Logo MetaCreaCo">
        </a>        
        <figcaption>MetaCreaCo</figcaption>    
    </figure>
<!--
    <label for="login">Identifiant</label>
    <input type="text" id="login" name="login">

    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password">
    
    <input id="checkCode" type="hidden" name="checkCode" value="777">
    -->
    <p>
        <?php if(empty($_SESSION["user"])): ?>
            <a href="index.php?class=user&action=login#title"><i class="fas fa-power-off"></i>connexion</a>                
            <a href="index.php?class=user&action=register#title"><i class="fas fa-sign-in-alt"></i>s'inscrire</a>
        <?php else: ?>
            <a href="index.php?class=user&action=index#title"><i class="fas fa-user"></i>moi</a>
            <a href="index.php?class=user&action=logout"><i class="fas fa-power-off"></i>déconnexion</a>                       
        <?php endif ?>
        <a href="index.php?class=person&action=showList"><i class="fab fa-accessible-icon"></i></a>        
    </p>
    
</nav> 
<header class="banner">
    <nav class="nav-categories">
        <?php $categories_header = Category::list() ?>
            <ul>
                <li><a href="index.php">accueil</a></li>
                <?php foreach($categories_header as $c): ?>
                        <li><a href="index.php?class=person&action=<?= $c->getMethod() ?>#title"><?= $c->getName() ?></a></li>
                <?php endforeach ?>
                <li><a href="contact.php">contact</a></li>
            </ul>
    </nav>
        <h2 class="center-txt banner-title banner-padding-t">Quelle est la meilleure personne ? </h3>
        <h2 class="center-txt banner-title banner_padding_b">Celle qui est au sommet ou celle qui aide les autres ?*</h3>                 
      
    <div class="date-time"><?= date('d-m-Y H:m:s') ?></div>
    
</header>

