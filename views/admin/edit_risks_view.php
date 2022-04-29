<?php require_once"header.php"; ?>
<h1 class="center-txt" id="title"><strong>Modifier les risques</strong></h1>


<section>
<form action="" method="post">
    <article>      
       
        
        <?php for($i = 0; $i < count($risks); $i++): ?> 
            <fieldset class="contrib_n_risk-edit-view">
            <legend>Risque <?= $i+1 ?></legend>
                <div class="full-width">                  

                        <div class="inline-block">
                            <div class="contrib_n_risk_view-col1">                      
                                <label for="name<?= $risks[$i]->getId() ?>">Nom risque : </label> 
                                <?= $risks[$i]->getName() ?><a href="#"><i id="name<?= $risks[$i]->getId() ?>" class="fas fa-edit size_m"></i></a>
                                <input class="hidden" type="text" id="name<?= $risks[$i]->getId() ?>" name="risk[<?= $risks[$i]->getId() ?>][name]" placeholder="<?= html_entity_decode($risks[$i]->getName()) ?>">                                                                

                                <label for="description<? $risks[$i]->getId() ?>">Description : </label>
                                <?= html_entity_decode($risks[$i]->getDescription()) ?> <a href="#"><i class="fas fa-edit size_m"></i></a>
                                <textarea class="hidden" id="description<? $risks[$i]->getId() ?>" name="risk[<?= $risks[$i]->getId() ?>][description]" rows="10" placeholder="<?= html_entity_decode($risks[$i]->getDescription()) ?>"></textarea>                                
                            </div>
                            
                            <div class="contrib_n_risk_view-col2">
                                <label for="points<?= $risks[$i]->getId() ?>">Points : </label>
                                <?= $risks[$i]->getPoints() ?><i class="fas fa-edit size_m"></i>
                                <div>
                                    <input class="hidden" type="text" name="risk[<?= $risks[$i]->getId() ?>][points]" id="<?= $risks[$i]->getId() ?>" placeholder="<?= $risks[$i]->getPoints() ?>">
                                </div>
                            </div> 
                            <div class="contrib_n_risk_view-col3">
                                <i class="far fa-list-alt"></i>
                                <div>
                                    <i class="fas fa-times-circle alert"></i>                                   
                                </div>
                                <div>
                                    <input class="hidden" type="checkbox" name="risk[<?= $risks[$i]->getId() ?>][delete]">
                                </div>
                            </div>                              
                        </div>                             

                    </div>

                </div>         
       
            </fieldset> 
      
    <?php endfor ?> 

    </fieldset>    
        <fieldset class="contrib_n_risk-edit-view">
        <legend>Ajouter un risque</legend>
        <div class="full-width">
            <div class="inline">                                
                <div class="contrib_n_risk_view">
                        <label for="risk[add][name]">Dénomination : </label>
                        <input class="full-width" id="risk[add][name]" type="text" name="risk[add][name]">                                        
                        
                        <label for="risk[add][description]">Description : </label>
                        <textarea class="full-width" id="risk[add][description]" name="risk[add][description]" rows="10">
                        </textarea>
                </div>
                <div class="contrib_n_risk_view-col2">
                    <label for="risk[add][points]">Points : </label>
                    <input class="full-width" id="risk[add][points]" type="number" name="risk[add][points]">
                </div>    
        </div>
    </fieldset>

            <button class="enhanced_button-2" type="submit">
                <i class="far fa-save"></i>Enregistrer
            </button>       
    </article>  

</form>
</section>

<?php require_once "footer.php"; ?>