<?php
require('include/header.php');
$co = sql();
$content = '';
 // On passe dans le tourne page.
//définis le nombre d'enregistrement par page
$rowsPerPage = 10;
 
//definir la page actuelle ou 0 si pas definis
if(isset($_GET['page']))
  $beginAt = intval($_GET['page']);
else
  $beginAt = 0;

$requeteres = "SELECT * from cmdBdc LIMIT ".$beginAt*$rowsPerPage.",".$rowsPerPage."";
$requete = "SELECT count(*) as nb FROM cmdBdc  LIMIT  ".$beginAt*$rowsPerPage.",".$rowsPerPage."";

//requette pour compter le nombre total de resultat
$resultRes = mysql_query($requete);
$countRet = mysql_fetch_assoc($resultRes);

//instancie le pagebrowser
$pbMax = floor($countRet['nb']/$rowsPerPage);

$pb = useTournePage($pbMax,$beginAt,'http://192.168.1.100/PHP/AppliReference/list.php?page=%s',5);


//rends le contenus
//$content .= 'Page "'.$beginAt+1.'" parmis "'.$pbMax+1.'"<br />';

$content .= $pb;



$res = mysql_query($requeteres);

if(isset($_GET['change'])) {
    $asc = 'ASC';
    $desc = 'DESC';
    switch($_GET['change']) {
    case id:
    $res = mysql_query("SELECT * from cmdBdc ORDER BY id ");
    break;
      case fo:
    $res = mysql_query("SELECT * from cmdBdc ORDER BY refCo ");
    break;
      case co:
    $res = mysql_query("SELECT * from cmdBdc ORDER BY refFo ");
    break;
      case prix:
    $res = mysql_query("SELECT * from cmdBdc ORDER BY prixTotal ");
    break;
      case date:
    $res = mysql_query("SELECT * from cmdBdc ORDER BY date ");
    break;
}
}
else
{
$res = mysql_query($requeteres);
}
echo '
<table border ="1">
    <thead>
     <tr>
        <th><a href="?change=id">ID:</a></th>
        <th><a href="?change=fo">Référence CO:</a></th>
        <th><a href="?change=co">Référence FO:</a></th> 
        <th><a href="?change=prix">Prix:</a></th>
         <th><a href="?change=date">date:</a></th>
         <th>Action:</th>
         <th>Action:</th>
                                </tr>
       </thead>
       <tbody>
';
while($row = mysql_fetch_array($res)) {
    $id = $row['id'];
    $refco = $row['refCo'];
    $reffo = $row['refFo'];
    $prix = $row['prixTotal'];
    $date = $row['date'];


?>
 <tr>
    <td><?php echo $id; ?></td>
            <td> <?php echo $refco; ?></td>
            <td><?php echo $reffo ?></td>  
            <td> <?php echo $prix; ?></td>
            <td> <?php echo $date; ?></td>
       
  <td> <a href="edit.php?id=<?php echo $id; ?>">Modifier la commande</a>                                                                                         
       <td> <a href="del.php?supprimer=<?php echo $id; ?>">Supprimer la commande</a>
       </tr>


<?php 
} 
// On renvoi le tourne page.
echo $content;
mysql_close($sql);
include('include/footer.php')
?>
</table>