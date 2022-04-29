<?php require_once "header.php"; ?>


<main>
    <h2 id="title" class="main-title" id="title">Fiche détaillée</h2>

 
   <section  class="detail-view-block">               
    
        <article class="item-block">
       
                <div class="item-img-block">
                    <div class="rank" id="<?= 'rank'.$person->getRank(); ?>"> 
                            <?= $person->getRank(); ?> 
                    </div>
                        
                        <a href="index.php?class=person&action=show&person=<?= $person->getId() ?>">
                        <figure>
                            <img class="item-img" alt="<?= $person->getName() ?>" src="<?= $person->getImage() ?>">
                            <figcaption>
                                    <?= $fullName = Tools::showIf($person->getAka()," | ").''.$person->getFirstname().' '.strtoupper($person->getName()); ?>                                      
                            </figcaption>
                        </figure>    
                    </a>
                    <!--
                    <div>
                        <progress value="10000" max="22000"></progress>
                    </div>
                    -->
                    
                    <div class="jauge">
                        <div class="jauge-value" style="width: <?= Tools::jauge($person->getPoints()) ?>%;"></div> <!-- because progress and meter are not designed for this and width calculated -->
                        <div class="jauge-txt">
                                <?= Tools::jauge($person->getPoints()) ?>%
                        </div>
                    </div>

                   

                </div> <!-- <div class="item-img-block"> -->
        

                <div class="item-txt-block padding-medium">                                          
                        
                        <h3 class="margin-b-big">    
                            <?= Tools::showIf($person->getAka()," | ").''.$person->getFirstname().' '.strtoupper($person->getName()); ?>
                        </h3>
                        <h4>    
                            <?= $person->getPoints().' points | sexe : '.Tools::showGender($person->getGender()); ?>                                
                        </h4>
                      
                        <?= Tools::showIf(Tools::frenchifyDate($person->getBirth()), '</h4>', '<h4>Né(e) le : ') ?>

                        <h4>
                            <?= 'Profession(s) : '.$person->getProfession(); ?> 
                        </h4>
                        
                        <?= Tools::showIf(Tools::frenchifyDate($person->getDeath()), '</h4>', '<h4>Date de décès : ') ?>
                        
                        <h4>
                            <?= 'Votes : '.$person->getVotes(); ?> 
                        </h4>

                        <h4>
                            <?= 'Meilleur classement : '.$person->getBestRank(); ?> 
                        </h4>

                        <?= Tools::showIf(Tools::frenchifyDatetime($person->getCreatedAt()), '</h4>', '<h4>Créée le : ') ?>

                        <?= Tools::showIf(Tools::frenchifyDatetime($person->getEditedAt()), '</h4>', '<h4>Mise à jour : ') ?>

                        <?= Tools::showIf(html_entity_decode($person->getLink()), '" target="_blank" ">Lien externe</a></h4>', '<h4><a href="') ?>

                        

                        <div class="contrib_n_risk">
                                                                                                            
                            <?php   
                                    $personContributions = new JnctPersonContribution(); 
                                    $personContributions = $personContributions->listByIdPerson($person->getId());
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
                                $personRisks = $personRisks->listByIdPerson($person->getId());
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

                        <p> 
                            <?= nl2br(html_entity_decode($person->getDescription())); ?>
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
                    <?php if(!empty($_GET['page']) && is_numeric($_GET['page'])): ?>
                            <?php $page = $_GET["page"]; ?>
                            <p>
                                <a id="vote<?= $person->getId() ?>" href="#">
                                    <i class="far fa-thumbs-up"></i>voter pour <?= Person::showPronoun($person->getGender())?>
                                </a>
                            </p>
                            <p>                                                        
                                <a href="index.php?class=person&action=showList&person=<?= $person->getId() ?>&offset=<?= $_GET["offset"] ?>&limit=<?= $_GET["limit"] ?>&rank=<?= $person->getRank() ?>&page=<?= $page ?>#rank<?= $person->getRank() ?>">
                                    <i class="fas fa-backward"></i>retour liste
                                </a>
                            </p>
                            <p>
                                <a href="index.php?class=person&action=edit&person=<?= $person->getId() ?>&rank=<?= $person->getRank() ?>&page=<?= $page ?>&offset=<?= $_GET["offset"] ?>&limit=<?= $_GET["limit"] ?>&do=true#title">
                                    <i class="far fa-edit"></i>modifier
                                </a>
                            </p>
                            <p>
                                <a href="views/user/test_increase.php?class=person&addDuplicates=1&person=<?= $person->getId() ?>&page=<?= $page ?>#title">
                                    <i class="fas fa-user-friends"></i>signaler doublon
                                </a>
                            </p>
                            <p>
                                <a href="index.php?class=person&action=showContest=<?= $person->getId() ?>&page=<?= $page ?>#title">
                                    <i class="far fa-thumbs-down"></i>contester
                                </a>
                            </p>
                            <p>                                                    
                                <a href="index.php?class=person&action=delete&person=<?= $person->getId() ?>&rank=<?= $person->getRank() ?>&page=<?= $page ?>"><!--
                                    --><i class="fas fa-user-slash"></i>supprimer
                                </a>
                            </p>
                    <?php else: ?>
                            <p>
                                <a id="vote<?= $person->getId() ?>" href="#">
                                    <i class="far fa-thumbs-up"></i>voter pour <?= Person::showPronoun($person->getGender())?>
                                </a>
                            </p>
                            <p>                                                        
                                <a href="index.php?class=person&action=showList&person=<?= $person->getId() ?>&rank=<?= $person->getRank() ?>#rank<?= $person->getRank() ?>">
                                    <i class="fas fa-backward"></i>retour liste
                                </a>
                            </p>
                            <p>
                                <a href="index.php?class=person&action=edit&person=<?= $person->getId() ?>&rank=<?= $person->getRank() ?>&do=true#title">
                                    <i class="far fa-edit"></i>modifier
                                </a>
                            </p>
                            <p>
                                <a href="views/user/test_increase.php?class=person&addDuplicates=1&person=<?= $person->getId() ?>#title">
                                    <i class="fas fa-user-friends"></i>signaler doublon
                                </a>
                            </p>
                            <p>
                                <a href="index.php?class=person&action=showContest=<?= $person->getId() ?>&rank=<?= $person->getRank() ?>">
                                    <i class="far fa-thumbs-down"></i>contester
                                </a>
                            </p>
                            <p>                                                    
                                <a href="index.php?class=person&action=delete&person=<?= $person->getId() ?>&rank=<?= $person->getRank() ?>#rank<?= $person->getRank() ?>"><!--
                                    --><i class="fas fa-user-slash"></i>supprimer
                                </a>
                            </p>

                    <?php endif ?>


                </nav> 
                 
                
        </article> <!-- article_one_aside -->
          
    </section> <!-- <s.e.c.t.i.on class="list-view"> -->

</main>

<nav class="center-txt">
    <a class="enhanced_button-a" href="index.php?class=person&action=showList#rank<?= $person->getRank() ?>">
        <i class="fas fa-backward"></i>retour à la liste
    </a>
</nav>

<?php require_once "footer.php"; ?>