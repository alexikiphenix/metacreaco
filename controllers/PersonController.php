<?php

class PersonController extends AbstractController{
 
    /**
    * Charge the dashboard load page
    * 
    */
    public function index(): void
    {
        $session = new Session();
        if(!empty($_SESSION['user']) && $session->isLogged())
        {
            $total = Person::count();
            if(!empty($_GET["limit"])
                && is_numeric($_GET["limit"])
                && is_numeric($_GET["offset"])
            )
            {
                $limit = $_GET["limit"];
                $offset = $_GET["offset"];                
                $this->renderView(''.$_SESSION["user"]["role"].'/list_persons_view', [
                    "persons" => Person::listWithLimit($offset, $limit),
                    "total" => $total,
                    "pagination" => Tools::paginate($total, $limit) 
                ]);
            }
            else
            {
                $this->renderView("user/list_persons_view", [
                    "persons" => Person::listWithLimit(0, 25),
                    "total" => $total,
                    "pagination" => Tools::paginate($total, 25) 
                ]);
            }
        }
    }

    /***
    * Logout and redirect to home (index)
    */
    public function logout()
    {
        $session = new Session();
        $session->logout();

        /* $this->redirectTo("index.php"); */
        (new DefaultController())->index();
    }
   

    /**
     * This function shows the list of persons for admins 
     * 
     * 
     */
    public function showList()
    {      
        $session = new Session(); 
        
        if(!empty($_GET["offset"]) && !empty($_GET["limit"]))
        {   
            if($session->isLogged() && $session->isAdmin())
            {         
                if(is_numeric($_GET["limit"]) && is_numeric($_GET["offset"]))
                {
                    $limit = $_GET["limit"];
                    $offset = $_GET["offset"];
                    $total = Person::count();
                    $this->renderView("admin/list_persons_view", [
                        "persons" => Person::listWithLimit($offset, $limit),
                        "total" => $total,
                        "pagination" => Tools::paginate($total, $limit) 
                    ]);
                }
                else
                {
                    $total = Person::count();
                    $this->renderView("admin/list_persons_view", [
                        "persons" => Person::listWithLimit(0, 25),
                        "total" => $total,
                        "pagination" => Tools::paginate($total, 25) 
                    ]);
                }
            }
            else
            {
                if(is_numeric($_GET["limit"]) && is_numeric($_GET["offset"]))
                {
                    $limit = $_GET["limit"];
                    $offset = $_GET["offset"];
                    $total = Person::count();
                    $this->renderView("user/list_persons_view", [
                        "persons" => Person::listWithLimit($offset, $limit),
                        "total" => $total,
                        "pagination" => Tools::paginate($total, $limit) 
                    ]);
                }
                else
                {
                    $total = Person::count();
                    $this->renderView("user/list_persons_view", [
                        "persons" => Person::listWithLimit(0, 25),
                        "total" => $total,
                        "pagination" => Tools::paginate($total, 25) 
                    ]);
                }
            }
        }
        else
        {                       
            $total = Person::count();
            if($session->isLogged())
            {
                $this->renderView(''.$_SESSION['user']['role'].'/list_persons_view', [
                    "persons" => Person::listWithLimit(0, 25),
                    "total" => $total,
                    "pagination" => Tools::paginate($total, 25) 
                ]);
            }
            else
            {
                $this->renderView('user/list_persons_view', [
                    "persons" => Person::listWithLimit(0, 25),
                    "total" => $total,
                    "pagination" => Tools::paginate($total, 25) 
                ]);
            }
        }

    } // end showList()


    public function showManageAll()
    {
        if(!empty($_POST["deletePerson"]) && is_numeric($_POST["deletePerson"])) // delete the last person deleted before showing the list
        {
            Person::delete($_POST["deletePerson"]);              
        }
        
        $this->renderView("admin/manage_all_view", [
            "persons" => Person::list()
        ]);
    }

    /**
     * Show a selected person using id sent by $_GET("person")
     * @return bool
     */
    public function show():bool
    {
        if(!empty($_GET["person"]) && is_numeric($_GET["person"]))
        {
            
            
            if(Person::getById($_GET["person"]) instanceof Person)
            {
                $session = new Session();
                if($session->isLogged())
                {
                    $this->renderView(''.$_SESSION['user']['role'].'/person_view', [
                        "person" => Person::getById(htmlentities($_GET["person"]))
                    ]);
                }
                else
                {
                    $this->renderView('user/person_view', [
                        "person" => Person::getById(htmlentities($_GET["person"]))
                    ]);
                }


                return true;
            }            
            else   
            {
                (new DefaultController())->index(); 
                return false;
            }
        }
        else
        {
            (new DefaultController())->index(); 
            return false;
        }
    }


    /**
     * Delete a person
     * @return bool
     */
    public function delete(): bool
    {       
        
        if(!empty($_GET["person"]) && is_numeric($_GET["person"]))
        {
            $idPerson = $_GET["person"];            
            $session = new Session;
            if(Person::getById($idPerson) instanceof Person
                && $session->isLogged()
            )
            {        
                $person = Person::getById($idPerson);

                if($session->isAdmin()
                    || $_SESSION["user"]["id"] == $person->getUserId()                
                )
                {              
                    if(!empty($_GET["limit"]) && !empty($_GET["offset"])
                        && is_numeric($_GET["limit"]) && is_numeric($_GET["offset"])
                    )
                    {
                        $limit = htmlentities($_GET["limit"]);
                        $offset = htmlentities($_GET["offset"]);
                        $total = Person::count();
                        $this->renderView(''.$_SESSION["user"]["role"].'/list_persons_view', [
                            "persons" => Person::listWithLimit($offset, $limit),
                            "total" => $total,
                            "pagination" => Tools::paginate($total, $limit) 
                        ]);                        
                    }
                    else
                    {
                        $total = Person::count();
                        $this->renderView("admin/list_persons_view", [
                            "persons" => Person::listWithLimit(0, 25),
                            "total" => $total,
                            "pagination" => Tools::paginate($total, 25) 
                        ]);
                    }
                    
                    Person::delete($idPerson);
                    return true;
                }  
                else
                {    
                    $total = Person::count();
                    $this->renderView(''.$_SESSION["user"]["role"].'/list_persons_view', [
                        "persons" => Person::listWithLimit(0, 25),
                        "total" => $total,
                        "pagination" => Tools::paginate($total, 25), 
                        "message" => "Vous ne pouvez supprimer que les personnes que vous avez créé !"
                        
                    ]);
                    return false; 
                }          
            }
            else
            {
                $this->redirectTo('index.php?class=user&action=login#person'.$idPerson.'');
                return false;
            }
        }//if(!empty($_GET["person"]) && is_numeric($_GET["person"]))
        else
        {
            (new DefaultController())->index();
            return false;   
        }   
    }// function delete()


    /**
     * This function gets the list of duplicate persons and send to viewS
     *  
     */
    public function listDuplicates()
    {        
        //$duplicates = Person::listDuplicates();
        if(!empty($_GET["offset"]) && !empty($_GET["limit"]))
        {            
            if(is_numeric($_GET["limit"]) && is_numeric($_GET["offset"]))
            {
                $limit = $_GET["limit"];
                $offset = $_GET["offset"];
                $total = Person::countDuplicates();
                $this->renderView("admin/list_duplicates_view", [
                    "persons" => Person::listDuplicatesWithLimit($offset, $limit),
                    "total" => $total,
                    "pagination" => Tools::paginate($total, $limit) 
                ]);
            }
            else
            {
                $total = Person::countDuplicates();
                $this->renderView("admin/list_duplicates_view", [
                    "persons" => Person::listDuplicatesWithLimit(0, 25),
                    "total" => $total,
                    "pagination" => Tools::paginate($total, 25) 
                ]);
            }
        }
        else
        {
            $total = Person::countDuplicates();
            $this->renderView("admin/list_duplicates_view", [
                "persons" => Person::listDuplicatesWithLimit(0, 25),
                "total" => $total,
                "pagination" => Tools::paginate($total, 25) 
            ]);
        }
    }



    /**
     * Add a person with values sent from form
     * @return bool
     */
    public function add(): bool
    {
       $session = new Session();
       if($session->isLogged())
       {
            if(!empty($_POST["name"])
                && !empty($_POST["firstname"])
                && !empty($_POST["birth"])
            )
            {      
            if(!empty($_POST['boost']) && $_POST['boost'] == 'yes')     
                $points = 2000;
            else
                $points = 250;

            $person = new Person();                                
                $person = new Person();
                $person->setName(trim(htmlentities($_POST["name"])));
                $person->setFirstname(trim(htmlentities($_POST["firstname"])));
                $person->setAka(htmlentities($_POST["aka"]));
                $person->setGender(htmlentities($_POST["gender"]));
                $person->setBirth(htmlentities($_POST["birth"]));
                $person->setProfession(htmlentities($_POST["profession"]));                
                $person->setVotes(5);
                $person->setPoints($points);
                $person->setDescription(trim(htmlentities($_POST["description"])));
                $person->setDeath(htmlentities($_POST["death"]));
                $person->setRank(NULL);
                $person->setBestRank(NULL);
                $person->setEditedAt(date('Y-m-d H:i:s'));
                $person->setActivated(1);
                $person->setClaims(0);
                $person->setDuplicates(0);                
                $person->setLink(htmlentities($_POST["link"]));
                $person->setImage('assets/person/no-img.jpg');
                $person->setNationality(htmlentities($_POST["nationality"]));
                $person->setUserId($_SESSION['user']['id']);
                
                $idPerson = $person->add();

                $person = Person::getById($idPerson);

                if(!empty($_FILES['imgPerson']))
                {
                    if($_FILES['imgPerson']['size'] > 0)
                    {
                        $path = Tools::putImage('imgPerson', 'person', $idPerson);      
                    }
                    else
                    $path = "assets/img/person/no-img.jpg";   
                }           
                else
                    $path = "assets/img/person/no-img.jpg";

                $person->setImage($path);
                $person->edit();             
                    
            
                if(!empty($_POST['contribution']) && is_array($_POST['contribution']))
                {
                    $contributions = $_POST['contribution'];
                    Person::insertContribs($idPerson, $contributions);
                }
                else
                    $contributions = null;
                
                if(!empty($_POST['risk']) && is_array($_POST['risk']))
                {
                    $risks = $_POST['risk'];
                    Person::insertRisks($idPerson, $_POST['risk']);
                }
                else
                    $risks = null;

                if(!empty($contributions) || !empty($risks))
                {
                    Person::editContribsAndRisks($idPerson, $contributions, $risks);
                }

                $this->renderView(''.$_SESSION['user']['role'].'/person_view', [
                    "person" => Person::getById($idPerson),
                    "message" => 'Dernière personne proposée (en attente de validation par un(e) administrateur(trice)):
                    '.Tools::showIf($person->getAka(), " | ").$person->getFirstname().' '.$person->getName()
                ]);   
                return true;
            } // if(!empty($_POST["name"]))
            else
            {
                $this->renderView(''.$_SESSION['user']['role'].'/add_person_view');
                return false;
            }
       } // if($session->isLogged())
       else
       {
            $this->redirectTo('index.php?class=user&action=login');      
            /*$this->renderView("login_view", [
               "message" => "Vous devez vous connecter pour ajouter une personne au classement !"
           ]);*/
           return false;
       }
    }



    /**
     * Allow you to modify a person and his/her contributions + risks
     * @return bool
     */
    public function edit(): bool
    {
        $session = new Session; 
        if(!empty($_POST["name"])
            && !empty($_GET["person"])
            && is_numeric($_GET["person"])
        )
        {                      
            $idPerson = htmlentities($_GET["person"]);
            if($session->isLogged() 
                && ($session->isAdmin() || $_SESSION["user"]["id"] == $idPerson)                           
            )
            {    
                if(Person::getById($idPerson) instanceof Person)
                {
                    $person = Person::getById($idPerson);
                    $path = $person->getImage();

                    if(!empty($_FILES['imgPerson']['size']))
                    {
                        if($_FILES['imgPerson']['size'] > 0)
                            $path = Tools::putImage('imgPerson', 'person', $idPerson);                                           
                    }
                    else if(empty($path)) 
                        $path = "assets/img/person/no-img.jpg";

                        $person->setName(trim(htmlentities($_POST["name"])));
                        $person->setFirstname(trim(htmlentities($_POST["firstname"])));
                        $person->setAka(trim(htmlentities($_POST["aka"])));
                        $person->setGender(htmlentities($_POST["gender"]));
                        $person->setBirth(htmlentities($_POST["birth"]));
                        $person->setProfession(trim(htmlentities($_POST["profession"])));
                        $person->setDescription(trim(htmlentities($_POST["description"])));
                        $person->setDeath(htmlentities($_POST["death"]));
                        $person->setEditedAt(date('Y-m-d H:i:s'));
                        $person->setLink(htmlentities($_POST["link"]));
                        $person->setImage($path);                                    
                        
                        $person->edit();
                
                        if(isset($_POST['contribution']) && is_array($_POST['contribution']))
                        $selectedContribs = $_POST['contribution'];
                        else 
                        $selectedContribs = [];

                        if(isset($_POST['risk']) && is_array($_POST['risk']))
                            $selectedRisks = $_POST['risk'];
                        else 
                            $selectedRisks = [];

                        Person::editContribsAndRisks($idPerson, $selectedContribs, $selectedRisks);
                      

                        if(!empty($_GET["page"]) 
                            && is_numeric($_GET["page"])
                            && !empty($_GET["rank"]) 
                            && is_numeric($_GET["rank"])
                            && !empty($_GET["offset"]) 
                            && is_numeric($_GET["offset"])
                            && !empty($_GET["limit"]) 
                            && is_numeric($_GET["limit"])                    
                        )
                        {
                            // BECAUSE OF ANCHOR I CHOOSE TO REDIRECT INSTEAD OF USING RENDERVIEW() TO SEND ALL PARAMETERS TO THE PAGE WILL BE RELOADED WITH GOOD PARAMETERS
                            $this->redirectTo('index.php?class=person&action=show&person='.$_GET["person"].'&rank='.$_GET["rank"].'&page='.$_GET["page"].'&offset='.$_GET["offset"].'&limit='.$_GET["limit"].'#title');                    
                        }
                        else
                        {      
                            Tools::redirectTo('index.php?class=person&action=show&person='.$_GET["person"].'');
                            return true;
                        }                   
                        
                    return true;
                }
                else
                {
                    (new DefaultController())->index(); 
                    return false;
                }
            }
            else if($session->isLogged())
            {
                $this->renderView('index_view', [
                    'message' => ['Impossible de modifier directement une personne créée par un autre utilisateur,',
                        'vous pouvez demander des modifications à l\'aide du formulaire de contact : ',
                        '<a href="index.php?class=contact&action=contest&person='.$idPerson.'#title>Cliquer ici pour réclamer une modification</a>'
                    ]
                ]);
            }
            else 
            {
                $this->renderView('index_view', [
                    'message' => ['Connexion ou inscription obligatoire, pour modifier une fiche,',
                        '<a href="index.php?class=user&action=login&person='.$idPerson.'#title>Cliquer ici pour vous connecter</a>',
                        '<a href="index.php?class=user&action=register&person='.$idPerson.'#title>Cliquer ici pour vous inscrire</a>'
                    ]
                ]);
                return false;
            }
        } // if(!empty($_POST["name"]) && !empty($_GET["person"]) && is_numeric($_GET["person"])
        else if($session->isLogged() 
                && ($session->isAdmin() || $_SESSION["user"]["id"] == $idPerson) 
                && (!empty($_GET["person"]) && is_numeric($_GET["person"]))
        )
        {
            if(Person::getById($_GET["person"]) instanceof Person)
            {
                $idPerson = $_GET["person"]; 
                $this->renderView(''.$_SESSION['user']['role'].'/edit_person_view', [
                    "person" => Person::getById($idPerson)                        
                ]);
                return false;    
            }
            else
            {
                $this->renderView('index_view', [
                    "persons" => Person::listWithLimit(0, 20),
                    "person_search" => Person::searchPersons(),
                    'message' => 'Personne inconnue ou supprimée'
                ]);
                return false;
            }
        }
        else 
        { /*
            $this->renderView('index_view', [
                'message' => ['Connexion ou inscription obligatoire, pour modifier une fiche,',
                    '<a href="index.php?class=user&action=register#title>Cliquer ici pour vous inscrire</a>',
                    '<a href="index.php?class=user&action=login#title>Cliquer ici pour se connecter</a>'
                ]
            ]);
            */
            $this->renderView('index_view', [
                "persons" => Person::listWithLimit(0, 20),
                "person_search" => Person::searchPersons(),
                'message' => 'Connexion ou inscription obligatoire, pour modifier une fiche,'
            ]);
            return false;
        }
    (new DefaultController())->index(); 
    return false;       
    }// public function edit(): bool
}





