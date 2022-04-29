<?php require_once "header.php"; ?>

<?php if(isset($_FILES)): ?>
        <pre>
            <?= print_r($_FILES); ?>
        </pre>
<?php endif ?>


<section>
        <article>
        <?php if(!empty($_GET["deletePerson"]) && is_numeric($_GET["deletePerson"])): ?>
                <form action="">
                        <div class="deleteDiv">
                                <h1>ESSAI DELETE</h1>
                                <button type="submit" name="submitDelete">Supprimer la personne</button>
                        </div>  
                </form>    
        <?php endif ?>


        <div class="width_l center_block color_txt_3 color_bg_3">

                <div class="inline  padding_m color_txt_2 color_bg_2>
                        <div class="width_s margin_r_m">
                              
                                <div>
                                        <a class="button2" href="index.php?class=person&action=edit&person=<?= $person->getId() ?>">
                                        modifier fiche</a>
                                </div>

                        </div>

                       

                        <div class="width_l">
                                  <figure class="fig_person center_block margin0">
                                        
                                        <?= '<img class="img_person txt_center" alt="'.$person->getName().'" src="'.$person->getImage().'">'?>
                                        <figcaption>
                                                <?= Tools::showIf(html_entity_decode($person->getAka()),' | '); ?>
                                                <?= $person->getFirstname().' '.strtoupper($person->getName()); ?>                                                        
                                        </figcaption>
                                </figure>

                                <h2>
                                        <?= Tools::showIf(html_entity_decode($person->getAka())," (surnom) <br>"); ?>
                                        <?= html_entity_decode($person->getFirstname()).' '.html_entity_decode(strtoupper($person->getName())); ?> 
                                        <?= '('.html_entity_decode($person->getGender()).')' ?>
                                </h2>
                                <h3 class="h3_bis">
                                        <?= 'Né(e) le '.html_entity_decode($person->getBirth()); ?>
                                </h3>
                                <h3 class="h3_bis">
                                        <?= Tools::showIf(html_entity_decode($person->getProfession()),'', 'Profession : ') ?>
                                </h3>
                                <h3 class="h3_bis">
                                        <?= Tools::showIf(html_entity_decode($person->getDeath()),'', 'Décès : ') ?>
                                </h3>

                                <h3 class="h3_bis">
                                        <?= Tools::showIf(html_entity_decode($person->getPoints()),'', 'Points : ') ?>
                                </h3>

                                <p>
                                    <?= html_entity_decode($person->getDescription()); ?>
                                </p>
                                <p>
                                    <?= Tools::showIf(html_entity_decode($person->getLink()), '" target="_blank">Lien vers source</a>', '<a href="'); ?>
                                </p>
                                
                        </div>
                </div>


                   <div class="padding_m color_txt_3">
                   

                        
                        <div class="contrib_n_risk">
                                        <div class="width50">   
                                                        <h4 class="margin_xs">Contributions</h4>
                                                <?php   $person_contribution=new JnctPersonContribution(); 
                                                        $person_contribution=$person_contribution->listByIdPerson($person->getId());
                                                        
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
                                                <h4 class="margin_xs color_txt_4">Risque encouru</h4>

                                                <?php   $person_risk=new JnctPersonRisk(); 
                                                        $person_risk=$person_risk->listByIdPerson($person->getId());
                                                        
                                                        $risk = new Risk();
                                                        
                                                
                                                ?>
                                        
                                                <ul class="margin_xs">
                                                <?php foreach($person_risk as  $pr): ?>
                                                        <li class="color_txt_4">    
                                                        
                                                                <?php $risk=$risk->getById($pr->getRiskId());
                                                                echo $risk->getName();    
                                                                                                
                                                                ?>
                                                        </li>
                                                <?php endforeach ?>
                                                </ul>
                                        </div> <!-- width50 risque encouru -->
                        </div> <!-- contrib_n_risk -->  

                        
                        <div class="hidden">
                                    <p>
                                         <label for="contestation_title">Choisir un titre</label>
                                         <select id="contestation_title" >
                                                <option>Personne indigne</option>
                                                <option>Erreur dans la description</option>



                                         </select>
                                         
                                    </p>

                        </div>

                        <a class="button3 width_xs center_block margin_tb_xl" href="index.php?class=person&action=edit&person=<?= $person->getId() ?>">
                                        modifier fiche</a>
                </div>
             

        </div>
        </article>
</section>