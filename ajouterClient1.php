<?PHP
include "../entities/Cli.php";
include "../core/Client.php";
if (isset($_POST['Nom']) and isset($_POST['Prenom'])and isset($_POST['CIN'])and isset($_POST['Tel'])and isset($_POST['mail'])and isset($_POST['PWD']))
{
   $Client=new Client();
   $Client->setNom($_POST['Nom']);
    $Client->setPrenom($_POST['Prenom']);
    $Client->setCin($_POST['CIN']);
    $Client->setTel($_POST['Tel']);
    $Client->setmail($_POST['mail']);
    $Client->setPwd($_POST['PWD']);
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