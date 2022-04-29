<?php
    class Admin extends Utilisateur{
        protected $ban;
        
        public function setBan($b){
            $this->ban[] .= $b;
        }
        public function getBan(){
            echo 'Utilisateurs bannis par '.$this->user_name. ' : ';
            foreach($this->ban as $valeur){
                echo $valeur .', ';
            }
        }
    }
?>


<?php



class Admin extends User 
{
    protected static $banList;
    //public const SITENAME = "metaCreaCoAdmin";

    public function __construct($id, $email, $createdAt, $name, $firstname, $password, $role, $activated)
	{
		$this->id=$id;
		$this->email=$email;
		$this->createdAt=$createdAt;
		$this->name=$name;
		$this->firstname=$firstname;
		$this->password=$password;
		$this->role=$role;
		$this->activated=$activated;
	}



    public function getName()
    {
        parent::getName();
        echo 'Depuis la classe parente<br>';
    }

/***************** METHODE SANS STATIC ********************/
    /**
     * Set the value of banList
     *
     * @ return  self
     */ 
/*    public function setBanList($idUser)
    {
        $this->banList[] .= $idUser;
        //return $this;
    }

    /**
     * Get the value of banList
     */ 
/*    public function getBanList()
    {
        foreach($this->banList as $idUser)
        {
            echo $idUser.' | ';
        }
        return $this->banList;
    }
***************************************************************/

    public function setBanList(...$b)
    {
        foreach($b as $banned)
        {
            self::$banList[] .= $banned;
        }           
    }

    public function getBanList()  // AVEC METHODE STATIC
    {
        foreach(self::$banList as $banned)
        {
            echo $this->name.' a banni =>'.$banned.' | ';
        }
     }


    public function showSiteName()
    {
        echo parent::SITENAME;
    }

    public function showSiteNameAdmin()
    {
        echo parent::SITENAME.'admin';
    }


}



