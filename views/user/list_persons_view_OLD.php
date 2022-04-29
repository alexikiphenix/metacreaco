<?php require_once "header.php"; ?>
<h1 id="title" class="center-txt">Liste des meilleures personnes du monde</h1>
<h2 class="center-txt  margin_b_xl">(classement complet)</h2>

<div class="subcontainer">

    <section class="main_section">
        <?php $rank = 1; ?>

                
            <?php foreach ($persons as $p): ?>
                <div class="article_one_aside bg_main margin_b_s personFrame">

                        <div class="box_img_person_s margin_t_m padding_s">
                                <div class="inline">
                                        <div class="points top_left"> <?= $rank++ ?> 
                                        </div>
                                        <div class="width_xl">
                                                <a class="no_decoration" href="index.php?class=person&action=showPerson&person='.$p->getId().'">
                                                        <figure class="fig_person center_block">
                                                                <?= '<img class="img_person txt_center" alt="'.$p->getName().'" src="'.$p->getImage().'"'?>
                                                                <figcaption>
                                                                        <?= html_entity_decode($p->getFirstname()).' '.strtoupper(html_entity_decode($p->getName())); ?>                                                        
                                                                </figcaption>
                                                        </figure>
                                                </a>
                                        </div>
                                </div>
                                <p> <?= Tools::jauge($p->getPoints(),2500); ?> </p>
                        </div>

                        <div class="padding_m regular width_l">
                                
                                <h4 class="margin_xs">    
                                        <?= Tools::showIf(html_entity_decode($p->getAka())," | ").''.html_entity_decode($p->getFirstname()).' '.strtoupper(html_entity_decode($p->getName())); ?>
                                </h4>
                                <h4>    
                                        <?= $p->getPoints().' points | '.$p->getGender(); ?>
                                         <?= '| Profession(s) : '.html_entity_decode($p->getProfession()); ?> 
                                </h4>
                                <?php $txt=html_entity_decode($p->getDescription()); ?>
                     
                                <p> <?= Tools::showTxtCut($txt,310) ?> </p> 
                                                             
                                <div class="contrib_n_risk">
                                        <div class="width50">   
                                                        <h4 class="margin_xs">Contributions</h4>
                                                <?php   $personContributions = new JnctPersonContribution(); 
                                                        $personContributions = $personContributions->listByIdPerson($p->getId());
                                                        $personContributions = Person::sortContributions($personContributions);                                                                                                          
                                                ?>
                                                
                                                <ul class="margin_xs">
                                                        <?php //foreach($person_contribution as  $pc): ?>
                                                        <?php for($i =0; $i < count($personContributions); $i++): ?>

                                                                <li>    
                                                                       <?php //*'id:  '.$personContributions[$i]['id_contribution']; ?> 
                                                                       <?= ' '.html_entity_decode($personContributions[$i]['name']); ?> 
                                                                       <?php //' '.$personContributions[$i]['points']; ?>                                                      
                                                                </li>
                                                        <?php endfor ?>
                                                </ul>
                                        </div>

                                        <div class="width50">   
                                                <h4 class="margin_xs">Risques encourus</h4>

                                                <?php   $personRisks = new JnctPersonRisk(); 
                                                        $personRisks = $personRisks->listByIdPerson($p->getId());
                                                        $personRisks = Person::showRisksSorted($personRisks);                                                                                                          
                                                ?>
                                        
                                                
                                                <ul class="margin_xs">
                                                        <?php //foreach($person_contribution as  $pc): ?>
                                                        <?php for($i =0; $i < count($personRisks); $i++): ?>
                                                                <li>    
                                                                       <?php //*'id:  '.$personContributions[$i]['id_contribution']; ?> 
                                                                       <?= ' '.html_entity_decode($personRisks[$i]['name']); ?> 
                                                                       <?php //' '.$personContributions[$i]['points']; ?>                                                      
                                                                </li>
                                                        <?php endfor ?>
                                                </ul>
                                        </div> <!-- width50 risque encouru -->
                                </div> <!-- contrib_n_risk -->   
                                      
                                                
                        </div> <!-- Regular -->
                        
                        <div class="width_xs padding_m">
                                <p>
                                        <?= '<a class="button2 width_xl" id="vote'.$p->getId().'" href="views/user/person_vote_view.php'.$p->getId().'">' ?>
                                        voter pour <?= Person::showPronoun($p->getGender())?></a>
                                </p>
                                <p>
                                        <?= '<a class="button2 width_xl" href="index.php?class=person&action=showPerson&person='.$p->getId().'">' ?>
                                        voir fiche</a>
                                </p>
                                <p>
                                        <?= '<a class="button2 width_xl" href="index.php?class=person&action=edit&person='.$p->getId().'">' ?>
                                        modifier</a>
                                </p>
                                <p>
                                        <?= '<a class="button2 width_xl" href="views/user/test_increase.php?class=person&addDuplicates=1&person='.$p->getId().'">' ?>
                                        signaler doublon</a>
                                </p>
                                <p>

                                        <?= '<a class="button2 width_xl" href="index.php?class=person&action=showContest='.$p->getId().'">' ?>
                                        contester</a>
                                </p>
                                <p>

                                        <?= '<a class="button2 width_xl" href="index.php?class=person&action=add">' ?>
                                        Ajouter une personne</a>
                                </p>


                        </div>


                  
                        
                 </div> <!-- article_one_aside -->

                 

        

        
                                

            <?php endforeach ?>
    </section>

    <section class="width_xs annex padding_m">     

        <form action="" method="post">
                <div class="center_block padding_m padding_t_0">
                        <h4 class="center-txt">Rechercher une personne</h4>  
                                <div center_block>
                                        <label for="name">Nom</label>                                    
                                        <input class="width_full" type="text" name="name">

                                        <label for="firstname">Prénom</label>
                                        <input class="width_full" type="text" name="firstname">

                                        <label for="aka">Surnom</label>
                                        <input class="width_full margin_b_m" type="text" name="aka">
                                        <input type="hidden" name="check" value="12ko267">
                                </div>                             
                                <button class="width_full" type="submit">Rechercher</button>
                </div>  
                                                     
        </form>

        <?php if(isset($_POST["name"]) || isset($_POST["firstname"]) || isset($_POST["aka"])): ?>
               
                <?php $seeked_person = Person::searchPersons(); ?>
                <?php if($seeked_person != null): ?>
                        <h2>Votre recherche</h2>
                        <?php foreach($seeked_person as $sp): ?>
                                
                                        <div class="width_full border_b inline color_txt_2 color_bg_2">
                                        
                                                <?= '<a class="width_s button2" href="index.php?class=person&action=showPerson&person='.$sp->getId().'">' ?>
                                                        <img class="width_full float_l" src="<?=$sp->getImage() ?>"> <!-- Pas de figure car ces miniatures ne doivent pas apparaître ds les moteurs de recherche -->
                                                </a>
                                                
                                                <div class="width_l padding_s center-txt">
                                                        <?= '<a class="button1" href="index.php?class=person&action=showPerson&person='.$sp->getId().'">' ?>
                                                                <?= '<h4 class="center-txt">'.$sp->getAka().'</h4>' ?>
                                                                <?= '<h4>'.$sp->getFirstname().' '.$sp->getName().'</h4>' ?>
                                                        </a>
                                                </div>
                                                
                                                <div class="clear_l"></div>

                                        </div>
                                


                        <?php endforeach ?>
                <?php endif ?>

        <?php endif ?>




    </section>

    <div>
       
                <?php 
                        $total = Person::count();
                        $pagination = Tools::paginate($total,50); 
                ?>
                <?php foreach($pagination as $page => $limit):  ?>
                        <a href="index.php?class=person&action=showList&page=<?= $page ?>&limit=<?= $limit ?> ">
                                <?= $page ?>
                        </a>
                <?php endforeach ?>

        
    </div>

        



</div> <!--End of subcontainer ([section [article+aside]] + section) -->











<?php require_once "footer.php"; ?>



