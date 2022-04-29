<?php

class Subscriber extends User
{
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
    
    public function getSITENAME()
    {
        $this->parent::SITENAME;
    }

    public function setSITENAME()
    {
        echo parent::SITENAME.'Subscriber';
    }



}