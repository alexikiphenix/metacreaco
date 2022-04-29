<?php require_once"header.php"; ?>
<h1 class="center-txt" id="title"><strong>Modifier les contributions</strong></h1>


<section>
<form action="" method="post">
    <article>      
       
        
        <?php for($i = 0; $i < count($contributions); $i++): ?> 
            <fieldset class="contrib_n_risk-edit-view">
            <legend>Contribution <?= $i+1 ?></legend>
                <div class="full-width">                  

                        <div class="inline-block">
                            <div class="contrib_n_risk_view-col1">                      
                                <label for="name<?= $contributions[$i]->getId() ?>">Nom contribution : </label> 
                                <?= $contributions[$i]->getName() ?><a href="#"><i id="name<?= $contributions[$i]->getId() ?>" class="fas fa-edit size_m"></i></a>
                                <input class="hidden" type="text" id="name<?= $contributions[$i]->getId() ?>" name="contribution[<?= $contributions[$i]->getId() ?>][name]" placeholder="<?= html_entity_decode($contributions[$i]->getName()) ?>">                                                                

                                <label for="description<? $contributions[$i]->getId() ?>">Description : </label>
                                <?= html_entity_decode($contributions[$i]->getDescription()) ?> <a href="#"><i class="fas fa-edit size_m"></i></a>
                                <textarea class="hidden" id="description<? $contributions[$i]->getId() ?>" name="contribution[<?= $contributions[$i]->getId() ?>][description]" rows="10" placeholder="<?= html_entity_decode($contributions[$i]->getDescription()) ?>"></textarea>                                
                            </div>
                            
                            <div class="contrib_n_risk_view-col2">
                                <label for="points<?= $contributions[$i]->getId() ?>">Points : </label>
                                <?= $contributions[$i]->getPoints() ?><i class="fas fa-edit size_m"></i>
                                <div>
                                    <input class="hidden" type="text" name="contribution[<?= $contributions[$i]->getId() ?>][points]" id="<?= $contributions[$i]->getId() ?>" placeholder="<?= $contributions[$i]->getPoints() ?>">
                                </div>
                            </div> 
                            <div class="contrib_n_risk_view-col3">
                                <i class="far fa-list-alt"></i>
                                <div>
                                    <i class="fas fa-times-circle alert"></i>                                   
                                </div>
                                <div>
                                    <input class="hidden" type="checkbox" name="contribution[<?= $contributions[$i]->getId() ?>][delete]">
                                </div>
                            </div>                              
                        </div>                             

                    </div>

                </div>         
       
            </fieldset> 
      
    <?php endfor ?> 

    </fieldset>    
        <fieldset class="contrib_n_risk-edit-view">
        <legend>Ajouter une contribution</legend>
        <div class="full-width">
            <div class="inline">                                
                <div class="contrib_n_risk_view">
                        <label for="contribution[add][name]">Dénomination : </label>
                        <input class="full-width" id="contribution[add][name]" type="text" name="contribution[add][name]">                                        
                        
                        <label for="contribution[add][description]">Description : </label>
                        <textarea class="full-width" id="contribution[add][description]" name="contribution[add][description]" rows="10"></textarea>
                </div>
                <div class="contrib_n_risk_view-col2">
                    <label for="contribution[add][points]">Points : </label>
                    <input class="full-width" id="contribution[add][points]" type="number" name="contribution[add][points]">
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