<?php
$host = "192.168.0.19"; /* L'adresse du serveur */
$login = "root"; /* Votre nom d'utilisateur */
//$password = "BTS17#BDD1+"; /* Votre mot de passe */
//$base = "Thibaut"; /* Le nom de la base */
$password = ""; /* Votre mot de passe */
$base = "mydb"; /* Le nom de la base */
/*
function connexion()
{

}*/
//On recupère la date actuelle
$DateActuelle = date ('d/m/y');

global $host, $login, $password, $base;
$db = mysqli_connect($host, $login, $password, $base);

if (!$db)
{
	echo "Erreur de connexion";
}
?>


<form name="formulaire" method="post" action="TraitementComptage.php">
<table width="200" border="1">
    <tr>
        <td>Date :</td>
        <td><input name="Date" type="text" id="Date" value= "<?php  echo $DateActuelle;?>" /></td>
    </tr>
    <tr>
        <td>Valeur Comptage</td>
        <td><input name="age" type="text" id="age" size="3" maxlength="3" /></td>
    </tr>
    <tr>
        <td colspan="2">
            <div align="center">
            <input type="submit" name="Submit" value="Envoyer" />
            </div>
        </td>
    </tr>
</table>
</form>