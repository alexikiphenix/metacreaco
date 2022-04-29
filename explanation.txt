metacreaco@gmail.com

albator1984@poumail.com
Mot de passe : pa.3wa@2021


/***************************** Todolist *******************************/
- check function editImportant()
- check when wrong password when login
- suppress public function showManageAll()
- line 291 style.css /*margin-bottom: 2rem; */
<i class="fas fa-user-plus"></i> OR <i class="fas fa-plus-square icon-in-link">
- finish to put strip_tags
- Replace Tools::redirectTo by $this->redirectTo(
- correct the connexion problem from the address bar: https://127.0.0.1/alx/metacreaco/index.php?class=person&action=delete&person=62&rank=58&page=3
- Search must lead to #title
- remove this function : Tools::removeSpecialChars
- correct the bug when 2 classes : <button class="enhanced_button centered-block" type="submit">
- create preg_match to show the source
- srcset !!! https://www.alsacreations.com/article/lire/1621-responsive-images-srcset.html
- Create checkPagination
- $rank = ($_GET["rank"]--) DOESN T work must $_GET["rank"]--;
- Check differences between display: block for anchor a and button on horizontal centered
- Add function delete picture
- move ShowGender to Tools
- https://www.ibrahima-ndaw.com/fr/blog/build-a-search-filter-with-javascript/
- URGENT METTRE PHP de list_contribution_view.php dans le controller.
- faire une fonction preg replace pour le nom des fichiers uploadé: https://www.lesjeudis.com/article/cb-855-les-problemes-de-securite-avec-php
    https://webdevdesigner.com/q/full-secure-image-upload-script-6756/
    - VSCODE ctrl + / (met ou enlève commentaires)
- Correct GotoAnchor (it goes too previous anchor when you click on annuler)
- Suppress function addFromForm()
- Remplacer Person::putImage par Tools::putImage
- Remplacer Tools:redirecto PAR $this->redirectTo("index.php?class=user&action=index");
- <button class="width_xl" type="submit" onsubmit="location();">contester</button>
- tester fonction <session_cache_expire
- function Person add() : bool Check why $this->userId in the function add()
- previousanchor enlever htmlentities dans la méthode
- changer la fonction rand() en mtr_rand();
- lister les personnes à activer (Mode Admin)
- public const SITENAME = "metaCreaCo";
- améliorer constructeur pour Database
- rajouter les alt dans les img
- think about delteting person to delete jnct_person_contribution
- html_entity_decode() est la fonction contraire de htmlentities() : elle convertit les entités HTML de la chaîne string en leurs caractères correspondant.
- Faire que le nom tapé dans la recherche reste visible 50% fait
- vérifier si fonction editPerson() est en doublon
- Améliorer ma fonction aléatoire
- Sécuriser les accès.
- Rajouter
- Admin : trier par ordre alphabetique
- HTMLInputElement.value
- http://127.0.0.1/alx/MetaCreaco/index.php?class=person&action=addPersonAndJunction (corriger bug d affichage quand page chargée directement sans passer par add_person_view.php)
- http://127.0.0.1/alx/MetaCreaco/index.php?class=person&action=editPersonAndJunction&person=2 (corriger bug d affichage quand page chargée directement)
- http://127.0.0.1/alx/MetaCreaco/index.php?class=person&action=editPersonAndJunction&person=3

- https://www.php.net/manual/en/function.mysql-real-escape-string.php (vérifier faille)
-  <input type="search" id="maRecherche" name="q"
     placeholder="Rechercher sur le site…"
     aria-label="Rechercher parmi le contenu du site">
- Format image / video //webm ?
JAVASCRIPT
- Javascript : faire eventlistener bloquant suppress et contest
- AJAX

- Postman API

- ROW_NUMBER (Transact-SQL) : https://docs.microsoft.com/fr-fr/sql/t-sql/functions/row-number-transact-sql?view=sql-server-ver15


/***************** Liste des sites d'anagrame *******************************/
https://dicocitations.lemonde.fr/dictionnaire-anagrammes-a.php
https://beaussier.developpez.com/articles/php/mysql/blob/
http://listedemots.online.fr/?lettre=G


/*****************************************************************************/

Note : il existe aussi le tableau associatif superglobal $_REQUEST qui regroupe les 3 tableaux $_GET, $_POST et $_COOKIE 
que nous verrons au prochain cours. Il fonctionne exactement comme tous les autres tableaux.

Pourquoi utiliser GraphQL pour nos APIs 


/*******************************************************************************************************/
/*********************************************** CSS **************************************************/
<form class="registration"></form>
<form class="search-movies"></form>
<form class="search-actress"></form>

To match only search forms, you can write:

[class|="search"] { font-size: 150% }
/*****************************************************************************************************/
/*****************************************************************************************************/


/******************************************************************************************/
/*************************** FONCTIONS A VERIFIER ****************************************/
/*****************************************************************************************/
$today = date("Y-m-d H:i:s");                     // 2001-03-10 17:16:18 (le format DATETIME de MySQL)

<i class="fab fa-atlassian"></i>
<i class="fas fa-blind"></i>


<?php
$tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
$lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
$nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);
?>

VOIR LES SITES PWA : Tu ouvres une page internet et t'es


 voir si ma fonction test_instanceof.php peut être exécuté dans la condition elle même

  /**
     * Return the path for an image sent
     *
     * @return  string
     */ 
    public static function putImage($imgName, $nameToSave) :?string
    {
        $path="assets/img/users/avatar.jpg"; 
        if(isset($_FILES[$imgName]) && $_FILES[$imgName]['error'] == 0)
        {            
            if($_FILES[$imgName]['size'] <= 10000000)
            {                
                echo "ok l image est plus que petite que 1 000 000";
                $infos_file = pathinfo($_FILES[$imgName]['name']);                 

                $extension_upload = $infos_file['extension'];
                $_FILES[$imgName]['name'] = $nameToSave.'.'.$extension_upload;

                $extensions_allowed = ['jpg', 'jpeg', 'jtif', 'tiff', 'gif', 'png', 'webm']; //webp ?
            
                if(in_array($extension_upload, $extensions_allowed))
                {
                    echo 'ok l\'image est au bon format';
                    //On peut valider le fichier et le stocker définitivement
                    if(!file_exists('assets/img/users/'.$nameToSave.''))
                        mkdir('assets/img/users/'.$nameToSave.'', 0700);
                    
                    $path = 'assets/img/users/'.$nameToSave.'/'.basename($_FILES[$imgName]['name']); 
                    move_uploaded_file($_FILES[$imgName]['tmp_name'], 'assets/img/users/'.$nameToSave.'/'.basename($_FILES[$imgName]['name']));
                   
                    if(move_uploaded_file($_FILES[$imgName]['tmp_name'], 'assets/img/persons/'.basename($_FILES[$imgName]['name'])));
                    {                                            
                        echo '<br>$path => '.$path;
                    }
                }
                else
                {
                    echo '<marquee><h1>ERREUR FORMAT</marquee>';            
                }
            }

        }
        return $path;
    }// putImage()


                        /******************* Exemple de MDN
                            $data['one'] = 1;
                            $data += [ "two" => 2 ];
                            $data += [ "three" => 3 ];
                            $data += [ "four" => 4 ];
                        ****************************/

/******************************************************************/
SITE D HASSAN :
https://myonlinebook.fr/
admin@test.fr
12345
/******************************************************************/
Regarder fonction

/******
https://www.facebook.com/3WAcademy/videos/217876176617964

Boris PHP


/**********************************************************************************************/
/*************************** OFFRE ************************************************************/
/**********************************************************************************************/
/**********************************************************************************************/
https://fr.indeed.com/viewjob?jk=23ee014cca5800a2&q=d%C3%A9veloppeur+web+junior&l=Paris+%2875%29&tk=1esgv2r5essr6800&from=web&vjs=3



/*********************************** symphony ********************************************/

    /**
 * Auto-generated Migration: Please modify to your needs!
 */
/*
final class Version20200325093304 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE post_category (post_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_B9A190604B89032C (post_id), INDEX IDX_B9A1906012469DE2 (category_id), PRIMARY KEY(post_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post_category ADD CONSTRAINT FK_B9A190604B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_category ADD CONSTRAINT FK_B9A1906012469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment CHANGE username username VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE subject subject VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE post CHANGE edited_at edited_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE post_category');
        $this->addSql('ALTER TABLE comment CHANGE username username VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact CHANGE subject subject VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE post CHANGE edited_at edited_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
//************************************** END SYMPHONY *********************************************/


/*******************************************************************************************************/
/***************************************** LIENS IMPORTANTS ********************************************/
/*******************************************************************************************************/
VOIR AWS : https://docs.aws.amazon.com/fr_fr/elasticbeanstalk/latest/dg/php-symfony-tutorial.html

https://pa-151.ide.3wa.io/ide.html
alexikiphenix
E....@.4

pa151.slack.com

ctrl+shift+B

https://openclassrooms.com/forum/sujet/meilleur-cryptage-php-20540

https://css-tricks.com/the-shapes-of-css/
https://debray-jerome.developpez.com/articles/geometrie-avec-css/
https://sass-lang.com/


ORDRE :
1.Framework
2.plugIn
3.Mon code

= Pour CSS :
Normalize.css
Font awesome
style.css

Pour JS :
jQuery
flexside
JS



<meta name="viewport" content="width=device-width, initial-scale=1.0" />


<link rel="stylesheet" href="css/font-awesome.min.css">
/*******************************************************************************************************/
/*******************************************************************************************************/
/*******************************************************************************************************/

extension tabnine

/************************* OLD COLORS *******************************/
   /*
        #3AB807
        colors : 
        #E1E2E6 (gris clair fond des textes principaux)
        #4480A6 (couleur des textes sur fond vert)
        rgba(0,142,160,1) (vert, fond des textes secondaire)
        #ddd (couleur des textes sur fond vert)


        black: #2e2e2e; 
        black2 : #2e2e2e;
        black3: #2e2e2e THE BEST
        Orange 1: #F2811D;
        Orange 2 : #e87c03 (not applied)
        orange 3 : F2811D
        color: #F2811D;    
    */
