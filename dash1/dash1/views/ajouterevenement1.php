<?PHP
include "../entities/event.php";
include "../corp/evenementC.php";

if (isset($_POST['nom']) and isset($_POST['prix']))
{
    $event=new evenement($_POST['nom'],$_POST['prix']);
/*
var_dump($employe1);
}
*/
//Partie3
$evement1C=new EvenementC();
$evement1C->ajouterEvenement($event);
header('Location: afficherevenement1.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>