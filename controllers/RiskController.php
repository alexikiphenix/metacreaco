<?php


class RiskController extends AbstractController
{
    /**
     * Show list of functions (Admin mode)
     * 
     */
    public function showList()
    {
        $session = new Session();
        if($session->isLogged() && $session->isAdmin())
        {
            $this->renderView("admin/list_risk_view", [
                "risks" => Risk::list()
            ]);
        }
        else
        {
            $this->renderView("index_view", [
                "message" => 'Vous étiez sur une page réservée au administrateurs(trices)'
            ]);
        }

    }

    /**
     * Show list of risks (Admin mode)
     * 
     */
    public function edit()
    {
        if(!empty($_POST["risk"]) && is_array($_POST["risk"]))
        {
            $this->editRisks();
        }
        else
        {
            $this->renderView("admin/edit_risks_view", [
                "risks" => Risk::list()
            ]);
        }
    }

   
    /**
     * Edit 1 or several risks in a row : update, add, delete
     * 
     * @return Bool
     */
    public function editRisks(): Bool
    {
        $session = new Session();
        if($session->isLogged() && $session->isAdmin())
        {
            if(!empty($_POST["risk"]) && is_array($_POST["risk"]))
            {
                $updates = $_POST["risk"];
                $modify = false;
                
                    foreach($updates as $key => $field)
                    {                        
                            if(is_numeric($key))
                            {
                            $risk = Risk::getById($key);
                                    if(!empty($field["name"]))
                                    {
                                        $name = htmlentities($field["name"]);
                                        $risk->setName($name);
                                        $modify = true;
                                    }

                                    if(!empty($field["description"]))
                                    {
                                        $description = htmlentities($field["description"]);
                                        $risk->setDescription($description);
                                        $modify = true;
                                    }

                                    if(!empty($field["points"]))
                                    {
                                        $points = htmlentities($field["points"]);
                                        $risk->setPoints($points);
                                        $modify = true;
                                    }

                                    if(!empty($field["delete"]))
                                    {
                                        JnctPersonRisk::delete($key); 
                                        Risk::delete($key);
                                    }
                            }
                            
                            if($key == "add")
                            {                               
                                if(
                                    !empty($updates["add"]["name"]) &&
                                    !empty($updates["add"]["description"]) &&
                                    !empty($updates["add"]["description"])
                                )
                                {                                
                                    $newRisk = new Risk();
                                    $newRisk->setName(htmlentities($updates["add"]["name"]));
                                    $newRisk->setDescription(htmlentities($updates["add"]["description"]));
                                    $newRisk->setPoints(htmlentities($updates["add"]["points"]));

                                    $newRisk->add();                              
                                }
                            }
                                                    
                            if($modify === true)
                            {
                                $risk->edit();
                                $modify = false;
                            }
                                                        
                    }//foreach($updates as $key => $field)
                $this->renderView("admin/edit_risks_view", [
                    "risks" => Risk::list()
                ]);
            return true;
            }//if(!empty($_POST["risk"]) && is_array($_POST["risk"]))
            else
            {
                $this->renderView("admin/edit_risks_view", [
                    "risks" => Risk::list()
                ]);
                return false;
            }

        //Tools::redirectTo("index.php?class=risk&action=edit");    
        }
    } // if($session->isLogged() && $session->isAdmin())


}