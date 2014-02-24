<?php
$sql_serveur = 'localhost'; //Serv BDD
$sql_login = 'root'; //Login BDD
$sql_pass = 'root'; //Pass BDD
$sql_bdd = 'commande'; //Nom de la BDD

function sql() //Connection à MySQL
{
        global $sql_serveur, $sql_login, $sql_pass, $sql_bdd;
        $linkid = @mysql_connect($sql_serveur,$sql_login,$sql_pass) or die ("Erreur lors de la connection au serveur MySQL !");
        @mysql_select_db($sql_bdd,$linkid) or die("Impossible de selectionner la base de données\n<br>\nVoici l'erreur renvoyée par le serveur MySQL :\n<br>\n".mysql_error());
        return $linkid;
}
//bool()
function is_Connected()
{

if(isset($_SESSION['log'])) {
        $requete = "SELECT * FROM user WHERE user = '".$_SESSION['log']."'";  
        $sql = sql();
         $req_exec = mysql_query($requete) or die(mysql_error());

         $resultat = mysql_fetch_assoc($req_exec); 
          if(isset($resultat['user']))
         	return true;
         //mysql_close($sql);
         //unset($sql);
         }
         else{
 return false;
         }
               }   
  	      



function useTournePage($max,$current=0,$urlFormat='%s',$elementsInBrowser=6){
     // Definitions des éléments.

define('sep','.');
define('premierepage','D&eacute;but');
define('precedant','Pr&eacute;c&eacute;dent');
define('etc','...');
define('suivant','Suivant');
define('fin','Fin');

        $max = intval($max);
        $current = intval($current);
        $elementsInBrowser = ($max<intval($elementsInBrowser))?$max+1:intval($elementsInBrowser);
        $urlFormat = $urlFormat;
 

        $elements = array();
 // Si $current est supérieur a 0 alors on affiche premier & precedant
        if($current>0){
            array_push($elements,'<a href="'.sprintf($urlFormat,0).'"> '.premierepage.'</a> '." \n");
            array_push($elements,'<a href="'.sprintf($urlFormat,$current-1).'"> '.precedant.'</a> '." \n");
        }
 
        $elementsNbBeforeCurrent = floor($elementsInBrowser /2) - 1;
        $elementsNbAfterCurrent = $elementsInBrowser - $elementsNbBeforeCurrent -1;
 
        if(($current-$elementsNbBeforeCurrent)<0){
            $elementsNbBeforeCurrent = $current;
            $elementsNbAfterCurrent = $elementsInBrowser - $elementsNbBeforeCurrent -1;
        }elseif(($current + $elementsNbAfterCurrent)>$max){
            $elementsNbAfterCurrent = $max - $current;
            $elementsNbBeforeCurrent = $elementsInBrowser - $elementsNbAfterCurrent -1;
        }
 
        if($current-$elementsNbBeforeCurrent>0)
            array_push($elements,etc);
 
        for($i=0;$i<$elementsNbBeforeCurrent;$i++){
            $elementVal = $current-($elementsNbBeforeCurrent-$i);
            array_push($elements,'<a href="'.sprintf($urlFormat,$elementVal).'">'.($elementVal+1).'</a> '."\n");
        }
        
        array_push($elements,'<b>'.($current+1).'</b> '."\n");
 
        for($i=0;$i<$elementsNbAfterCurrent;$i++){
            $elementVal = $current+$i+1;
            array_push($elements,'<a href="'.sprintf($urlFormat,$elementVal).'">'.($elementVal+1).'</a> '."\n");
        }
 
        if($current+$elementsNbAfterCurrent<$max)
            array_push($elements,etc);
 
        if($current!=$max){
            array_push($elements,'<a href="'.sprintf($urlFormat,$current+1).'">'.suivant.'</a> '." \n");
            array_push($elements,'<a href="'.sprintf($urlFormat,$max).'">'.fin.'</a> '." \n");
        }
 
        return implode(sep,$elements);
    
}
