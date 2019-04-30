<?php
$host     = "192.168.0.19";   /* L'adresse du serveur */
$login    = "thibaut";        /* Votre nom d'utilisateur */
$password = "thibaut";        /* Votre mot de passe */
$base     = "thibaut";        /* Le nom de la base */

$DateActu      = date ('Y-m-d H:i');

$DateActuelle  = date ('Y-m-d');	// On recupère la date actuelle
$HeureActuelle = date ('h:i'); 

global $host, $login, $password, $base;
$db = new mysqli($host, $login, $password, $base);

if (!$db)
{
	echo "Erreur de connexion";
}
?>


<form name="formulaire" method="post" action="TraitementComptage.php">
<table width="200" border="1">
    <tr>
        <td>Date :</td>
        <td><input name="Date"  type="text" id="Date" value= "<?php  echo $DateActu;?>" /></td>
    </tr>
        <tr>
        <td>Type</td>
        <td><input name="TypeEvent" type="text" id="TypeEvent" size="20" maxlength="20" /></td>
    </tr>
        <tr>
        <td>Responsable</td>
        <td><input name="RspEvent" type="text" id="RspEvent" size="20" maxlength="20" /></td>
    </tr>
        <tr>
        <td>Valeur Comptage</td>
        <td><input name="CmptValue" type="text" id="CmptValue" size="5" maxlength="5" /></td>
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