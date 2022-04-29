
<?php

require_once "utilities/Tools.php";
spl_autoload_register("Tools::MyAutoloader");

//$transport = (new Swift_SmtpTransport('buzzyouf.com', 465));
//$mailer = new Swift_Mailer($transport);

// monsite.fr/index.php?class=uSer&action=detailsUser2 MODELE DE LA FONCTION RENDERVIEW

if(!empty($_GET["class"]) && !empty($_GET["action"]))
{
    //deFaUAlt, default, will give Default
    //DefaultController
    $class = ucfirst(strtolower(Tools::removeSpecialChars($_GET["class"])))."Controller" ; // more strong than htmlentities or htmlspecialchars
    $methode = Tools::removeSpecialChars($_GET["action"]);                                 // keeping only letters, numbers, and _0
    //$controller->detailsuser();

    if(method_exists($class, $methode))  // method_exists() faster than is_callable()
    {
        $controller = new $class();     
        $controller->$methode();
    } else {
        (new DefaultController())->index();
    }

}else
{
    (new DefaultController())->index();

}

