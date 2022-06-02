<?php


class AdminController extends AbstractController{

    public function index()
    {
        /*
        $this->renderView("admin/dashboard_view", [
            "contributions" => Contribution::list(),
            "risks" => Risk::list(),
            "persons" => Person::listWithLimit(0, 20)
        ]);*/

        
        if(!empty($_SESSION['user']) && $session->isLogged())
        {
            $id = $_SESSION['user']['id'];
            if(User::getById($id) instanceof User)
            {
                $this->renderView("admin/dashboard_view", [
                    "user" => User::getById($id),
                    "persons" => Person::listWithLimit(0, 20)
                ]);
            }
        }
        else
            (new DefaultController())->index();
    }

    public function logout()
    {
        $session = new Session();
        $session->logout();

        /*$this->redirectTo("index.php");*/
        (new DefaultController())->index();
    }


    public function login()
    {
        $message = null;
        if(isset($_POST['email']) && isset($_POST["password"]))
        {
            $user = User::getByEmail(htmlentities($_POST['mail']));
            if ($user instanceof User)
            {
                if(password_verify(htmlentities($_POST['password']), $user->getPassword())){
                    $session = new Session();
                    $session->login($user);

                    $this->redirectTo("index.php?class=user&action=index");
                }else{
                    $message = "Mot de passe incorrect";
                }
            }else{
                $message = "Email inconnu";
            }
        }

        $this->renderView('user/login', [
            "message" => $message
        ]);
    }

  

}