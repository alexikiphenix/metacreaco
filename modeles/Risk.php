<?php

class Risk
{
    private $id;
    private $name;
    private $description;
    private $points;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    
    public static function getById($idRisk) : Risk
    {
        $db= new Database();
        $result = $db->selectOne("Risk", "SELECT * FROM risk WHERE id=?", [$idRisk]);
        return $result;
    }


    /**
     * Return the list of Risk
     */    
    public static function list() : array
    {
        $db= new Database();
        $result = $db->selectMany("Risk", "SELECT * FROM risk");
        return $result;
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
     * Modify a risk
     *
     * @return bool
     */
    public function edit() : bool
    {
        $db= new Database();
        return $db->edit(
            "UPDATE `risk` SET `name` = ?, `description` = ?, `points` = ? WHERE `id` = ?",
            [$this->name, $this->description, $this->points, $this->id]
        );
    }

     /***
     * Delete a risk in the table contribution
     * @param int $idRisk
     * @return bool
     */
    public static function delete(int $idRisk)
    {
        $db = new Database();
            $result = $db->delete('DELETE FROM contribution WHERE id = ?', [$idRisk]); 
            if($result)
            {
                $result = $db->delete('DELETE FROM jnct_person_risk WHERE id = ?', [$idRisk]); 
            }            
            return $result;
    }
   



}

?>