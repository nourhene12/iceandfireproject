<?PHP
include "../entities/Client.php";
include "../core/ClientC.php";

if (isset($_POST['Nom']) and isset($_POST['Prenom'])and isset($_POST['CIN'])and isset($_POST['Tel'])and isset($_POST['mail'])and isset($_POST['PWD']))
{
    $Client=new Client($_POST['Nom'],$_POST['Prenom'],$_POST['CIN'],$_POST['Tel'],$_POST['mail'],$_POST['PWD']);
/*
var_dump($employe1);
}
*/
//Partie3
$Client1C=new ClientC();
$Client1C->ajouterClient($Client);
header('Location: afficherClient1.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>