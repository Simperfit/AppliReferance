<?php
require('include/header.php');

$idref = $_GET['id'];


$sql = sql();
$requete = mysql_query("SELECT * FROM cmdBdc WHERE `id`='$idref'"); 
$row = mysql_fetch_array ($requete);
mysql_close($sql);

    $id = $row['id'];
    $refco = $row['refCo'];
    $reffo = $row['refFo'];
    $prix = $row['prixTotal'];
    $date = $row['date'];

?>



<form name="form2" method="post" action="change.php">
  <table width="363" border="0">
    <tr>
     
     <input type='hidden' name="id" type="text" id="id" value="<? echo $id ; ?>">
        
    </tr>
    <tr>
      <td>R&eacute;f&eacute;rence Commande: </td>
      <td><input name="refco" type="text" id="refco" value="<? echo $refco; ?>">
    </td>
    </tr>
    <tr>
      <td>R&eacute;f&eacute;rence Fournisseur: </td>
      <td><input name="reffo" type="text" id="reffo" value="<? echo $reffo; ?>">
</td>
    </tr>
    <tr>
      <td>Prix Total</td>
      <td><input name="prix" type="text" id="prix" value="<? echo $prix; ?>">
</td>
    </tr>       
        <tr>
      <td>Modifier : </td>
      <td><input type="submit" name="Submit" value="Modifer"></td>
    </tr>
  </table></form>
<?php
mysql_close($sql);
require('include/footer.php');
?>