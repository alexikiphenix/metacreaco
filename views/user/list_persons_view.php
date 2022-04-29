<?php require_once "header.php"; ?>
<h1 id="title" class="title-with-sub">Liste des meilleures personnes du monde USER</h1>
<h2 class="sub-title">(classement complet)</h2>

<main class="items-and-search-block">

	<section class="items-block">
			
		<?php if(!empty($_POST))
				var_dump($_POST);
				
		// Tools::showPreviousAnchor($_GET["anchor"]);
				if(!empty($_POST["previousAnchor"]))
					Tools::goToAnchorAdm(htmlentities($_POST["previousAnchor"]));
								
		?>  
	<?php foreach ($persons as $p): ?>
		<article class="item-block" id="person<?= $p->getId() ?>">
		<!--<article id="anchor=<*= $p->getRank() ?>"> -->

			<div id="rank<?= $p->getRank() ?>" class="item-img-block">
				<div class="rank"> 
						<?= $p->getRank(); ?> 
				</div>					
					<a href="index.php?class=person&action=show&person=<?= $p->getId() ?>">
					<figure>
						<img alt="<?= $p->getName() ?>" src="<?= $p->getImage() ?>">
						<figcaption>
							<?php $fullName = Tools::showIf($p->getAka()," | ").''.$p->getFirstname().' '.strtoupper($p->getName()); ?>   
							<?= substr($fullName, 0, 40) ?> 
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
					<?= Tools::showIf($p->getAka()," | ").''.$p->getFirstname().' '.strtoupper($p->getName()); ?>
				</h3>
				<h4>    
                    <?= $p->getPoints().' points | '.$p->getGender(); ?>
                    <?= '| Profession(s) : '.$p->getProfession(); ?> 
				</h4>
				<?php $txt=html_entity_decode($p->getDescription()); ?>

				<p> <?= Tools::showTxtCut($txt,310) ?> </p> 
										
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
                                        <?php //*'id:  '.$personContributions[$i]['id_contribution']; ?> 
                                        <?= ' '.$personRisks[$i]['name']; ?> 
                                        <?php //' '.$personContributions[$i]['points']; ?>                                                      
                                    </li>
                                <?php endfor ?>
                            </ul>
                    </ul>
						
				</div> <!-- contrib_n_risk -->   
				
				<p class="link-add">
				
                    <?= '<a href="index.php?class=person&action=add">' ?>
                        <i class="fas fa-user-plus"></i>                                                             
                        Ajouter une personne
                    </a>
                    <i class="fas fa-search"></i>
				</p>
			</div> <!-- Regular -->
			
			<nav class="nav-item-block">
                <p>
                    <a id="vote<?= $p->getId() ?>" href="#">
                        <i class="far fa-thumbs-up"></i>voter pour <?= Person::showPronoun($p->getGender())?>
                    </a>
                </p>
                <p>                                                        
                    <a  href="index.php?class=person&action=show&person=<?= $p->getId() ?>&anchor=<?= Tools::showIf($p->getRank()) ?>">
                        <i class="fas fa-info-circle"></i>voir fiche
                    </a>
                </p>
                <p>
                    <a  href="index.php?class=person&action=edit&person=<?= $p->getId() ?>&anchor=<?= $p->getRank() ?>">
                        <i class="far fa-edit"></i>modifier
                    </a>
                </p>
                <p>
                    <a  href="views/user/test_increase.php?class=person&addDuplicates=1&person=<?= $p->getId() ?>&anchor=<?= $p->getRank() ?>">
                        <i class="far fa-copy"></i>signaler doublon
                    </a>
                </p>
                <p>
                    <a  href="index.php?class=person&action=showContest=<?= $p->getId() ?>&anchor=<?= $p->getRank() ?>">
                        <i class="far fa-thumbs-down"></i>contester
                    </a>
                </p>
                <p>
                    <?= '<a  href="index.php?class=person&action=deletePerson&person='.$p->getId().'&anchor='.Tools::showIf($p->getRank()).'">' ?>
                        <i class="fas fa-trash-alt"></i>supprimer
                    </a>
                </p>
			</nav>                  
			
		</article> <!-- article_one_aside -->
											

	<?php endforeach ?>
	</section>
        <aside class="search-block">     

            <form action="" method="post">
                <div class="search-form">
                    <h3>Rechercher une personne</h3>                              
                        <label for="name">Nom</label>                                    
                        <input type="text" name="name">

                        <label for="firstname">Prénom</label>
                        <input type="text" name="firstname">

                        <label for="aka">Surnom</label>
                        <input type="text" name="aka">
                        <input type="hidden" name="check" value="12ko26u7">
                                                
                <button class="width_full" type="submit">Rechercher</button>
                </div>                                          
            </form>

            <?php if(isset($_POST["name"]) || isset($_POST["firstname"]) || isset($_POST["aka"])): ?>

                <?php $seeked_person = Person::searchPersons(); ?>
                <?php if($seeked_person != null): ?>
                    <h2>Votre recherche</h2>
                    <?php foreach($seeked_person as $sp): ?>
                            
                        <p class="search-p">                                                                                            
                            <figure>
                                <?= '<a href="index.php?class=person&action=show&person='.$sp->getId().'">' ?>
                                    <img class="search-img" src="<?=$sp->getImage() ?>" alt="<?= $sp->getAka().' - '.$sp->getFirstname().' '.$sp->getName() ?>"> <!-- Pas de figure car ces miniatures ne doivent pas apparaître ds les moteurs de recherche -->
                                    <figcaption>
                                            <?= $sp->getAka().' ' ?>
                                            <?= $sp->getFirstname().' '.$sp->getName() ?>
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
                    <?php if($page > 0): ?>
                            <a href="index.php?class=person&action=showList&page=<?= $page ?>&offset=<?= $pagination[$page]; ?>&limit=<?= $pagination[0]; ?>">
                                    <?= $page ?>
                            </a>
                    <?php endif ?>
    <?php endfor ?>
</nav>



<?php require_once "footer.php"; ?>



