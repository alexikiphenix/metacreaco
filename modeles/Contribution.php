<?php

class Contribution
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
    * Get a person by id
    * @param int $idContrib
    * @return ?Contribution
    */
    public static function getById($idContrib): ?Contribution
    {
            $db= new Database();
            $result = $db->selectOne("Contribution", "SELECT * FROM contribution WHERE id=?", [$idContrib]);   
            if ($result == false)
            return null;
        return $result;
    }


/* 
    public static function getById($id_contrib) : Contribution
    {
        $db= new Database();
        $result = $db->selectOne("Contribution", "SELECT * FROM contribution WHERE id=?", [$id_contrib]);
        return $result;
    }
*/

    /**
     * Add a contribution
     */
    public function add() : bool
    {
        $db = new Database();
        $result = $db->insert(
            "INSERT INTO contribution (`name`, `description`, `points`) VALUES (?,?,?)",
            [$this->name, $this->description, $this->points]
        );

        return $result;
    }



    /**
     * Return the list of contributions
     * @return array
     */    
    public static function list() : array
    {
        $db= new Database();
        $result = $db->selectMany("Contribution", "SELECT * FROM `contribution` ORDER BY `points` DESC");
        return $result;
    }


     /**
     * Modify a contribution
     *
     * @return bool
     */
    public function edit() : bool
    {
        $db= new Database();
        return $db->edit(
            "UPDATE `contribution` SET `name` = ?, `description` = ?, `points` = ? WHERE `id` = ?",
            [$this->name, $this->description, $this->points, $this->id]
        );
    }

    /***
    * Delete a contribution in the table contribution
    * @param int $idContribution
    * @return bool
    */
    public static function delete(int $idContribution)
    {        
        $db = new Database();
        $result = $db->delete('DELETE FROM contribution WHERE id = ?', [$idContribution]);                   
        return $result;
    }


     /**
     * return the number of persons created by 1 user
     * 
     * @return int
     */
    public static function count(): int
    {        
        //$person = Person::listAll();
        $db = new Database();        
        $total = $db->countEntities("Contribution", "SELECT COUNT(id) AS total FROM `contribution`");
        return $total->total;
    }


   

   
}

?>