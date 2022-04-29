<?php

class UserController extends AbstractController{

    public function __construct()
    {
        $session = new Session();
        if(!$session->isLogged())
        {
            $stayQuiet = "Stay quiet";
            //$this->redirectTo("index.php?class=user&action=login");
        }
    }

    public function index()
    {
        if((new Session())->isLogged())
        {
            $idUser = $_SESSION["user"]["id"];
            if(User::getById($idUser) instanceof User)
            {
                $this->renderView(''.$_SESSION['user']['role'].'/dashboard_view', [
                    "user" => User::getById($idUser),
                    "persons" => Person::listPersonsByUser($idUser)
            ]);
            }
        }
        else
            $this->redirectTo('index.php?class=user&action=login');
    }

 
    /**
     * Register a new user
     */
    public function register()
    {
        if(!empty($_POST['email'])
            && !empty($_POST["aka"])
            && !empty($_POST["password"]))
        {
            $email = trim(htmlentities($_POST['email']));
            $aka = trim(htmlentities($_POST['aka']));
            $password = trim(htmlentities($_POST['password']));
                  
                    if(User::getByEmail($email) instanceof User)
                        $message[] = 'l\'email '.$email.' est déjà associé à un compte';                    
                    
                    if(User::getByAka($aka) instanceof User)
                        $message[] = $aka.' est un pseudonyme déjà utilisé !';  
                    
                    
                    if(!User::getByEmail($email) instanceof User
                        && !User::getByAka($aka) instanceof User)
                    {                            
                            $user = new User();                           
                            $user->setEmail(trim(strtolower(htmlentities($email))));
                            $user->setAka(trim(htmlentities($aka)));
                            $user->setPassword(htmlentities($password));
                            $user->setName(trim(htmlentities($_POST["name"])));
                            $user->setFirstname(trim(htmlentities($_POST["firstname"])));
                            $user->setAddress(trim(htmlentities($_POST["address"])));
                            $user->setPostcode(trim(htmlentities($_POST["postcode"])));
                            $user->setCity(trim(htmlentities($_POST["city"])));                            
                            $user->setImage("");
                            $user->setRole('user');
                            $user->setPoints(500);
                            $user->setLastLogin(date('Y-m-d')); 
                            $user->setActivationId(Tools::randomizeId());                   

                            $idUser = $user->add();
                           

                            if($idUser != 0)
                            {
                                $user = User::getById($idUser);                                
                                $user->setImage(Tools::putImage('avatar', 'user', $idUser));
                                $user->edit();
                                $user->sendActivationLink();
                                $message[] = 'Compte ajouté, email de validation envoyé. Vérifiez votre messagerie : '.$user->getEmail().'.';
                            } // if($id_user !=0 ) 
                            
                    }// if(!User::getByEmail($email) instanceof User && && !User::getByAka($aka) instanceof User)        
           
        } // if(!empty($_POST['email']) && !empty($_POST["aka"]) &&
        else if(!empty($_POST))
        {
            if(empty($_POST['email']))
            $message[] = 'L\'email est obligatoire !';

            if(empty($_POST['aka']))
            $message[] = 'Le pseudonyme est obligatoire !';

            if(empty($_POST['password']))
            $message[] = 'Le mot de passe est obligatoire !';
        }
        else
            $message = NULL;

        $this->renderView("register_view",
            ["message" => $message
        ]);
      
    }

    /**
     * Activate the user from the link sent by email
     */
    public function activate()
    {
        if(!empty($_GET['id'])
            && !empty($_GET['key']) 
            && !empty($_GET['activationId']))
        {
            $id = trim(htmlentities($_GET['id']));
            $key = trim(htmlentities($_GET['key']));
            $activationId = trim(htmlentities($_GET['activationId']));

            if(is_numeric($id) && is_numeric($activationId))
            {
                $user = User::getById($id);  
                $nbActivationsRq = $user->getNbActivationsRq();
                if($activationId == $user->getActivationId() && $nbActivationsRq < 15)
                {            
                    $email = $user->getEmail();

                    if(hash('sha256', $email)  == $key)
                    {
                        $user->setActivated(true);
                        $nbActivationsRq++;
                        $user->setNbActivationsRq($nbActivationsRq);

                        $user->edit();
                        $message = 'Votre compte a été activé, vous pouvez vous connecter';
                        $this->renderView("user/login_view", [
                            "user" => $user,
                            "message" => $message]
                        );
                    }
                    else
                    {
                        $message = 'Lien invalide ou expiré, demandez un nouveau lien';  


                        $this->renderView("user/login_view",
                            [
                                "message" => $message,
                                "requestNewLink" => true,                            
                                "id" => $user->getId()
                            ]);
                    }                    
                }  
                else if($activationId == $user->getActivationId() && $nbActivationsRq >= 12)
                {
                        $message = 'Vous avez dépassé le nombre de validations autorisées. Veuillez remplir le formaulaire de contact <a href="index.php?class=contact&action=send">cliquez-ici</a>';             
                }        
            }
            else
            {
                $message = 'Lien invalide ! Seul le lien reçu par email doit être utilisé !'; 
            }
            

            $this->renderView("user/login_view",
                    ["message" => $message]);
        }// !empty($_GET)
    }



    /**
     * Send a new link for connexion
     * 
     */
    public function sendLink()
    {
            if(!empty($_GET['id']) && is_numeric($_GET['id']))
            {
                    $id = $_GET['id'];  
                    $user = User::getById($id);
                    $nbActivationsRq = $user->getNbActivationsRq();
                    
                    if($nbActivationsRq < 12)
                    {
                        $user->setActivationId(Tools::randomizeId());
                        $nbActivationsRq++;
                        $user->setNbActivationsRq($nbActivationsRq);
                        $user->edit();
                        $user->sendActivationLink();
                        
                        $message = 'Nouveau lien d\'activation envoyé, vérifiez votre adresse email : '.$user->getEmail().'';

                        $this->renderView('user/login_view', 
                                ['message' => $message]
                        );
                    }
                    else
                    {
                        $message = 'Vous avez dépassé le nombre maximal de demande d\'activation, contactez l\'administrateur du site';

                        $this->renderView('contact_view', 
                                [
                                    'message' => $message,
                                    'id' => $id
                                ]
                        );
                    }
            } // if(!empty($_GET['id']) && is_numeric($_GET['id']))
    }


    /**
     * Log in the user
     * 
     */
    public function login(): void
    {
        $message = null;
        if(!empty($_POST['idLogin']) && isset($_POST["password"]))
        {
            if(User::getByEmail(htmlentities($_POST['idLogin'])))
                $user = User::getByEmail(htmlentities($_POST['idLogin']));
            else if(User::getByAka(htmlentities($_POST['idLogin'])))
                $user = User::getByAka(htmlentities($_POST['idLogin']));            
            else 
            {          
                $this->renderView('login_view', [
                    "message" => "identifiant ou mot de passe incorrect"
                ]);
            }
           
            if(isset($user))
            {
                if ($user instanceof User)
                {
                    if(password_verify(htmlentities($_POST['password']), $user->getPassword()))
                    {
                        $session = new Session();
                        $session->login($user);
                        $this->renderView(''.$user->getRole().'/dashboard_view', [
                            "user" => $user,
                            "persons" => Person::listByUser($user->getId())
                        ]);     
                    }
                    else
                    {
                        $message = "Mot de passe incorrect";
                    }
                }else{
                    $message = "Email inconnu";
                }
            }
        }
        else if(!empty($_SESSION["user"]) && $_SESSION["user"]["logged"] === true)
        {
            $user = User::getById($_SESSION["user"]["id"]);
            if($user instanceof User)
            {
                $this->renderView(''.$user->getRole().'/dashboard_view', [
                    "user" => $user,
                    "persons" => Person::listByUser($user->getId())
                ]);   
            }
            else
                (new DefaultController())->index(); // REDIRECTION BECAUSE SOMETHING GET WRONG ! 
        }
        else
        {
            $this->renderView('login_view');
        }
    }



    public function logout()
    {
        $session = new Session();
        $session->logout();

        /* $this->redirectTo("index.php"); */
        (new DefaultController())->index();
    }




    /**
     * Show the selected user by renderView
     * 
     * @return bool
     */
    public function show(): bool
    {
        if(!empty($_SESSION['user']['id']))
        {
            $idUser = $_SESSION['user']['id'];
            if(User::getById($idUser) instanceof User)
            {
                $session = new Session();
                $this->renderView(''.$_SESSION['user']['role'].'/user_view');
          
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
            $this->renderView("login_view", [
                "message" => "Veuillez vous connecter avec votre compte personnel"
            ]);
        return false;
        }

    }

    public function testSession()
    {
        $this->renderView('test_session_view');
    }





    public function edit()
    {
        if(!empty($_SESSION['user']) 
            && !empty($_POST['currentPassword']))
        {
            $id = $_SESSION['user']['id'];
            $user = User::getById($id);
          
            $currentPassword = trim(htmlentities($_POST['currentPassword']));
            $hash = $user->getPassword();

            if(password_verify($currentPassword, $hash))
            {
                $user->setEmail(trim(strtolower($_POST['email'])));
                $user->setAka(trim(htmlentities($_POST['aka'])));           
                $user->setName(trim(htmlentities($_POST["name"])));
                $user->setFirstname(trim(htmlentities($_POST["firstname"])));
                $user->setAddress(trim(htmlentities($_POST["address"])));
                $user->setPostcode(trim(htmlentities($_POST["postcode"])));
                $user->setCity(trim(htmlentities($_POST["city"])));                            
                $user->setImage(Tools::putImage('avatar', 'user', $id));
                $user->setLastLogin(date('Y-m-d')); 
                $user->edit();

                $this->renderView('user/edit_user_view',
                    [
                        'id' => $_SESSION['user']['id'],
                        'email' => $_SESSION['user']['email'],
                        'aka' => $_SESSION['user']['aka'],
                        'name' => $_SESSION['user']['name'],
                        'firstname' => $_SESSION['user']['firstname'],
                        'address' => $_SESSION['user']['address'],
                        'postcode' => $_SESSION['user']['postcode'],
                        'city' => $_SESSION['user']['city'],
                        'image' => $_SESSION['user']['image']
                    ]        
                );
            }           
            
        }     
        else if(!empty($_SESSION['user']))
        {
            $id = $_SESSION['user']['id'];
            $user = User::getById($id);
            $this->renderView(''.$_SESSION['user']['role'].'/edit_user_view', [
                'user' => $user
            ]);
        }   
        else
        {
            $this->renderView('login_view');
        }
    }


    public function editEmail()
    {
        if(!empty($_SESSION['user']) 
            && !empty($_POST['password'])
            && !empty($_POST['email'])
            && !empty($_POST['newEmail'])
            && !empty($_POST['newEmail2'])
        )
        {
            $id = $_SESSION['user']['id'];
            if(User::getById($id) instanceof User)
            {
                $user = User::getById($id);
            
                $password = trim(htmlentities($_POST['password']));
                $hash = $user->getPassword();
                $email = trim(htmlentities($_POST['email']));
                $newEmail = trim(htmlentities($_POST['newEmail']));
                $newEmail2 = trim(htmlentities($_POST['newEmail2']));


                if(password_verify($password, $hash)
                    && $newEmail == $newEmail2
                    && User::getByEmail($email) instanceof User
                )
                {
                    $user->setEmail($newEmail); 
                    $user->edit();

                    $_SESSION['user']['email'] = $user->getEmail();

                    $this->renderView(''.$_SESSION['user']['role'].'/user_view');
                    /*
                        [
                            'id' => $_SESSION['user']['id'],
                            'email' => $_SESSION['user']['email'],
                            'aka' => $_SESSION['user']['aka'],
                            'name' => $_SESSION['user']['name'],
                            'firstname' => $_SESSION['user']['firstname'],
                            'address' => $_SESSION['user']['address'],
                            'postcode' => $_SESSION['user']['postcode'],
                            'city' => $_SESSION['user']['city'],
                            'image' => $_SESSION['user']['image']
                        ]        
                        */
                }    
            }//       
            
        }     
        else if(!empty($_SESSION['user']))
        {
            $id = $_SESSION['user']['id'];
            $user = User::getById($id);
            $this->renderView('edit_email_view', [
                'user' => $user
            ]);
        }   
        else
        {
            $this->redirectTo('index.php?class=user&action=login#title');
        }
    }






  


}