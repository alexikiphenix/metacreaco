<?php


class ContributionController extends AbstractController
{
  
  
    /**
     * Edit 1 or several contributions in a row : update, add, delete
     * 
     * @return Bool
     */
    public function edit() : Bool
    {
        $session = new Session();
        if($session->isLogged() && $session->isAdmin())
        {
            if(!empty($_POST["contribution"]) && is_array($_POST["contribution"]))
            {
                $updates = $_POST["contribution"];
                $modify = false;
                
                    foreach($updates as $key => $field)
                    {                        
                            if(is_numeric($key))
                            {
                            $contribution = Contribution::getById($key);
                                    if(!empty($field["name"]))
                                    {
                                        $name = htmlentities($field["name"]);
                                        $contribution->setName($name);
                                        $modify = true;
                                    }

                                    if(!empty($field["description"]))
                                    {
                                        $description = htmlentities($field["description"]);
                                        $contribution->setDescription($description);
                                        $modify = true;
                                    }

                                    if(!empty($field["points"]))
                                    {
                                        $points = htmlentities($field["points"]);
                                        $contribution->setPoints($points);
                                        $modify = true;
                                    }

                                    if(!empty($field["delete"]))
                                    {
                                        JnctPersonContribution::delete($key); 
                                        Contribution::delete($key);
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
                                    echo '<h2>ADD=> OK</h2>';
                                    $newContribution = new Contribution();
                                    $newContribution->setName(htmlentities($updates["add"]["name"]));
                                    $newContribution->setDescription(htmlentities($updates["add"]["description"]));
                                    $newContribution->setPoints(htmlentities($updates["add"]["points"]));

                                    $newContribution->add();                              
                                }
                            }
                                                    
                            if($modify === true)
                            {
                                /*
                                echo '<pre>';
                                print_r($contribution);
                                echo '</pre>';*/
                                $contribution->edit();
                                $modify = false; 
                            }
                                                        
                    }//foreach($updates as $key => $field)

                $this->renderView('admin/edit_contributions_view', [
                    'contributions' => Contribution::list()     
                ]);
                return true;
            }//if(!empty($_POST["risk"]) && is_array($_POST["risk"]))
            else
            {
                $this->renderView('admin/edit_contributions_view', [
                    'contributions' => Contribution::list() 
                ]);
                return false;
            }       
        }
        else
        {
            (new DefaultController())->index();
            return false;
        }

    }
   





}