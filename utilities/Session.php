<?php

class Session
{
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    /**
     * @param User $user
     * @return void
     */
    public function login(User $user) : void
    {
        $user->setLastLogin(date('Y m d'));
        $user->edit();
       
        $_SESSION["user"] = [
            "id" => $user->getId(),
            "email" => $user->getEmail(),
            "aka" => $user->getAka(),
            "logged" => true,
            "name" => $user->getName(),
            "firstname" => $user->getFirstname(),
            "address" => $user->getAddress(),
            "postcode" => $user->getPostcode(),
            "city" => $user->getCity(),
            "image" => $user->getImage(),
            "createdAt" => $user->getCreatedAt(),            
            "role" => $user->getRole(),            
            "activated" => $user->getActivated(),
            "points" => $user->getPoints(),
            'lastLogin' => $user->getLastLogin()            
        ];
        
    }

    /**
     * @return void
     */
    public function logout() : void
    {
        if(isset($_SESSION["user"])){
            unset($_SESSION["user"]);
        }
    }

    /**
     * @return bool
     */
    public function isLogged() : bool
    {
        if(isset($_SESSION["user"]) && !is_null($_SESSION["user"])){
            if ($_SESSION['user']["logged"]){
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isAdmin() : bool
    {
        if(isset($_SESSION["user"]) && !is_null($_SESSION["user"])){
            if ($_SESSION['user']["logged"] && $_SESSION['user']["role"]=="admin"){
                return true;
            }
        }
        return false;
    }


    /**
     * @param int $id_product
     * @return void
     */
    public function addWishlist(int $id_product) :void
    {
        if(!isset($_SESSION["favoris"]))
        {
            $_SESSION["favoris"] = [];
        }

        if(!array_search($id_product ,$_SESSION["favoris"] )){
            array_push($_SESSION["favoris"], $id_product);
        }

    }


    public function removeFromWishlist(int $id_product)
    {
        $key = array_search($id_product ,$_SESSION["favoris"] );
        array_splice($_SESSION["favoris"] , $key, 1);

    }
    public function addToCart(int $id_product, int $quantity)
    {
        if(!isset($_SESSION["cart"]))
        {
            $_SESSION["cart"] = [];
        }
        $_SESSION["cart"][$id_product] = $quantity;

    }

    public function removeFromCart()
    {

    }

    public function editQuantityCart()
    {

    }

    /**
     * get the value of id in $_SESSION['user']
     */
    public function getId()
    {
        return $_SESSION['user']['id'];
    }

    /**
     * get the value of email in $_SESSION['user'] 
     */
    public function getEmail()
    {
        return $_SESSION['user']['email'];
    }

    /**
     * get the value of Aka in $_SESSION['user'] 
     */
    public function getAka()
    {
        return $_SESSION['user']['aka'];
    }

    /**
     * get the value of logged in $_SESSION['user']
     */
    public function getLogged()
    {
        return $_SESSION['user']['logged'];
    }

    /**
     * get the value of Name in $_SESSION['user'] 
     */
    public function getName()
    {
        return $_SESSION['user']['name'];
    }
    
    /**
     * get the value of firstname in $_SESSION['user']
     */
    public function getFirstname()
    {
        return $_SESSION['user']['firstname'];
    }

    /**
     * get the value of address in $_SESSION['user']
     */
    public function getAddress()
    {
        return $_SESSION['user']['address'];
    }

    /**
     * get the value of postcode in $_SESSION['user']
     */
    public function getPostcode()
    {
        return $_SESSION['user']['postcode'];
    }

    /**
     * get the value of image in $_SESSION['user']
     */
    public function getImage()
    {
        return $_SESSION['user']['image'];
    }

    /**
     * get the value of createdAt in $_SESSION['user']
     */
    public function getCreatedAt()
    {
        return $_SESSION['user']['createdAt'];
    }
    
    /**
     * get the value of role in $_SESSION['user']
     */
    public function getRole()
    {
        return $_SESSION['user']['role'];
    }

    /**
     * get the value of activated in $_SESSION['user']
     */
    public function getActivated()
    {
        return $_SESSION['user']['activated'];
    }

    /**
     * get the value of points in $_SESSION['user']
     */
    public function getPoints()
    {
        return $_SESSION['user']['points'];
    }

    /**
     * get the value of lastLogin in $_SESSION['user']
     */
    public function getLastLogin()
    {
        return $_SESSION['user']['lastLogin'];
    }

}