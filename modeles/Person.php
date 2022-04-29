<?php

class Person{
    private $id;
    private $name;
    private $firstname;
    private $aka;
    private $gender;
    private $birth;
    private $profession;    
    private $votes;
    private $points;
    private $description;
    private $death;
    private $rank;
    private $bestRank;
    private $createdAt;
    private $editedAt;
    private $activated; // par défaut false; seuls admin et user spécifique peuvent activer.
    private $duplicates; // count the number of times a person is reported as having 1 or several duplicates in the list
    private $claims; // count the number of claims
    private $link;  
    private $image;
    private $nationality;
    private $userId;



   /**
     * Get the value of id
     * 
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of image
     * 
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
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }


    /**
     * Get the value of birth
     */ 
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set the value of birth
     *
     * @return  self
     */ 
    public function setBirth($birth)
    {
        $this->birth = $birth;

        return $this;
    }


    /**
     * Get the value of profession
     */ 
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set the value of profession
     *
     * @return  self
     */ 
    public function setProfession($profession)
    {
        $this->profession = $profession;

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
     * Get the value of votes
     */ 
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Set the value of votes
     *
     * @return  self
     */ 
    public function setVotes($votes)
    {
        $this->votes = $votes;

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
     * Get the value of death
     */ 
    public function getDeath()
    {
        return $this->death;
    }

    /**
     * Set the value of death
     *
     * @return  self
     */ 
    public function setDeath($death)
    {
        $this->death = $death;

        return $this;
    }

     /**
     * Get the value of rank
     */ 
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set the value of rank
     *
     * @return  self
     */ 
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

     /**
     * Get the value of bestRank
     */ 
    public function getBestRank()
    {
        return $this->bestRank;
    }

    /**
     * Set the value of bestRank
     *
     * @return  self
     */ 
    public function setBestRank($bestRank)
    {
        $this->bestRank = $bestRank;

        return $this;
    }


    /**
     * Get the value of editedAt
     */ 
    public function getEditedAt()
    {
        return $this->editedAt;
    }

    /**
     * Set the value of editedAt
     *
     * @return  self
     */ 
    public function setEditedAt($editedAt)
    {
        $this->editedAt = $editedAt;

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
     * Get the value of duplicates
     */ 
    public function getDuplicates()
    {
        return $this->duplicates;
    }

    /**
     * Set the value of duplicates
     *
     * @return  self
     */ 
    public function setDuplicates($duplicates)
    {
        $this->duplicates = $duplicates;

        return $this;
    }

    /**
     * Get the value of claims
     */ 
    public function getClaims()
    {
        return $this->claims;
    }

    /**
     * Set the value of claims
     *
     * @return  self
     */ 
    public function setClaims($claims)
    {
        $this->claims = $claims;

        return $this;
    }

    /**
     * Get the value of link
     */ 
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */ 
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * Get the value of nationality
     */ 
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set the value of nationality
     *
     * @return  self
     */ 
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;        
    }


 

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * Select all persons by birth ASC
     * @return array
     */
    public static function list() : array
    {
        Person::rank();
        $db= new Database();
        $persons = $db->selectMany("Person", "SELECT * FROM person ORDER BY `points` DESC, `birth` ASC");  
       
        return $persons;
    }

     /**
     * Select all persons by birth ASC
     * @return array
     */
    public static function listDuplicates(): array
    {
        Person::rank();
        $db= new Database();
        $persons = $db->selectMany("Person", "SELECT * FROM person WHERE `duplicates` >= 1 ORDER BY `name` ASC, `birth` ASC");       

        return $persons;
    }

    /**
     * Count the amount of duplicate persons
     * @return int
     */
    public static function countDuplicates(): int
    {
        $db = new Database();
        $total = $db->countEntities("Person", "SELECT COUNT(id) AS total FROM `person` WHERE `duplicates` >= 1");
        return $total->total;
    }

    /**
     * Select a number of persons with LIMIT AND OFFSET
     * @param int $limit, @param int $offset
     * @return array
     */
    public static function listDuplicatesWithLimit($offset, $limit) : array
    {
        Person::rank();
        $db= new Database();
        $persons = $db->selectMany("Person", "SELECT * FROM person WHERE `duplicates` >= 1 ORDER BY `points` DESC, `birth` ASC LIMIT $offset, $limit");
        return $persons;
    }


    /**
     * Rank the list of persons in base
     * 
     */
    public static function rank()
    {
        $db= new Database();
        $persons = $db->selectMany("Person", "SELECT * FROM person ORDER BY `points` DESC, `birth` ASC"); 

            $rank = 1;            
            foreach($persons as $person)
            {
                if($person->getRank() != $rank)
                {
                    $db= new Database();
                    $db->edit(
                        "UPDATE `person` SET `rank` = ?, WHERE `id` = ?",
                        [$person->getRank(), $person->getId()]
                    );
                    $person->setRank($rank);
                    $person->edit();                 
                }

                if($person->getRank() < $person->getBestRank() || $person->getBestRank() == 0)
                {
                    $person->setBestRank($rank);
                    $person->edit(); 
                }
                
            $rank++;
            }        
    }


     /**
     * Select a number of persons with LIMIT AND OFFSET
     * @param int $limit, @param int $offset
     * @return array
     */
    public static function listWithLimit($offset, $limit) : array
    {
        Person::rank();
        $db= new Database();
        $persons = $db->selectMany("Person", "SELECT * FROM person ORDER BY `points` DESC, `birth` ASC LIMIT $offset, $limit");
                
        return $persons;
    }


    /**
     * Select all persons
     * @return array
     */
    public static function listAll() : array
    {
        Person::rank();
        $db= new Database();
        $result = $db->selectMany("Person", "SELECT * FROM person ORDER BY `points` DESC, `birth` ASC");
        return $result;
    }

    /**
     * List the persons created by 1 used
     * @param int $idUser
     * @return array
     */
    public static function listByUser($idUser) : array
    {
        if(!isset($id_user) || !is_int($idUser))
        {
            $db= new Database();
            $result = $db->selectMany("Person", "SELECT * FROM person WHERE userId = $idUser ORDER BY `points` DESC, `birth` ASC");
            return $result;
        }
        else
        return $result = [];
    }

    /***
     * Sort contributions 
     * 
     * @param array $personContribution
     * @return array
     */
    public static function sortContributions(array $personContribution) : array
    {
        $contribution = new Contribution();
        $contributionsListSorted = [];
        $i = 0;
        
            foreach($personContribution as  $pc) 
            {
                    $contribution=$contribution->getById($pc->getContributionId());                            
                    $contributionsListSorted[$i]['id_contribution'] = $contribution->getId();
                    $contributionsListSorted[$i]['name'] = $contribution->getName(); 
                    $contributionsListSorted[$i]['points'] = $contribution->getPoints(); 
                    $i++;
            }
            
            // Sorts the array by the value points
            $keys = array_column($contributionsListSorted, 'points');
            $result777 = array_multisort($keys, SORT_DESC, $contributionsListSorted);
            
            return $contributionsListSorted;
    }


    public static function showRisksSorted($personRisk)
    {
        $risk = new Risk();
        $risksListSorted = [];
        $i = 0;
            foreach($personRisk as  $pr) 
            {
                    $risk=$risk->getById($pr->getRiskId());
                    $risksListSorted[$i]['idRisk'] = $risk->getId();
                    $risksListSorted[$i]['name'] = $risk->getName(); 
                    $risksListSorted[$i]['points'] = $risk->getPoints(); 
                    $i++;
            }
            
            // Sorts the array by the value points
            $keys = array_column($risksListSorted, 'points');
            $result777 = array_multisort($keys, SORT_DESC, $risksListSorted);
            
            return $risksListSorted;
    }



    /**
     * List without sorting results (to use less ressources)
     * @return array
     */
    public static function listBasic() : array
    {
        $db= new Database();
        $result = $db->selectMany("Person", "SELECT `id` FROM person");
        return $result;
    }


    /**
     * add a person in the db and return last id
     * @return int
     */
    public function add() : int
    {
        $db = new Database();
        $result = $db->insert(
            "INSERT INTO person (`name`, `firstname`, `aka`, `gender`, `birth`, `profession`, `votes`, `points`, `description`, `death`, `rank`, `bestRank`, `editedAt`, `activated`, `claims`, `duplicates`, `link`, `image`, `nationality`, `userId`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
            [$this->name, $this->firstname, $this->aka, $this->gender, $this->birth, $this->profession, $this->votes, $this->points, $this->description, $this->death, $this->rank, $this->bestRank, $this->editedAt, $this->activated, $this->claims, $this->duplicates, $this->link, $this->image, $this->nationality, $this->userId]
        );

        if(!$result)
        {
            return 0;
        }
        return $db->getLastId();
    }

    /**
     * Edit a person
     * @return bool 
     */
    public function edit() : bool
    {
        $db = new Database();        
        $result =$stmt = $db->edit("UPDATE person SET `name` = ?, `firstname` = ?, `aka` = ?, `gender` = ?, `birth` = ?, `profession` = ?, `votes` = ?, `points` = ?, `description` = ?, `death` = ?, `rank` = ?, `bestRank` = ?, `editedAt` = ?, `activated` = ?,  `claims` = ?, `duplicates` = ?, `link` = ?, `image` = ?, `userId` = ? WHERE id= ?", 
        [$this->name, $this->firstname, $this->aka, $this->gender, $this->birth, $this->profession, $this->votes, $this->points, $this->description, $this->death, $this->rank, $this->bestRank, $this->editedAt, $this->activated, $this->claims, $this->duplicates, $this->link, $this->image, $this->userId, $this->id]);
        return $result;
    }

    /**
     * delete 1 person and his/her contributions / risks by using id
     * @param int $idPerson
     * @return bool
     */
    public static function delete(int $idPerson): bool
    {
        if(is_numeric($idPerson)
            && Person::getById($idPerson) instanceof Person
        )
        {
            $db = new Database();
            $result = $db->delete('DELETE FROM jnct_person_contribution WHERE personId = ?',
            [$idPerson]); 

            $db = new Database();
            $result = $db->delete('DELETE FROM jnct_person_risk WHERE personId = ?',
            [$idPerson]);   
            
            $db = new Database();       
            $result = $db->delete(
                "DELETE FROM person WHERE id= ?",
                [$idPerson]
            );
            return $result;            
        }
        else    
            return false;
    }


    /**
     * Get a person by id
     * @param int $idPerson
     * @return ?Person     * 
     * 
     */
    public static function getById($idPerson): ?Person
    {
            $db= new Database();
            $result = $db->selectOne("Person", "SELECT * FROM person WHERE id=?", [$idPerson]);    
            if ($result == false)
            return null;
        return $result;
    }


    /**
     * return "lui" or "elle" based on the gender
     * @param string $gender
     * @return string
     * 
     */
    public static function showPronoun($gender)
    {
        if(isset($gender) && is_string($gender))
        {
            if($gender == "f" || $gender == "F")
            {
                $gender = "elle"; 
                return $gender;           
            }
            else if($gender == "h" || $gender == "H")
            {
                $gender = "lui"; 
                return $gender;
            }
        }
    }


    /* banned

    public function setBan($b)
    {
                $this->ban[] .= $b;
    }

    */

    /**
     * Get contribution
     * @return bool
     */
    public function getContribution()
    {
        echo 'Utilisateurs bannis par '.$this->user_name. ' : ';
        foreach($this->contribution as $value){
            echo $value .', ';
        }
    }


    /**
     * Edit points for 1 person with 2 parameters
     * @param int $idPerson, @param int $added_points
     * @return bool
     */
    public static function editPoints($idPerson, $added_points)
    {
        $person = Person::getById($idPerson);
        $points = $person->getPoints();
        $points+=$added_points;
        $db = new Database();        
        $result =$stmt = $db->edit("UPDATE person SET `points` = ? WHERE id= ?", [$points, $idPerson]);
        return $result;
    }

    /**
     * Add 1 vote or 1 person and increase points
     * @param int $idPerson
     * @return bool
     */
    public static function addVote($idPerson)
    {
        $person = Person::getById($idPerson);
        $db = new Database();        
        $result =$stmt = $db->edit("UPDATE person SET `vote` = `vote`+1 WHERE id= ?", [$idPerson]);
    }


    /**
     * Increase the number of claims for 1 person
     * @param int $idPerson
     * @return bool
     */
    public static function addClaims($idPerson)
    {
        $person = Person::getById($idPerson);
        $db = new Database();        
        $result =$stmt = $db->edit("UPDATE person SET `claims` = `claims`+1 WHERE id= ?", [$idPerson]);
    }



    /**
     * Says how many people reported a person as 1 or several duplicates of 1 or several others persons by increasing the value duplicates
     * @param int $idPerson
     * @return bool
     */
    public static function addDuplicates($idPerson)
    {
        $person = Person::getById($idPerson);
        $db = new Database();        
        $result =$stmt = $db->edit("UPDATE person SET `duplicates` = `duplicates`+1 WHERE id= ?", [$idPerson]);
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
        $total = $db->countEntities("Person", "SELECT COUNT(id) AS total FROM `person`");
        return $total->total;
    }



     /**
     * return the number of persons created by 1 user
     * @param int $idUser
     * @return int
     */
    public static function countPersonsByUser($idUser): int
    {        
        $person = Person::listAll();
        $db = new Database();        
        $total = $db->countEntities("Person", "SELECT COUNT(id) AS total FROM person WHERE userId= ?", [$idUser]);
        return $total->total;
    }

    /**
     * return the persons created by 1 user
     * @param int $idUser
     * @return array|?
     */
    public static function listPersonsByUser($idUser): array
    {        
        $person = Person::listAll();
        $db = new Database();        
        $persons = $db->selectMany("Person", "SELECT * FROM person WHERE userId= ?", [$idUser]);
        return $persons;
    }



    public static function deleteALEX(int $id_cat) : bool
    {
        $db = new Database();

        $total = $db->selectOne("SELECT COUNT(id) AS total FROM post WHERE id_category = ?", [$id_cat]);

        if($total['total']> 0){
            Post::deleteByCategory($id_cat);
        }
        $result = $db->delete(
            "DELETE FROM category WHERE id= ?",
            [$id_cat]
        );

        return $result;
    }


    /**
    * Modificattion contributions and risks while a person is edited
    * @param int $idPerson, @param array $selectedContribs, @param array $selectedRisks
    * @return bool
    */
    public static function editContribsAndRisks($idPerson, $selectedContribs, $selectedRisks): ?bool
    {
            $db= new Database();
            $contributionsList = Contribution::list();
            $risksList = Risk::list();
            $test = false;         
            
            if($contributionsList == true
                && (!empty($selectedContribs) && is_array($selectedContribs))            
            )
            {
            $listContribs = [];

                foreach($contributionsList as $contribution)
                {
                    if(in_array($contribution->getId(), $selectedContribs)) // check if contribution has been selected ($_POST[contribution])
                    {
                        if(!JnctPersonContribution::hasContrib($idPerson, $contribution->getId()))
                        {                            
                            $newContribution = new JnctPersonContribution();
                            $newContribution->setPersonId($idPerson);
                            $newContribution->setContributionId($contribution->getId());
                            $newContribution->add();
                            //JnctPersonContribution::add($idPerson, $contribution->getId());
                            Person::editPoints($idPerson, $contribution->getPoints());
                        }
                    }
                    else
                    {
                        if(JnctPersonContribution::hasContrib($idPerson, $contribution->getId()))
                        {
                            $db->delete(
                                "DELETE FROM jnct_person_contribution WHERE personId= ? AND contributionId= ?",
                                [$idPerson, $contribution->getId()]
                            );
                            Person::editPoints($idPerson, -($contribution->getPoints()));
                        }
                    }
                    $test = true;
                }         
            }
    
            if($risksList == true
                && (!empty($selectedRisks) && is_array($selectedRisks))
            )
            {
            $listRisk = [];

                foreach($risksList as $risk)
                {
                    if(in_array($risk->getId(), $selectedRisks)) // check if risk has been selected ($_POST[risk])
                    {
                        if(!JnctPersonRisk::hasRisk($idPerson, $risk->getId()))
                        {
                            JnctPersonRisk::putOneRisk($idPerson, $risk->getId());
                            Person::editPoints($idPerson, $risk->getPoints());
                        }
                        else
                        {
                            
                        }
                    }
                    else
                    {
                        if(JnctPersonRisk::hasRisk($idPerson, $risk->getId()))
                        {
                            $db->delete(
                                "DELETE FROM jnct_person_risk WHERE personId= ? AND riskId= ?",
                                [$idPerson, $risk->getId()]
                            );

                            Person::editPoints($idPerson, -($risk->getPoints()));
                        }
                    }
                }
                return true;            
            }
        
        if($test == true)
        return true;
        else
        return false;
    }// end editContribsAndRisks()



    /**
     * Put the contributions of 1 person 
     * @param int $idPerson, @param array $contrib
     * @return bool
     * 
     */
    public static function insertContribs($idPerson, $contrib = []) : bool
    {
        if(isset($idPerson) && isset($contrib))
        {
            $db = new Database();
                foreach($contrib as $values)
                {
                    $values = htmlentities($values);
                    $result = $db->insert(
                        "INSERT INTO jnct_person_contribution (`personId`, `contributionId`) VALUES (?,?)",
                        [$idPerson, $values]
                    );
                }
            return $result;
        }
        else
            return false;
    }



    /**
     * Insère pour une personnalité les risques qu'elle a encouru
     * 
     * @param int $idPerson, @param array $risk
     * @return bool
     */
    public static function insertRisks($idPerson, $risk = []) : bool
    {
        if(isset($idPerson) && isset($risk))
        {
            $db = new Database();
                foreach($risk as $values)
                {
                    $values = htmlentities($values);
                    $result = $db->insert(
                        "INSERT INTO jnct_person_risk (`personId`, `riskId`) VALUES (?,?)",
                        [$idPerson, $values]
                    );
                }
            return $result;
        }
        /*else
            return false;*/

    }





  /************************************************************************** */  
    public static function searchPersons()
    {
        if(isset($_POST['name']) || isset($_POST['firstname']) || isset($_POST['aka']))
        {                      
           $person_seeked = 'SELECT * FROM `person` WHERE ';
             
            //"SELECT * FROM `person` WHERE `name` LIKE `$name%` AND `firstname` LIKE `$firstname%` AND `aka` LIKE `$aka%` LIMIT 20"
            if($_POST['name'] != "" || $_POST['firstname'] !="" || $_POST['aka'] !="")  
            {      
                if(isset($_POST['name']))
                {
                    $name = htmlentities($_POST['name']);
                }
                else {$name = "";}

                if(isset($_POST['firstname']))
                {
                    $firstname = htmlentities($_POST['firstname']);
                }
                else {$firstname = "";}

                if(isset($_POST['aka']))
                {
                    $aka = htmlentities($_POST['aka']);
                }
                else {$aka = "";}
                

                    $search = array(
                    'name' => $name,
                    'firstname' => $firstname,
                    'aka' => $aka
                );
                
                $cumul = "";                   

                    foreach($search as $key => $value)
                    {
                        $person_seeked .=$cumul.' `'.$key.'` LIKE \'%'.$value.'%\' '; 
                        $cumul = ' AND ';
                        //$person_seeked .= $seek_name;                           
                    } 

               
                $name = $_POST['name'];
                $firstname = $_POST['firstname'];
                $aka = $_POST['aka'];

                // "SELECT * FROM `person` WHERE `name` LIKE '$name' AND `firstname` LIKE '$firstname' AND `aka` LIKE '$aka' LIMIT 20"

                $db = new Database();
                $result = $db->search(
                    "Person",
                    "$person_seeked LIMIT 10"                     
                );
               
                if($result == null)
                {
                    echo '<strong>Pas de résultat</strong>';
                    return $result;                        
                }
                else
                {
                    return $result;
                } 
                
            }
        }
    }

/***********************************************************************************/

    /*
    public static function searchPerson() : array
    {
        if(isset($_POST['name']))
            $name = $_POST['name'];
        else
            $name="";

        if(isset($_POST['firstname']))
            $firstname = $_POST['firstname'];
        else
            $firstname="";

        if(isset($_POST['aka']))
            $aka = $_POST['aka'];
        else
            $aka="";

        if($name !="" || $aka !="")
        {
            if($name !="")
            { 
                $db = new Database();
                $result = $db->selectMany(
                    "Person",
                    "SELECT * FROM `person` WHERE `name` LIKE "
                );
            }
        }
        return $result;
    }*/


    public function getVotesById($idPerson) 
    {
        $db= new Database();
        $result = $db->selectOne("Person", "SELECT votes FROM person WHERE id=?", [$idPerson]);
        return $result;
    }


   

    

   
} // END CLASS PERSON








