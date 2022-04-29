<?php

class User 
{
	protected $id;
	protected $email;
	protected $aka;
	protected $password;	
	protected $name;
	protected $firstname;
	protected $address;
	protected $postcode;
	protected $city;
	protected $image;
	protected $createdAt;	
	protected $role;
	protected $activated;
	protected $points;
	protected $lastLogin;
	protected $activationId;
	protected $nbActivationsRq;
	

	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the value of email
	 */ 
	public function getEmail()
	{
		return $this->email; 
	}

	/**
	 * Set the value of email
	 *
	 * @return  self
	 */ 
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	/**
	* Get the value of aka
	*/ 
	public function getAka()
	{
		return $this->aka;
	}

	/**
	 * Set the value of aka
	 *
	 * @return  self
	 */ 
	public function setAka($aka)
	{
		$this->aka = $aka;

		return $this;
	}


	/**
	* Get the value of password
	*/ 
	public function getPassword()
	{
		return $this->password;
	}

	/**
    * @param string $password
    */
    public function setPassword(string $password): void
    {
        /**
         * hashing password using BCRYPT algorythm
         */
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

	
	/**
	 * Get the value of name
	 */ 
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @return  self
	 */ 
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	
	
	


	/**
	* Get the value of firstname
	*/ 
	public function getFirstname()
	{
		return $this->firstname;
	}

	/**
	* Set the value of firstname
	*
	* @return  self
	*/ 
	public function setFirstname($firstname)
	{
		$this->firstname = $firstname;

		return $this;
	}

	/**
	 * Get the value of address
	 */ 
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * Set the value of address
	 *
	 * @return  self
	 */ 
	public function setAddress($address)
	{
		$this->address = $address;

		return $this;
	}


		/**
	 * Get the value of postcode
	 */ 
	public function getPostcode()
	{
		return $this->postcode;
	}

	/**
	 * Set the value of postcode
	 *
	 * @return  self
	 */ 
	public function setPostcode($postcode)
	{
		$this->postcode = $postcode;

		return $this;
	}

	
	/**
	 * Get the value of city
	*/ 
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * Set the value of city
	 *
	 * @return  self
	 */ 
	public function setCity($city)
	{
		$this->city = $city;

		return $this;
	}
	

	/**
	 * Get the value of image
	 */ 
	public function getImage()
	{
		return $this->image;
	}

	/**
	 * Set the value of image
	 *
	 * @return  self
	 */ 
	public function setImage($image)
	{
		$this->image = $image;

		return $this;
	}


	/**
	 * Get the value of createdAt
	 */ 
	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	/**
	 * Set the value of createdAt
	 *
	 * @return  self
	 */ 
	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}





	/**
	* Get the value of role
	*/ 
	public function getRole()
	{
		return $this->role;
	}

	/**
	* Set the value of role
	*
	* @return  self
	*/ 
	public function setRole($role)
	{
		$this->role = $role;
		return $this;
	}

	/**
	* Get the value of activated
	*/ 
	public function getActivated()
	{
		return $this->activated;
	}

	/**
	* Set the value of activated
	*
	* @return  self
	*/ 
	public function setActivated($activated)
	{
		$this->activated = $activated;
		return $this;
	}

	
	/**
	* Get the value of lastLogin
	*/ 
	public function getLastLogin()
	{
		return $this->lastLogin;
	}

	/**
	* Set the value of lastLogin
	*
	* @return  self
	*/ 
	public function setLastLogin($lastLogin)
	{
		$this->lastLogin = $lastLogin;

		return $this;
	}


	/**
	* Get the value of points
	*/ 
	public function getPoints()
	{
		return $this->points;
	}

	/**
	* Set the value of points
	*
	* @return  self
	*/ 
	public function setPoints($points)
	{
		$this->points = $points;

		return $this;
	}


	/**
	* Get the value of activationId
	*/ 
	public function getActivationId()
	{
		return $this->activationId;
	}

	/**
	 * Set the value of activationId
	 *
	 * @return  self
	 */ 
	public function setActivationId($activationId)
	{
		$this->activationId = $activationId;

		return $this;
	}


	/**
	* Get the value of nbActivationsRq
	*/ 
	public function getNbActivationsRq()
	{
		return $this->nbActivationsRq;
	}


	/**
	 * Set the value of nbActivationsRq
	 *
	 * @return  self
	 */ 
	public function setNbActivationsRq($nbActivationsRq)
	{
		$this->nbActivationsRq = $nbActivationsRq;
		return $this;
	}


	 /**
     * Store one user in the database
     *
     * @return bool
     */
    public function add() : int
    {
        $db = new Database();
        $result =  $db->insert(
            "INSERT INTO user (`email`, `aka`, `password`, `name`, `firstname`, `address`, `postcode`, `city`, `image`, `role`, `lastLogin`, `activationId`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)",
            [$this->email, $this->aka, $this->password, $this->name, $this->firstname, $this->address, $this->postcode, $this->city, $this->image, $this->role, $this->lastLogin, $this->activationId]
        );
        if(!$result)
        {
            return 0;
        }
        return $db->getLastId();
    }


	/**
     * Get one user by id
     *
     * @param int $id
     * @return User|null
     */
    public static function getById(int $id): ?User
    {
        $db = new Database();
        $result = $db->selectOne(
            "User",
            "SELECT * FROM user WHERE id  = ?",
            [$id]
        );
        if ($result == false)
            return null;
        return $result;
	}
	

	 /**
     * Get one user by email
     *
     * @param string $email
     * @return User|null
     */
    public static function getByEmail(string $email): ?User
    {
        $db = new Database();
        $result = $db->selectOne(
            "User",
            "SELECT * FROM user WHERE email LIKE ?",
            [$email]
        );
        if ($result == false)
            return null;
        return $result;
    }

	
	/**
     * Get one user by aka
     *
     * @param string $aka
     * @return User|null
     */
    public static function getByAka(string $aka): ?User
    {
        $db = new Database();
        $result = $db->selectOne(
            "User",
            "SELECT * FROM user WHERE aka LIKE ?",
            [$aka]
        );
        if ($result == false)
            return null;
        return $result;
    }



	/**
     * Get all users in the database
     * @return array
     */
    public static function getAll(): array
    {
        $db = new Database();
        return $db->selectMany(
            "User",
            "SELECT * FROM user"
        );
	}
	
	
    /**
     * Modify one user
     *
     * @return bool
     */
    public function edit(): bool
    {
        $db = new Database();
        return $db->edit(
           	"UPDATE `user` SET `email` = ?, `aka` = ?, `password` = ?, `name` = ?, `firstname` = ?, `address` = ?, `postcode` = ?, `city` = ?, `image` = ?, `role` = ?, `activated` = ?, `lastLogin` = ?, `activationId` = ?, `nbActivationsRq` = ? WHERE `id` = ?",
            [$this->email, $this->aka, $this->password, $this->name, $this->firstname, $this->address, $this->postcode, $this->city, $this->image, $this->role, $this->activated, $this->lastLogin, $this->activationId, $this->nbActivationsRq, $this->id]
        );
    }

	
    /**
     * Suppress one user
     *
     * @param int $id_user
     * @return bool
     */
    public static function delete(int $id_user) : bool
    {
        $db = new Database();
        return $db->delete(
            "DELETE FROM `user` WHERE id = ?",
            [$id_user]
        );
    }

	/*
		<a href="http://www.metacreaco.com/index.php?class=user&action=activate&id='.$activationId.'">
                                 ACTIVER MON COMPTE METACREACO</a><br>
								A très vite';

	*/

	/***
	 * Send activation link
	 *  
	 */
	public function sendActivationLink()
	{		
		$idUser = $this->id;
		$activationId = $this->activationId;
		$subject = 'Valider votre compte MetaCreaCo';
		$recipient = $this->email;
		
		$emailContent = '<html><body>
								Bonjour '.$this->aka.',
								<p>
										Veuillez cliquer sur le lien ci-dessous pour activer votre compte :
								</p>
								<p>
										<a href="http://www.metacreaco.com/index.php?class=user&action=activate&id='.$idUser.'&key='.hash('sha256', $recipient).'&activationId='.$activationId.'">
										ACTIVER MON COMPTE METACREACO</a>
								</p>
								<p>
										<a href="https://127.0.0.1/alx/metacreaco/index.php?class=user&action=activate&id='.$idUser.'&key='.hash('sha256', $recipient).'&activationId='.$activationId.'">
										ACTIVER MON COMPTE METACREACO</a>
								</p>
								<p>
										 A très vite
								</p>
								<p>
										&#169; MetaCreaCo '.date('Y').'
								</p>
						</body></html>';								
                                
		
		Tools::sendEmail($recipient, $subject, $emailContent);
		//Tools::sendEmail('alex.ikialon@gmail.com', 'Lien de validation 777 45 777 2');

	}
  



}

