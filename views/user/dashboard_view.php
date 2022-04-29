
<h1 class="center-txt">
Mon tableau de bord
</h1>  

<?php if(!empty($_SESSION)): ?>
    <?= '$_SESSION<pre>' ?>
    <?= print_r($_SESSION) ?>
    <?= '<pre>' ?>
<?php endif ?>


<section>
<h2 class="center-txt">
    Ma participation 
</h2>  

<?php if(!empty($_SESSION['user'])): ?>
  <h4 class="inline_block">

      <div class="width_xl">        
          <?= $_SESSION['user']['aka']  ?>
        
      </div>
      <p class="width_xxs">
            <a class="button2 width_xl" href="index.php?class=person&action=showSmallList">
                Voir le Top 20 des personnes</a>
      </p>
      <p class="width_xxs">
            <a class="button2 width_xl" href="index.php?class=person&action=showList">
                Voir le classement complet</a>
      </p>
      <p class="width_xxs">
                <a class="button2 width_xl" href="index.php?class=user&action=edit#title">
                    Modifier mon profil</a>
      </p>
  </h4>   
  <?php endif ?>



<h2 class="center-txt">
    Mon profil 
</h2>  

</section>