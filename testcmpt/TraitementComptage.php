<?php
include ("connexion.php");

$DateActuelle   = $_POST['Date'];		//On recupère la date actuelle
$ValeurComptage = $_POST['CmptValue'];
$Responsable    = $_POST['RspEvent'];
$TypeE          = $_POST['TypeEvent'];
$EventTrouve    = 0;
$DateSQL        =0;

/*
Cette fonction permet d'ajouter un évennement dans la table comptage
Paramètres : IdentifiantEvent, CmptValue, DateAct, Base 
*/
function AjouterEvennement($IdentifiantEvent, $CmptValue, $DateAct, $Base)
{
	$RequeteInsert = "INSERT INTO comptage(NbrPersonne, Date, idEvenement) VALUES('$CmptValue', '$DateAct', '$IdentifiantEvent')";	//On insère une nouvelle valeur de comptage avec  
	$Resultat      = $Base->query($RequeteInsert);
	if (!$Resultat)
	{
		echo "Echec ".'<br/>';
	}
}

/*
Cette fonction calcul la moyenne de tous les comptage d'un même évennement
Paramètres : IdentifiantEvent, Base 
*/
function Calcul_Moyenne($IdentifiantEvent, $Base)
{
	$Moyenne;
	$ValeursTotal;

	$LocalRequest = "SELECT format(AVG(NbrPersonne),0) As 'Moyenne', idEvenement FROM comptage WHERE idEvenement = '$IdentifiantEvent'";//On calcul la moyenne de tous les comptage ayant le même idEvennement identifié précedemment 
	$Reponse      = $Base->query($LocalRequest);																								

	while ($LocalRow = mysqli_fetch_assoc($Reponse))
	{
		echo "Moyenne = ", $LocalRow['Moyenne'].'<br/>';
	}
}

echo "Comptage = ", $ValeurComptage;
echo "<br>";

//$Requete = "SELECT idEvenement FROM evenement WHERE Date = '$DateActuelle' AND HeureDebut <= '$HeureActuelle' AND HeureFin >= '$HeureActuelle' AND NomResponsableEvt = '$Responsable' AND Type = '$TypeE'";
$Requete = "SELECT idEvenement FROM evenement WHERE DateDebut <= '$DateActuelle' AND DateFin >= '$DateActuelle' AND NomResponsableEvt = '$Responsable' AND Type = '$TypeE'";	
// On vérifie que un évennement est bien existant dans la BDD avec les valeurs saisies : 
$ReqID   = $db->query($Requete);

while ($Row = mysqli_fetch_assoc($ReqID))
{
	$idEvenement = $Row['idEvenement'];
	if ($Row['idEvenement'] == NULL)
	{
		echo "Aucun évenement trouvé !";
	}
	else 
	{
		AjouterEvennement($Row['idEvenement'], $ValeurComptage, $DateActuelle, $db);
		Calcul_Moyenne($idEvenement, $db);
		$EventTrouve = 1;
	}
	echo " ID = ", $Row['idEvenement']. '<br/>';
}
if ($EventTrouve != 1)
{
	echo "Aucun évenement trouvé !";
}

?>







