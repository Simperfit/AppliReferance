<?php
require('include/header.php');
$sql = sql();
if(isset($_POST['refco']) && isset($_POST['refco']) && isset($_POST['refco'])) {
    
    $refco = $_POST['refco'];
    $reffo = $_POST['reffo'];
    $prix = $_POST['prix'];



$requete = "SELECT count(*) as nb FROM cmdBdc WHERE refCo = '".$refco."'";
    $req_exec = mysql_query($requete) or die(mysql_error());
    
         $resultat = mysql_fetch_assoc($req_exec);
    

         if (isset($resultat['nb']) && $resultat['nb'] == 0) 
         {
             $insertion = "INSERT INTO cmdBdc(refCo,refFo,prixTotal,date) VALUES('".$refco."', '".$reffo."','".$prix."',now())";
             $inser_exec = mysql_query($insertion) or die(mysql_error());


             if ($inser_exec === true) 
             {

                 $message = 'Votre ajout est enregistree. ';
             }    
         }
         else
         {   
             $message = 'Une commande porte déjà cette Referance.';
         }
    }
    else 
    {    
         $message = 'Tout les champs doivent etre remplis.';
    }

?>



<form name="form2" method="post" action="#">
  <table width="363" border="0">

    <tr>
      <td>Reference Commande: </td>
      <td><input name="refco" type="text" id="refco">
    </td>
    </tr>
    <tr>
      <td>Reference Fournisseur: </td>
      <td><input name="reffo" type="text" id="reffo">
</td>
    </tr>
    <tr>
      <td>Prix Total</td>
      <td><input name="prix" type="text" id="prix">
</td>
    </tr>       
        <tr>
     
      <td><input type="submit" name="Submit" value="Ajouter"></td>
    </tr>
  </table></form>
<?php
mysql_close($sql);
echo $message;
require('include/footer.php');
?>