<?php

class JnctPersonRisk{
    private $id;
    private $personId;    
    private $riskId;
    

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
     * Get the value of riskId
     */ 
    public function getRiskId()
    {
        return $this->riskId;
    }

    /**
     * Set the value of riskId
     *
     * @return  self
     */ 
    public function setRiskId($riskId)
    {
        $this->riskId = $riskId;

        return $this;
    }

    public static function list() : array
    {
        $db= new Database();
        $result = $db->selectMany("JnctPersonRisk", "SELECT * FROM jnct_person_risk");
        return $result;
    }


    public static function listByIdPerson($id_person) : array
    {
        $db= new Database();
        $result = $db->selectMany("JnctPersonRisk", "SELECT * FROM jnct_person_risk WHERE personId =$id_person");
        return $result;
    }

    
    /** Check if a risk belongs to an array (list of Risks)
     * 
     * @return bool
     */
    public static function checkRisk($idRisk, $list) : bool
    {
        if(isset($idRisk) && isset($list))
        {
            $list_tmp = [];
            foreach($list as $key)
            {
                $list_tmp[] += $key->getRiskId();
            }
            $list = $list_tmp;
            if(in_array($idRisk, $list))
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
     * Insert for 1 person 1 risk (sent by parameters)
     * 
     * @param int $id_person
     * @return bool
     */
    public static function putOneRisk($id_person, $idRisk) : bool
    {
        if(isset($id_person) && isset($idRisk))
        {
            $db = new Database();
                
                    //$values = htmlentities($values);
                    $result = $db->insert(
                        "INSERT INTO jnct_person_risk (`personId`, `riskId`) VALUES (?,?)",
                        [$id_person, $idRisk]
                    );
            
            return $result;
        }
    } 



    /** Check if a a person HAS this risk in DB
     * 
     * @return bool
     */
    public static function hasRisk($id_person, $idRisk) : bool
    {
        if(isset($id_person) && isset($idRisk))
        {
            $db= new Database();
            $result = $db->selectOne("JnctPersonRisk", "SELECT * FROM jnct_person_risk WHERE personId =$id_person AND riskId =$idRisk");
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

    


}

?>