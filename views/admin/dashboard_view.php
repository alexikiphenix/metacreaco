<?php require_once "header.php"; ?>



<?php if(!empty($_SESSION["user"]) && $_SESSION["user"]["logged"] == 1): ?>



<h1 id="title" class="center-txt">Mon tableau de bord ADMIN</h1>

<main>
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
                <div class="jauge-value" style="width: <?= Tools::jauge($_SESSION["user"]["points"]) ?>%;"></div> <!-- because progress and meter are not designed for this and width calculated -->
                <div class="jauge-txt">
                        <?= Tools::jauge($user->getPoints()) ?>%
                </div>
            </div>

            <p>
                <a href="index.php?class=user&action=show#title">
                    <i class="fas fa-user-alt"></i>Voir mon profil
                </a>
            </p>           

        </div> <!-- <div class="item-img-block"> -->


        <div class="item-txt-block padding-medium">                                          
                
            <p>    
                <?= Tools::showIf($user->getAka()," | ").''.$user->getFirstname().' '.strtoupper($user->getName()); ?>
            </p>
            <p>    
                <?= 'Mes points : '.$user->getPoints() ?>                                
            </p>

            <?= Tools::showIf(Tools::frenchifyDatetime($user->getLastLogin()), '</p>', '<p>Dernière connexion le : ') ?>

            <?= Tools::showIf(Tools::frenchifyDatetime($user->getCreatedAt()), '</p>', '<p>Profil créé le : ') ?>   


            <h4>Nombre de personnes créées : <?= Person::count(); ?></h4>
            <h4>Nombre de personnes créées par vous : <?= Person::countPersonsByUser($user->getId()); ?></h4>


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
                <a href="index.php?class=contribution&action=edit#title">Editer les contributions</a>
            </p>

            <p>
                <a href="index.php?class=risk&action=edit">Editer les risques</a>
            </p>   

             <p>
                <a href="index.php?class=admin&action=manage">Gérer les utilisateurs</a>
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
                <a id="vote<?= $p->getId() ?>" href="#">
                    <i class="far fa-thumbs-up"></i>voter pour <?= Person::showPronoun($p->getGender())?>
                </a>
            </p>
            <p>                                                        
                <a href="#contributions">
                    <i class="fas fa-info-circle"></i>mes contributions
                </a>
            </p>
            <p>
                <a href="#votes">
                    <i class="far fa-edit"></i>mes votes
                </a>
            </p>
            <p>
                <a href="views/user/test_increase.php?class=person&addDuplicates=1&person=<?= $p->getId() ?>#title">
                    <i class="fas fa-user-friends"></i>signaler doublon
                </a>
            </p>
            <p>
                <a href="index.php?class=person&action=showContest=<?= $p->getId() ?>#title">
                    <i class="far fa-thumbs-down"></i>contester
                </a>
            </p>
            <p>                                                    
                <a href="index.php?class=admin&action=manage&#title"><!--
                    --><i class="fas fa-user-slash"></i>Gérer les utilisateurs
                </a>
            </p>
        </nav>

            
    </article> <!-- article_one_aside -->    


          
</section> <!-- <s.e.c.t.i.on class="list-view"> -->

<h2 id="contributions" class="center-txt">Mes contributions détaillées</h2>
<section class="list-view centered-block">                 
    <?php foreach ($persons as $p): ?>
        <article class="item-block" id="rank<?= $p->getRank() ?>">

            <div class="item-img-block">
                <div class="rank"> 
                        <?= $p->getRank(); ?> 
                </div>
                    
                <a href="index.php?class=person&action=show&person=<?= $p->getId() ?>">
                    <figure>
                        <img class="item-img" alt="<?= html_entity_decode($p->getName()) ?>" src="<?= $p->getImage() ?>">
                        <figcaption>
                                <?= Tools::showIf(html_entity_decode($p->getAka())," | ").''.html_entity_decode($p->getFirstname()).' '.strtoupper(html_entity_decode($p->getName())); ?>   
                                
                        </figcaption>
                    </figure>    
                </a>
                <!--
                <div>
                    <progress value="10000" max="22000"></progress>
                </div>
                -->
                
                <div class="jauge">
                    <div class="jauge-value" style="width: <?= Tools::jauge($p->getPoints()) ?>%;"></div> <!-- because progress and meter are not designed for this and width calculated -->
                    <div class="jauge-txt">
                            <?= Tools::jauge($p->getPoints()) ?>%
                    </div>
                </div>
                
            </div>

            <div class="item-txt-block">                                          
                    
                    <h3 class="margin_xs">    
                            <?= Tools::showIf(html_entity_decode($p->getAka())," | ").''.html_entity_decode($p->getFirstname()).' '.strtoupper(html_entity_decode($p->getName())); ?>
                    </h3>
                    <h4>    
                            <?= $p->getPoints().' points | '.$p->getGender(); ?>
                            <?= ' | votes : '.$p->getVotes(); ?>
                            <?= '| Profession(s) : '.$p->getProfession(); ?>                                                         
                    </h4>

                    <?= Tools::showIf(Tools::frenchifyDate($p->getBirth()), '</h4>', '<h4>Né(e) le : ') ?>
                    <?= Tools::showIf(Tools::frenchifyDate($p->getDeath()), '</h4>', '<h4>Décès le : ') ?>

                    <p class="show-<?= $p->getId() ?>">
                        <?= substr(html_entity_decode($p->getDescription()), 0, 300); ?>
                    </p>
                    
                    <p class="hide-<?= $p->getId() ?>">
                        <?= html_entity_decode($p->getDescription()); ?>
                    </p>
                                            
                    <div class="contrib_n_risk">
                                                                                            
                        <?php   
                            $personContributions = new JnctPersonContribution(); 
                            $personContributions = $personContributions->listByIdPerson($p->getId());
                            $personContributions = Person::sortContributions($personContributions); 
                        ?>
                        
                        <ul>    
                            <li>Contributions</li>
                                <ul>
                                    <?php for($i =0; $i < count($personContributions); $i++): ?>
                                        <li>                                                                       
                                            <?= ' '.$personContributions[$i]['name']; ?>                                                    
                                        </li>
                                    <?php endfor ?>
                                </ul>                                                                    
                        </ul> 

                        <?php   
                            $personRisks = new JnctPersonRisk(); 
                            $personRisks = $personRisks->listByIdPerson($p->getId());
                            $personRisks = Person::showRisksSorted($personRisks);                                                                                                          
                        ?>                                                        
                        
                        <ul class="margin_xs">
                            <li>Risques encourus</li>
                                <ul>
                                    <?php for($i =0; $i < count($personRisks); $i++): ?>
                                        <li>                                                                                
                                            <?= ' '.$personRisks[$i]['name']; ?>                                                                                                                                 
                                        </li>
                                    <?php endfor ?>
                                </ul>
                        </ul>
                            
                    </div> <!-- contrib_n_risk -->   
                    
                    <p class="link-add">
                    
                            <a href="index.php?class=person&action=add#title"><!--
                                --><i class="fas fa-user-plus"></i><!--
                                -->ajouter une personne
                            </a>
                            <a href="#main-search-area"><!--
                                --><i class="fas fa-search"></i><!--
                                -->rechercher une personne
                            </a>
                    </p>
            </div> <!-- Regular -->
            
            <nav class="nav-item-block">                     
                    <p>
                        <a id="vote<?= $p->getId() ?>" href="#">
                            <i class="far fa-thumbs-up"></i>voter pour <?= Person::showPronoun($p->getGender())?>
                        </a>
                    </p>
                    <p>                                                        
                        <a href="index.php?class=person&action=show&person=<?= $p->getId() ?>&rank=<?= $p->getRank() ?>#title">
                            <i class="fas fa-info-circle"></i>voir fiche
                        </a>
                    </p>
                    <p>
                        <a href="index.php?class=person&action=edit&person=<?= $p->getId() ?>&rank=<?= $p->getRank() ?>&page=<?= $page ?>&offset=<?= $_GET["offset"] ?>&limit=<?= $_GET["limit"] ?>&do=true#title">
                            <i class="far fa-edit"></i>modifier
                        </a>
                    </p>
                    <p>
                        <a href="views/user/test_increase.php?class=person&addDuplicates=1&person=<?= $p->getId() ?>#title">
                            <i class="fas fa-user-friends"></i>signaler doublon
                        </a>
                    </p>
                    <p>
                        <a href="index.php?class=person&action=showContest=<?= $p->getId() ?>#title">
                            <i class="far fa-thumbs-down"></i>Gérer les contestations
                        </a>
                    </p>
                    <p>                                                    
                        <a href="index.php?class=person&action=delete&person=<?= $p->getId() ?>&rank=<?= $p->getRank() ?>&page=<?= $page ?>"><!--
                            --><i class="fas fa-user-slash"></i>supprimer
                        </a>
                    </p>
      
                    
            </nav>                  
                
        </article> <!-- article_one_aside -->
                                            

    <?php endforeach ?>
    </section> <!-- <s.e.c.t.i.on class="list-view"> -->






<section>
        <h2>Votre contribution</h2>
        <?php if(!empty($persons) && is_array($persons)): ?>
            <p>
                Personnes créés :
            </p>          
            <article class="detail-view-block">    
            <?php foreach($persons as $p): ?>                    
                <p class="search-p">                                                                                            
                    <figure>
                        <a href="index.php?class=person&action=show&person=<?= $p->getId() ?>">
                            <img class="search-img" src="<?=$p->getImage() ?>" alt="<?= $p->getAka().' - '.$p->getFirstname().' '.$p->getName() ?>"> <!-- Pas de figure car ces miniatures ne doivent pas apparaître ds les moteurs de recherche -->
                            <figcaption>
                                    <?= html_entity_decode($p->getAka()).' ' ?>
                                    <?= html_entity_decode($p->getFirstname()).' '.html_entity_decode($p->getName()) ?>
                            </figcaption>
                        </a>
                    </figure> 
                </p>                                           
            <?php endforeach ?>
            </article>
                
        <?php endif ?>
</section> 
</main>

<nav class="center-txt">
    <a class="enhanced_button-a" href="index.php?class=user&action=showList">
        <i class="fas fa-backward"></i>Voir classement complet
    </a>
</nav>

<?php endif ?> <!-- if(!empty($_SESSION["user"])): ?>

<?php require_once "footer.php"; ?>