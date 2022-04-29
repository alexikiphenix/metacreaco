<?php require_once "header.php"; ?>
<h1 id="title" class="title-with-sub">Liste des doublons ADMIN</h1>


<main class="items-and-search-block">
        <section class="list-view">               
                      
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

                                                                <?php   $personRisks = new JnctPersonRisk(); 
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
                                            <?php if(!empty($_GET["page"]) && is_numeric($_GET["page"])): ?>
                                                    <?php $page = $_GET["page"]; ?>
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
                                                            <i class="far fa-thumbs-down"></i>contester
                                                        </a>
                                                    </p>
                                                    <p>                                                    
                                                        <a href="index.php?class=person&action=delete&person=<?= $p->getId() ?>&rank=<?= $p->getRank() ?>&page=<?= $page ?>"><!--
                                                            --><i class="fas fa-user-slash"></i>supprimer
                                                        </a>
                                                    </p>
                                            <?php else: ?>
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
                                                        <a href="index.php?class=person&action=edit&person=<?= $p->getId() ?>&rank=<?= $p->getRank() ?>#title">
                                                            <i class="far fa-edit"></i>modifier
                                                        </a>
                                                    </p>
                                                    <p>
                                                        <a href="views/user/test_increase.php?class=person&addDuplicates=1&person=<?= $p->getId() ?>#title">
                                                            <i class="fas fa-user-friends"></i>signaler doublon
                                                        </a>
                                                    </p>
                                                    <p>
                                                        <a href="index.php?class=person&action=showContest=<?= $p->getId() ?>&rank=<?= $p->getRank() ?>">
                                                            <i class="far fa-thumbs-down"></i>contester
                                                        </a>
                                                    </p>
                                                    <p>                                                    
                                                        <a href="index.php?class=person&action=delete&person=<?= $p->getId() ?>&rank=<?= $p->getRank() ?>"><!--
                                                            --><i class="fas fa-user-slash"></i>supprimer
                                                        </a>
                                                    </p>

                                            <?php endif ?>
                                                
                                        </nav>                  
                                        
                                </article> <!-- article_one_aside -->
                                                                

                        <?php endforeach ?>
        </section> <!-- <s.e.c.t.i.on class="list-view"> -->
        <aside class="search-block">     

            <form action="" method="post">
                    <div class="search-form">
                        <h3 id="main-search-area">Rechercher une personne</h3>  
                                
                            <label for="name">Nom</label>                                    
                            <input type="text" id="name" name="name">

                            <label for="firstname">Prénom</label>
                            <input type="text" id="firstname" name="firstname">

                            <label for="aka">Surnom</label>
                            <input type="text" id="aka" name="aka">
                                                                                
                        <button class="enhanced_button" type="submit">Rechercher</button>
                    </div>                                          
            </form>

            <?php if(isset($_POST["name"]) || isset($_POST["firstname"]) || isset($_POST["aka"])): ?>

                    <?php $seeked_person = Person::searchPersons(); ?>
                    <?php if($seeked_person != null): ?>
                        <h2>Votre recherche</h2>
                        <?php foreach($seeked_person as $sp): ?>
                                
                            <p class="search-p">                                                                                            
                                <figure>
                                    <a href="index.php?class=person&action=show&person=<?= $sp->getId() ?>">
                                        <img class="search-img" src="<?=$sp->getImage() ?>" alt="<?= $sp->getAka().' - '.$sp->getFirstname().' '.$sp->getName() ?>"> <!-- Pas de figure car ces miniatures ne doivent pas apparaître ds les moteurs de recherche -->
                                        <figcaption>
                                                <?= html_entity_decode($sp->getAka()).' ' ?>
                                                <?= html_entity_decode($sp->getFirstname()).' '.html_entity_decode($sp->getName()) ?>
                                        </figcaption>
                                    </a>
                                </figure> 
                            </p>   
                                                    
                        <?php endforeach ?>
                    <?php endif ?>
            <?php endif ?>

        </aside> <!--  <aside class="width_xs annex padding_m">    -->

        

</main> <!--End of Main ([section[article] + aside]] + section) -->

<nav class="pagination">
    <?php for($page = 0; $page < count($pagination); $page++):  ?> <!-- key 0 contains the range for pagination -->
                    <?php if($page > 0 && !empty($_GET["page"]) && is_numeric($_GET["page"])): ?>
                        <?php if($page == $_GET["page"]): ?>
                            <a class="page-selected" href="index.php?class=person&action=listDuplicates&page=<?= $page ?>&offset=<?= $pagination[$page]; ?>&limit=<?= $pagination[0]; ?>#title">
                                <?= $page ?>
                            </a>
                        <?php else: ?>
                            <a class="page" href="index.php?class=person&action=listDuplicates&page=<?= $page ?>&offset=<?= $pagination[$page]; ?>&limit=<?= $pagination[0]; ?>#title">
                                    <?= $page ?>
                            </a>
                        <?php endif ?> 
                    <?php else: ?>                    
                        <?php if($page > 0): ?>
                            <?php if($page == 1): ?>
                                <a class="page-selected" href="index.php?class=person&action=listDuplicates&page=<?= $page ?>&offset=<?= $pagination[$page]; ?>&limit=<?= $pagination[0]; ?>#title">
                                    <?= $page ?>
                                </a>
                            <?php else: ?>
                                <a class="page" href="index.php?class=person&action=listDuplicates&page=<?= $page ?>&offset=<?= $pagination[$page]; ?>&limit=<?= $pagination[0]; ?>#title">
                                        <?= $page ?>
                                </a>
                            <?php endif ?> 
                        <?php endif ?> 
                    <?php endif ?>
    <?php endfor ?>
              
</nav>


<?php require_once "footer.php"; ?>



