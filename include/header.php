<html>
<?php
session_start();
require('include/funct.php');
$co = is_Connected();
if($co == true){
	echo 'Bienvenue '.$_SESSION['log']; 
echo '
<ul>
</li> <a href="add.php">Ajouter une commande</a></li></br>
</li> <a href="list.php">Listes des Commandes</a></li></br>
</li> <a href="deco.php">Deconnexion</a></li>
</ul>';
}
else
{
	echo 'veuillez vous reconnecter </br><a href="./index.php"> Acceuil</a>';
	die();
}
?>
