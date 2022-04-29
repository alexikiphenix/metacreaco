<?php

class JnctPersonContribution{
    // ! for safety reasons I avoid camelCase for SQL and HTML, I use it only for PHP and JavaScript
    private $id;
    private $personId;    
    private $contributionId;
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }


    

    /**
     * Get the value of personId
     */ 
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * Set the value of personId
     *
     * @return  self
     */ 
    public function setPersonId($personId)
    {
        $this->personId = $personId;
        return $this;
    }

    /**
     * Get the value of contributionId
     */ 
    public function getContributionId()
    {
        return $this->contributionId;
    }

    /**
     * Set the value of contributionId
     *
     * @return  self
     */ 
    public function setContributionId($contributionId)
    {
        $this->contributionId = $contributionId;

        return $this;
    }

    public static function list() : array
    {
        $db= new Database();
        $result = $db->selectMany("JnctPersonContribution", "SELECT * FROM jnct_person_contribution");
        return $result;
    }


    public static function listByIdPerson($personId) : array
    {
        $db= new Database();
        $result = $db->selectMany("JnctPersonContribution", "SELECT * FROM jnct_person_contribution WHERE personId = $personId");
        return $result;        
    }

    /** Check if a contrib belongs to an array (list of contributions)
     * 
     * @return bool
     */
    public static function checkContrib($id_contrib, $list) : bool
    {
        if(isset($id_contrib) && isset($list))
        {
            $list_tmp = [];
            foreach($list as $key)
            {
                $list_tmp[] += $key->getContributionId();
            }
            $list = $list_tmp;
            if(in_array($id_contrib, $list))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
      
    }



    /**
     * Insert for 1 person 1 contibution (sent by parameters)
     * 
     * @return bool
     */
    public function add() : bool
    {
        $db = new Database();                
            //$values = htmlentities($values);
            $result = $db->insert(
                "INSERT INTO jnct_person_contribution (`personId`, `contributionId`) VALUES (?,?)",
                [$this->personId, $this->contributionId]
            );            
    return $result;       
    }    


    /** Check if a person HAS this contrib in DB.
    * @param int $personId, @param int $id_contrib
    * @return bool
    */
    public static function hasContrib($personId, $id_contrib) : bool
    {
        if(isset($personId) && isset($id_contrib))
        {
            $db= new Database();
            $result = $db->selectOne("JnctPersonContribution", "SELECT * FROM jnct_person_contribution WHERE personId =$personId AND contributionId =$id_contrib");
            if($result)
            return true;
            else
            return false;
        }
        else
        {
            return false;
        }      
    }


    /**
    * Delete a contribution in the table contribution
    * @param int $idContribution
    * @return bool
    */
    public static function delete(int $idContribution)
    {
        $db = new Database();
        $result = $db->delete('DELETE FROM jnct_person_contribution WHERE contributionId = ?', [$idContribution]); 
        return $result;
    }

    
    /**
    * Get id of JnctPersonContribution person by contributionId
    * @param int $contribId
    * @return int
    */
    /*
    public static function delById($idContrib): ?Contribution
    {
            $db= new Database();
            $result = $db->selectOne("Contribution", "SELECT * FROM contribution WHERE id=?", [$idContrib]);   
            if ($result == false)
            return null;
        return $result;
    }
    */

    /**
     * @return bool
     */
    public function editContrib($list_to_edit, $list_all_contrib)
    {
        foreach($list_to_edit as $key =>$value)
        {
            if(checkContrib($value, $list_all_contrib))
            {
                    
            }
        }
    }


}

?>