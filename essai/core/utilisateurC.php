<?PHP

include "config.php";
class utilisateurC {
 

		function login($email,$mdp){
		$sql="SELECT * from utilisateur where email='$email' and mdp='$mdp'";
		$DB = config::getConnexion();
		$valid = true;
		try{
		

 $req = $DB->query("SELECT * from utilisateur where email='$email' and mdp='$mdp' and active=1");

            $req = $req->fetch(); //parcour taa resultat

            // Si on a pas de résultat alors c'est qu'il n'y a pas d'utilisateur correspondant au couple mail / mot de passe
            if ($req['id'] == ""){
                $valid = false;
                $er_mail = "Le mail ou le mot de passe est incorrecte";
            }

            // S'il y a un résultat alors on va charger la SESSION de l'utilisateur en utilisateur les variables $_SESSION
            if ($valid){

                $_SESSION['id'] = $req['id']; // id de l'utilisateur unique pour les requêtes futures
                
                $_SESSION['email'] = $req['email'];
                
                   
	            $goto='Location:  index.html';
                header($goto);
                exit;
            }   


		return $valid;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
		function afficherUtilisateurs(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From utilisateur where role='utilisateur'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}



    
}
?>