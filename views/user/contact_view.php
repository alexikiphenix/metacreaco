<?php
require_once "header.php";   

?>

<section>
<h2 class="center-txt">
        Contact
</h2>


<?php if(!empty($message)): ?>
    <p class="center-txt"> <?= Tools::showMessage($message) ?> </p>
<?php endif ?>

<?php if(!empty($requestNewLink)): ?>
       <?php if($requestNewLink == true): ?>
            <a href="index.php?class=user&action=sendLink&id=<?= $id ?>">Cliquez ici pour obtenir un nouveau lien de validation</a>
       <?php endif ?>   
<?php endif ?>



</section>