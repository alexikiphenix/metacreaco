<?php require_once "header.php"; ?>
<h1 id="title" class="center-txt">Liste des meilleures personnes du monde (classement complet)</h1>
<div class="spacer"></div>
<div class="subcontainer">

    <section class="main_section">
       
                
            <?php foreach ($persons as $p): ?>
                <div class="article_one_aside bg_main margin_b_s">

					<div class="box_img_person_s margin_t_m padding_s">
						<div class="inline">
							<div class="top_left points"> <?= $rank++ ?> 
							</div>

							<figure class="fig_person center_block">
								<?= '<img class="img_person txt_center" alt="'.$p->getName().'" src="'.$p->getImage().'"'?>
								<figcaption>
										<?= $p->getFirstname().' '.strtoupper($p->getName()); ?>                                                        
								</figcaption>
							</figure>
						</div>
						<p> <?= Tools::jauge($p->getPoints(),2500); ?> </p>
					</div>

					<div class="regular width_l">

						<h3 class="margin_xs">    
							<?= $p->getAka().' | '.$p->getFirstname().' '.strtoupper($p->getName()); ?>
						</h3>
						<h4>    
							<?= $p->getPoints().' points | '.$p->getGender(); ?>
							<?= '| Profession(s) : '.$p->getProfession(); ?> 
						</h4>
						<?php $txt=$p->getDescription(); ?>
				
						<p> <?= html_entity_decode(Tools::showTxtCut($txt,310)) ?> </p> 
														
						<div class="contrib_n_risk">
							<div class="width50">   
								<h3 class="margin_xs">Contributions</h3>
								<?php   
									$person_contribution=new JnctPersonContribution(); 
									$person_contribution=$person_contribution->listByIdPerson($p->getId());
									
									$contribution = new Contribution();									
								?>
								
								<ul class="margin_xs">
									<?php foreach($person_contribution as  $pc): ?>
										<li>    
											<?php  $contribution=$contribution->getById($pc->getContributionId());
											echo $contribution->getName();  
											?>
										</li>
									<?php endforeach ?>
								</ul>
							</div>

								<div class="width50">   
									<h3 class="margin_xs">Risque encouru</h3>

									<?php   
										$person_risk=new JnctPersonRisk(); 
										$person_risk=$person_risk->listByIdPerson($p->getId());
										
										$risk = new Risk();								
									?>								
										<ul class="margin_xs">
											<?php foreach($person_risk as  $pr): ?>
												<li>   									
													<?php $risk=$risk->getById($pr->getRiskId());
													echo $risk->getName();																				
													?>
												</li>
											<?php endforeach ?>
										</ul>
								</div> <!-- width50 risque encouru -->
						</div> <!-- contrib_n_risk -->   
									
											
					</div> <!-- Regular -->
					
					<div class="action_on_person width_xs">
						<p>
							<button class="width_xl" type="submit" onsubmit="location();">voter pour <?= Person::showPronoun($p->getGender())?></button>
						</p>
						<p>
							<button class="width_xl" type="submit" onsubmit="location();">contester</button>
						</p>
						<p>
							<button class="width_xl" type="submit" onsubmit="location();">voir fiche</button>
						</p>
						<p>
							<button class="width_xl" type="submit" onsubmit="location();">signaler doublon</button>
						</p>
					</div>                  
                        
                 </div> <!-- article_one_aside --> 
                                

            <?php endforeach ?>
    </section>

    <section class="width_xs annex">     

        <form action="" method="post">
			<fieldset center_block>
			<legend>Rechercher une personne</legend>  
				<div center_block>
					<label for="name">Nom</label>                                    
					<input class="width_xl" type="text" name="name">

					<label for="firstname">Prénom</label>
					<input class="width_xl" type="text" name="firstname">

					<label for="aka">Surnom</label>
					<input class="width_xl" type="text" name="aka">
					<input type="hidden" name="check" value="12ko267">
				</div>                             
			<button class="width_xl" type="submit">Rechercher cette personne</button>
			</fieldset>                                          
        </form>

        <?php if(isset($_POST["name"]) || isset($_POST["firstname"]) || isset($_POST["aka"])): ?>
               
			<?php $seeked_person = Person::searchPersons(); ?>
			<?php if($seeked_person != null): ?>
				<?php foreach($seeked_person as $sp): ?>
					<div class="border_b">					
						<img class="box_img_person float_l" src="<?=$sp->getImage() ?>"> <!-- Pas de figure car ces miniatures ne doivent pas apparaître ds les moteurs de recherche -->
						
						<div>
								<?= '<div>'.$sp->getAka().'</div>' ?>
								<?= $sp->getFirstname().' '.$sp->getName() ?>
						</div>
						<div class="clear_l"></div>
					</div>
				<?php endforeach ?>
			<?php endif ?>

        <?php endif ?>




    </section>

</div> <!--End of subcontainer ([section [article+aside]] + section) -->




<?php require_once "footer.php"; ?>



