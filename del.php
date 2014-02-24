<?php
include('include/header.php');
if(isset($_POST['confirmer']) && $_POST['confirmer'] == 'oui') {


if (isset($_GET['supprimer']))
{
        $sql = sql();
    mysql_query('DELETE FROM cmdBdc WHERE id=' . $_GET['supprimer']);
        mysql_close($sql);
        header('Location: ./list.php');
}
}
else
{
	echo 'Retour a la <a href="./list.php">liste</a>';
}

?>
<form method='POST' action="#">
<label> Oui </label><input type='checkbox' value='oui' name='confirmer'><br>
<label> Non </label><input type='checkbox' value='non' name='confirmer'>
<input type='submit' name="Submit" id='confirmer'>
<?php
include('footer.php');
?>