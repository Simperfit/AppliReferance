<?php
session_start();
if(isset($_SESSION['log'])) {
header('location:admin.php');
}
else {
?>
<html>
<form action = "./connect.php" method = "POST">
    <h2>Connexion</h2>
<center>
<label for = "refCo">Nom d'utilisateur :</label><input type = "text" name ="user" id="user" /><br/>
<label for = "refCo">Mot de passe:</label><input type = "password" name="password"  id = "password" /><br/>
<input type="submit" name="connect" value="Se connecter">
</form>



</center>
</html>
<?php
}
?>