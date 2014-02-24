<?php
session_start();
header('Content-type: text/html; charset=UTF-8');
require('include/funct.php');

if (isset($_POST['user'])) 
{

    $pseudo = $_POST['user'];
    $pass = $_POST['password'];


    if(isset($pseudo,$pass)) 
    {
         $nom = $pseudo;
         $password = md5($pass);

        $requete = "SELECT * FROM user WHERE user = '".$nom."' AND password = '".$password."'";  
        $sql = sql();
         $req_exec = mysql_query($requete) or die(mysql_error());

         $resultat = mysql_fetch_assoc($req_exec); 

         if (isset($resultat['user'],$resultat['password']))  
               {
                 
                 $_SESSION['log'] = $nom;
               
                 $message = 'Bonjour '.$_SESSION['log'].'Vous allez être redirigé';
                header('location:admin.php');
                }
                else
                {   
                $message = 'Le pseudo ou le mot de passe sont incorrect';
                } 

    }
    else 
    { 
    $message = 'Les champs Pseudo et Mot de passe doivent être remplis.';
    }
}
mysql_close($sql);

?>
<p><?php if(isset($message)) echo $message ?></p>