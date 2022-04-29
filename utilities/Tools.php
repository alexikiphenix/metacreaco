<?php

class Tools{
    protected $button_show = '<button class="button_show_more">Voir +</button>';
    protected $button_hide = '<button class="button_show_less">Réduire -</button>';
    protected $tag_1 = '<div class="hidden"><div>';
    protected $tag_2 ='</div></div>';

    
    static public function MyAutoloader($class)
    {
        if(file_exists('utilities/'.$class.'.php'))
        {
            require_once('utilities/'.$class.'.php');            
        }
        else if(file_exists('controllers/'.$class.'.php'))
        {
            require_once('controllers/'.$class.'.php');            
        }
        else if(file_exists('modeles/'.$class.'.php'))
        {
            require_once('modeles/'.$class.'.php');            
        }
        else
            {echo '<h1>Classe '.$class.' non trouvée</h1>';}
    }
        
    
    public static function showTxtCut($txt, $length)
    {
        $button_show = '<button>+</button>';
        $button_hide = '<button class="button_show_less">-</button>';
        $tag_1 = '<div class="hidden"><div>';
        $tag_2 ='</div></div>';
        $txt = substr($txt, 0, $length);
  
        $txt = $txt.'...'.$button_show;
       
        /* Version 2 à développer
        /A revoir : Julian Assange /ˈd͡ʒuːlɪən əˈsɑːnʒ/1, né Julian Paul Hawkins

        $select = '([a-zA-Z0-9àáâãäåçèéêëìíîïðòóôõöùúûüýÿÁÀÂÄÉÈÊËÔ,.?\n\*\'’/<>"\\\/:=_!() -]{'.$length.'})';
        $select2 ='([a-zA-Z0-9àáâãäåçèéêëìíîïðòóôõöùúûüýÿÁÀÂÄÉÈÊËÔ,.?\n\*\'’/<>"\\\/:=_!() -]{0,})';
        $button1 = '<button class="button_show_more">Voir +</button>';
        $button2 = '<button class="button_show_less">Réduire -</button>';
        $tag_1 = '<div class="hidden"><strong>';
        $tag_2 ='</strong></div>';

        $txt = preg_replace('#^'.$select.$select2.'#i', '$1...'.$button1.$tag_1.'$2'.$button2.$tag_2.'', $txt);
        return $txt;
        */
        return $txt;
    }

    public static function showTxt($txt)
    {
        $button_show = '<button class="button_show_more">+</button>';
        $button_hide = '<button class="button_show_less">Réduire -</button>';
        $tag_txt_1 = '<div class="hidden"><div>';
        $tag_txt_2 ='</div></div>';       
        

        $txt = $tag_txt_1.$txt.' '.$button_hide.$tag_txt_2;
        
        return $txt;
    }

    public static function randomizeId()
    {
        $id = new Datetime();
        $id = $id->getTimestamp();
        $id = substr($id, 5);

        for($i = 0; $i < 5; $i++)
        {
            $id .= random_int(0,9);
        }
        
        return $id;
    }



    
    /**
     *  Function made to show a jauge a kind of tag <progress> or <meter>
     * 
     */
    public static function jauge($points):int 
    {
        if(is_numeric($points) && $points >= 0)
        {
            $percents = intval(($points*100)/22000);
            return $percents;
        }
        else    
            return false;
        
        /* <progress>
            </progress> check compatibility CSS3 

            <div style="width: 100%; height: 1rem; background-color: rgba(0,0,0,0);"> 

            <div style ="width: 80%; height: 1rem; background-color: green;">Score </div>
        </div>
         */       

    }


    /** SHOW CURRENT YEAR
     * 
     * @return string
     */
    public static function showYear()
    {
        $year = date('Y');
        return $year;
    }

    /**
     *  Return a french date format from an SQL US DATE format (2020 11 30 to 30-11-2020)
     *  @param string $date
     *  @return string
     */
    public static function frenchifyDate($date):string
    {
        if(isset($date) && is_string($date))
        {
            if(preg_match('#^0{4}-0{2}-0{2}$#', $date))
            {
                return "0000-00-00";              
            }
            if(preg_match('#^(\d){4}\s(\d){2}\s(\d){2}$#', $date))
            {
                list($year, $month, $day) = explode(" ", $date);
                return $day.'/'.$month.'/'.$year;               
            }
            if(preg_match('#^(\d){4}-(\d){2}-(\d){2}$#', $date))
            {
                list($year, $month, $day) = explode("-", $date);
                return $day.'/'.$month.'/'.$year;               
            }            
            else    
                return "0000-00-00";
        }
        else    
            return "0000-00-00";
    }

     /**
     *  Return a french datetime format from an SQL US datetime format (2020 11 30 to 30-11-2020)
     *  @param string $datetime
     *  @return string
     */
    public static function frenchifyDatetime($datetime):string
    {
        if(isset($datetime) && is_string($datetime))
        {
            if(preg_match('#^(\d){4}-(\d){2}-(\d){2}\s(\d){2}:(\d){2}:(\d){2}$#', $datetime))
            {
                list($date, $time) = explode(" ", $datetime);
                list($year, $month, $day) = explode("-", $date);
                               
               return $day.'/'.$month.'/'.$year.' '.$time;           
            }            
            else    
                return "0000-00-00";
        }
        else    
            return "0000-00-00";
    }

    /**
     * return lui or elle in regard to the gender
     * @param string $gender
     * @return string
     */
    public static function showPronoun($gender)
    {
        if(isset($gender) && is_string($gender))
        {
            if($gender == "f" || $gender == "F")
            {                
                return 'elle';           
            }
            else if($gender == "h" || $gender == "H")
            {
                return 'lui';
            }
            else
            {
                return ' ';
            }
        }
    }

    
    /**
     * return lui or elle in regard to the gender
     * @param string $gender
     * @return string
     */
    public static function showGender($gender):string
    {
        if(isset($gender) && is_string($gender))
        {
            if($gender == "f" || $gender == "F")
            {
                $gender = "féminin"; 
                return $gender;           
            }
            else if($gender == "h" || $gender == "H")
            {
                $gender = "masculin"; 
                return $gender;
            }
            else
            {
                $gender = "autre"; 
                return $gender;
            }
        }
    }


    /**
     * Show 1 variable if it exists with separators in parameters
     * @param string $variable, @param string $end, @param string $start
     * @return string 
     */
    public static function showIf($variable,  $end = null, $start = null)
    {
        if(empty($start) && !is_string($start))
            {
                $start = "";
            }
       
        if(empty($end) && !is_string($end))
            {
                $end = "";
            }          

        if(!empty($variable) && $variable != "0000-00-00")
            {
                $variable = $start.$variable.$end; 
                return $variable;
            }
        else
            $variable = "";  
    }

    /**
     * Show the previous anchor in case of it doesn't exist or it has been deleted
     * @param string $anchor
     * @return string
     */
    public static function GoToPreviousAnchor($anchor)
    {
        if(!empty($anchor) && is_numeric($anchor))
        {
            if($anchor == "1")
                $anchor = '#anchor'.$anchor;
            else
                {
                    $anchor--;
                    $anchor = '#anchor'.htmlentities($anchor);
                }
        }
        else
        {
            $anchor = "";
        }
        return $anchor;
    }

 /**
     * Redirect to the selected anchor
     * @param string $anchor
     * @return string
     */
    public static function goToAnchorOLD($anchor)
    {
        if(!empty($anchor))
        {
            if(preg_match('#^\#anchor[0-9]{1,6}$#', $anchor))
            {
                $anchor = 'index.php?class=person&action=showList'.$anchor;
                Tools::redirectTo($anchor);
            }
        }

    }


    /**
     * Redirect to the selected anchor
     * @param string $anchor
     * @return string
     */
    public static function goToAnchorAdm($anchor)
    {
        if(!empty($anchor))
        {
            if(preg_match('#^\#anchor[0-9]{1,6}$#', $anchor))
            {
                $anchor = 'index.php?class=person&action=showList&anchor=anchor'.$anchor;
                Tools::redirectTo($anchor);
            }
        }
    }


    /**
     * Return the path for an image sent
     * @param $imgName, $class, $nameToSave
     * @return  string
     */ 
    public static function putImage($imgName, $class, $nameToSave) :?string
    {
        $path = "";
        if(isset($_FILES[$imgName]) && $_FILES[$imgName]['error'] == 0)
        {            
            if($_FILES[$imgName]['size'] <= 10000000)
            {                
                $class = strtolower($class);
                $path='assets/img/'.$class.'/avatar.jpg'; 
                $infos_file = pathinfo($_FILES[$imgName]['name']);                 

                $extension_upload = strtolower($infos_file['extension']);
                $_FILES[$imgName]['name'] = $nameToSave.'.'.$extension_upload;

                $extensions_allowed = ['jpg', 'jpeg', 'jtif', 'tiff', 'gif', 'png', 'webp']; 
            
                if(in_array($extension_upload, $extensions_allowed))
                {
                    //The format is correct we can validate and store the file if it doesn t exist
                    if(!file_exists('assets/img/'.$class.'/'.$nameToSave.''))
                        mkdir('assets/img/'.$class.'/'.$nameToSave.'', 0700);
                    
                    $path = 'assets/img/'.$class.'/'.$nameToSave.'/'.basename($_FILES[$imgName]['name']); 
                    
                    //move_uploaded_file($_FILES[$imgName]['tmp_name'], 'assets/img/'.$class.'/'.$nameToSave.'/'.basename($_FILES[$imgName]['name']));
                   
                    if(move_uploaded_file($_FILES[$imgName]['tmp_name'], 'assets/img/'.$class.'/'.$nameToSave.'/'.basename($_FILES[$imgName]['name'])))
                    {                                            
                        echo '<br>$path => '.$path;
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

        }
        return $path;
    }// putImage()


    /**
     * Redirect to the path
     *
     * @param string $path
     */
    public static function redirectTo(string $path)
    {
        header("Location: $path");
        exit;
    }


    /**
     * Show $message
     *@param string|array @message
     * 
     */
    public static function showMessage($message)
    {
        if(is_array($message))
        {
            foreach($message as $line)
            echo $line.'<br>'; 
        }
        else
            echo $message;           
    }


    /**
     * Send email and use wordwrap in case of long lines
     * 
     */
    public static function sendEmail($recipient, $subject, $emailContent)
    {        
        //$message = wordwrap($message, 70, "\r\n");        
        $from = 'metacreaco@gmail.com';        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();

        ini_set("SMTP","ssl://smtp.gmail.com");
        ini_set("smtp_port","587");

        mail($recipient, $subject, $emailContent, $headers);
    }
    

    /***
     * Check if an email given is correct
     * 
     * @return string
     */
    public static function checkEmail($email) :string
    {
        if(preg_match('#^[a-z0-9._-]{3,}@[a-z0-9._-]{2,}\.[a-z]{2,5}$#', $_POST["email"]))
            return 'Email valide !';
        else
            return 'Email invalide !';

    }



   /**
     * Send email and use wordwrap in case of long lines
     * 
     */
    public static function sendEmailSAFE($recipient, $emailContent)
    {        
        $subject = 'Essai Meta : '.date('d-m-Y H:i:s');
        //$message = wordwrap($message, 70, "\r\n");        
        
        $from = 'metacreaco@gmail.com';
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        
        /*
        $headers = [
            'MIME-Version' => '1.0' . "\r\n",
            'Content-type' => 'text/html; charset=iso-8859-1' . "\r\n",
            'From' => 'metacreaco@gmail.com\r\n'.
            'Reply-To' => 'metacreaco@gmail.com\r\n'.           
            'X-Mailer' => 'PHP/' . phpversion()
        ];*/

        ini_set("SMTP","ssl://smtp.gmail.com");
        ini_set("smtp_port","587");

        //phpinfo();

        mail($recipient, $subject, $emailContent, $headers);
    }



    /**
     * Remove special chars code in $_GET or $_POST
     * @param string $imputTxt
     * @return string
     */
    public static function removeSpecialChars($imputTxt)
    {
        if(!empty($imputTxt) && is_string($imputTxt))
        {
            $imputTxt=preg_replace("/[^a-z0-9_ ]/i", "", $imputTxt);
        }
        else
        $imputTxt = "";

        return $imputTxt;
    }


    /**
    * Paginate the results in a tab (pas d'augmentation) range
    * @param int $nbElements @param int $limit
    * @return array
    */
    public static function paginate($nbElements, $limit)  // Check if it s for php 7
    {
        for($i = 1, $j = 0, $pagination[0] = $limit; $j <= $nbElements; $i++, $j+=$limit)
        {            
            if($j < $nbElements)
            {
                $pagination[$i] = $j;  
            }
        }
        //$pagination[] += $nbElements; 
        /*
        echo '<pre>';
        print_r($pagination);
        echo '</pre>';  
        */                  
        return $pagination;
    }

 
    /***
    * Paginate the results in a tab (pas d'augmentation) range
    * @param int $count @param int $palier
    * @return array
    */
    public static function paginateOFF($nbElements = int, $range = int)
    {
        for($i = 1, $j = 0, $pagination[0] = $range; $j < $nbElements; $i++)
        {            
            $j += $range;
            if($j <= $nbElements)
            $pagination[$i] = $j;                       
        }
        $pagination[] += $nbElements;        
               
        return $pagination;
    }

    /***
     * Paginate the results in a tab (pas d'augmentation) range
     * @param int $count @param int $palier
     * @return array
     */
    /*
    public static function paginateOFF($nbElements = int, $range = int)
    {
        $pagination = [];
        $i = 0;
        while($i < $nbElements)
        {
            $pagination[] += $i;
            $i += $range;            
        }

        $pagination[] += $count;
        return $pagination;
    }
    */

    /**
     * Go to a specific and anchor IN ANOTHER PAGE (skipping renderView()
     * @param string $class, @param string $action
     * 
     */ /*
    public static function goToAnchor($class, $action, $id = int): bool
    {       
        if(!empty($_GET["rank"]) && is_numeric($_GET["rank"]))
        {
            if($_GET["rank"] > 1)
            {
                if($action == "delete")
                    $rank = --$_GET["rank"];
                else
                $rank = $_GET["rank"];
                
                $class = strtolower(htmlentities($class));
                $action = strtolower(htmlentities($action));


                if(!empty($_GET["page"]) && is_numeric($_GET["page"]))
                {
                    $page = $_GET["page"];
                    $totalPersons = $class::count();
                    $limit = 25;
                    $pagination = Tools::paginate($totalPersons, $limit);
                    
                    if($action == "list") // if it goes to a list 
                    {
                        if(!empty($pagination[$page]) && is_numeric($pagination[$page]))
                        {
                            $offset = $pagination[$page];  
                            if(!empty($_GET[$class]) && is_numeric($_GET[$class])) // $_GET[$class]) is the id of the entity ex : $_GET[person]) = $idPErson;
                                Tools::redirectTo('index.php?class='.$class.'&action='.$action.'&'.$class.'='.$_GET[$class].'&page='.$page.'&offset='.$offset.'&limit='.$limit.'#rank'.$rank.'');
                            else
                                Tools::redirectTo('index.php?class='.$class.'&action='.$action.'&page='.$page.'&offset='.$offset.'&limit='.$limit.'#rank'.$rank.'');

                            return true;
                        }
                        else
                        {
                            Tools::redirectTo('index.php?class='.$class.'&action='.$action.'&page='.$page.'#rank'.$rank.'');
                            return true;
                        }
                    }
                    else
                    {
                        if(!empty($pagination[$page]) && is_numeric($pagination[$page]))
                        {
                            $offset = $pagination[$page];  
                            if(!empty($_GET[$class]) && is_numeric($_GET[$class])) // $_GET[$class]) is the id of the entity ex : $_GET[person]) = $idPErson;
                                Tools::redirectTo('index.php?class='.$class.'&action='.$action.'&'.$class.'='.$_GET[$class].'&page='.$page.'&offset='.$offset.'&limit='.$limit.'#rank'.$rank.'');
                            else
                                Tools::redirectTo('index.php?class='.$class.'&action='.$action.'&page='.$page.'&offset='.$offset.'&limit='.$limit.'#rank'.$rank.'');

                            return true;
                        }
                        else
                        {
                            Tools::redirectTo('index.php?class='.$class.'&action='.$action.'&page='.$page.'#rank'.$rank.'');
                            return true;
                        }
                    }                            
                }
                else
                {
                    Tools::redirectTo('index.php?class='.$class.'&action='.$action.'#rank'.$rank.'');
                    return true;
                }
            }
            else
            {
                Tools::redirectTo('index.php?class='.$class.'&action='.$action.'#rank'.$_GET["rank"].'');
                return true;
            }
        }
        else
        {
            
            (new DefaultController())->index();
            return false;
        }
                 
    } */
















}   




?>
