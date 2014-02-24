<?php
session_start();
require("include/header.php");
if(isset($_POST['id'],$_POST['refco'],$_POST['reffo'],$_POST['prix'])) {

	if(preg_match('/[A-Za-z]/', $_POST['prix']) )
	{
		$response = 'Le champ prix ne doit pas contenir de lettre. <a href="list.php">Retour </a>';
echo $response;
die();
	}
	else
        $id_ref = $_POST['id'];
        $refCo= $_POST['refco'];
        $refFo = $_POST['reffo'];
        $prixTotal = $_POST['prix'];

        $sql = sql();
        $recherche = mysql_query ("SELECT * FROM  cmdBdc WHERE `id`='$id_ref'");

                        mysql_query ("UPDATE cmdBdc SET `refCo`='$refCo', `refFo`='$refFo', `prixTotal`='$prixTotal', `date`=now() WHERE `id`='$id_ref'");
                        $reponse = 'Les donnees on ete actualisees.<br><a href="list.php">Retour a la liste</a>' ;
                mysql_close($sql);
}
else
$response = 'Tout les champs sont obligatoire';
?>

<html>
<body>
<? echo $reponse; ?>
</body>
</html>
