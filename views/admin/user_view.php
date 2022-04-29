<?php require_once "header.php"; ?>

<?php if(!empty( $session) && $session->isLogged()): ?>

<h1 id="title" class="center-txt">Ma fiche personnelle</h1>


<section  class="detail-view-block">              
    <article class="item-block">
    
        <div class="item-img-block">
                            
            <a href="index.php?class=user&action=show">
                <figure>
                    <img class="item-img" alt="user-picture" src="assets/img/person/no-img.jpg">
                </figure>    
            </a>
            <!--
            <div>
                <progress value="10000" max="22000"></progress>
            </div>
            -->
            <h4 class="jauge_title">mon score contribution</h4>  
            <div class="jauge-user">
                <div class="jauge-value" style="width: <?= Tools::jauge($session->getPoints()) ?>%;"></div> <!-- because progress and meter are not designed for this and width calculated -->
                <div class="jauge-txt">
                        <?= Tools::jauge($session->getPoints()) ?>%
                </div>
            </div>

            <p>
                <a href="index.php?class=user&action=edit#title"><i class="fas fa-user-cog"></i>Modifier mon profil</a>
            </p>           

        </div> <!-- <div class="item-img-block"> -->


        <div class="item-txt-block padding-medium">                                          
                
            <h3 class="margin-b-big">    
                <?= Tools::showIf($session->getAka()," | ").''.$session->getFirstname().' '.strtoupper($session->getName()); ?>
            </h3>
            <h3>    
                <?= 'Mes points : '.$session->getPoints() ?>                                
            </h3>

            <?= Tools::showIf(Tools::frenchifyDatetime($session->getLastLogin()), '</p>', '<p>Dernière connexion le : ') ?>

            <?= Tools::showIf(Tools::frenchifyDatetime($session->getCreatedAt()), '</p>', '<p>Profil créé le : ') ?>   

            <p>
                <span class="side-txt stick-together">Votre pseudo (<?= $session->getAka() ?>)</span>
                <a class="side-txt stick-together alert" href="index.php?class=user&action=editAka"><i class="fas fa-exclamation-triangle"></i>modifier pseudonyme</a>
            </p>

            <p>
                Email :(<?= substr($session->getEmail(), 0, 2) ?>...<?= substr($session->getEmail(), -6, 6) ?>)
                <a class="side-txt stick-together alert" href="index.php?class=user&action=editEmail#title"><i class="fas fa-exclamation-triangle"></i>modifier email</a>               
            </p>

            <p>
                <a href="index.php?class=contribution&action=edit#title">Gérer les contributions</a>
            </p>

            <p>
                <a href="index.php?class=risk&action=edit">Gérer liste des risques</a>
            </p>

            <p>
                <a href="index.php?class=person&action=index">Afficher le TOP 20</a>
            </p>

            <p>
                <a href="index.php?class=person&action=showList#title">Afficher classement complet</a>
            </p>
            
            <p>
                <a href="index.php?class=person&action=listDuplicates#title">Gérer les doublons</a>
            </p>

            <p>
                <a href="index.php?class=contribution&action=edit#title">Gérer les contestations</a>
            </p>

            <p>
                <a href="index.php?class=contribution&action=edit#title">Votre profil</a>
            </p>                                      
            
            
            <p class="link-add">            
                <a href="index.php?class=person&action=add#title">
                    <i class="fas fa-user-plus"></i>Ajouter une personne
                </a>
                <a href="index.php?class=person&action=showList#main-search-area">
                    <i class="fas fa-search"></i>rechercher une personne
                </a>
            </p>
        </div> <!-- <div class="item-txt-block"> -->

            
            
            <nav class="nav-item-block">
                <p>
                    <a href="index.php?class=user&action=edit#title">
                        <i class="far fa-edit"></i>modifier
                    </a>
                </p>
                <p>
                    <a href="index.php?class=user&action=showContest">
                        <i class="far fa-thumbs-down"></i>contester
                    </a>
                </p>
                <p>                                                    
                    <a href="index.php?class=user&action=delete"><!--
                        --><i class="fas fa-user-slash"></i>supprimer
                    </a>
                </p>
            </nav> 
                
            
    </article> <!-- article_one_aside -->
          
</section> <!-- <s.e.c.t.i.on class="list-view"> -->

</main>

<nav class="center-txt">
    <a class="enhanced_button-a" href="index.php?class=user&action=showList#title">
        <i class="fas fa-backward"></i>Retour au classement
    </a>
</nav>

<?php require_once "footer.php"; ?>

<?php else: ?>
    <?php $this->redirecTo('index.php'); ?>
<?php endif ?>


