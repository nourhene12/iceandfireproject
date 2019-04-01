<?PHP
include "../views/config.php";
class ClientC {
function afficherClient ($Client){
        echo "ID: ".$Client->getID()."<br>";
	    echo "Nom: ".$Client->getNom()."<br>";
		echo "Prenom: ".$Client->getPrenom()."<br>";
		echo "CIN: ".$Client->getCIN()."<br>";
		echo "Tel: ".$Client->getTel()."<br>";
		echo "mail: ".$Client->getmail()."<br>";
		echo "PWD: ".$Client->getPWD()."<br>";
		echo "Photo: ".$Client->getPhoto()."<br>";
		
	}
	

	function ajouterClient($Client){
		$sql="insert into Client (ID,Nom,Prenom,CIN,Tel,mail,PWD,Photo) values (:ID,:Nom,:Prenom,:CIN,:Tel,:mail,:PWD,:Photo)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $ID=$Client->getID();
        $Nom=$Client->getNom();
        $Prenom=$Client->getPrenom();
        $CIN=$Client->getCIN();
        $Tel=$Client->getTel();
        $mail=$Client->getmail();
        $PWD=$Client->getPWD();
        $Photo=$Client->getPhoto();
       
        $req->bindValue(':ID',$ID);
        $req->bindValue(':Nom',$Nom);
		$req->bindValue(':Prenom',$Prenom);
		$req->bindValue(':CIN',$CIN);
		$req->bindValue(':Tel',$Tel);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':PWD',$PWD);
		$req->bindValue(':Photo',$Photo);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherClients(){
		//$sql="SElECT * From Client e inner join formationphp.Client a on e.CIN= a.CIN";
		$sql="SElECT * From Client";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerClient($ID){
		$sql="DELETE FROM Client where ID= :ID";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':ID',$ID);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierClient($Client,$ID){
		$sql="UPDATE Client SET ID=:IDD,Nom=:Nom,Prenom=:Prenom,CIN=:CIN,Tel=:Tel,mail=:mail,PWD=:PWD,Photo=:Photo, WHERE ID=:ID";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$IDD=$Client->getID();
        $Nom=$Client->getNom();
        $Prenom=$Client->getPrenom();
        $CIN=$Client->getCIN();
        $Tel=$Client->getTel();
        $mail=$Client->getmail();
        $PWD=$Client->getPWD();
        $Photo=$Client->getPhoto();
		$datas = array(':IDD'=>$IDD,':Nom'=>$Nom,':Prenom'=>$Prenom, ':CIN'=>$CIN, ':Tel'=>$Tel,':mail'=>$mail, ':PWD'=>$PWD, ':Photo'=>$Photo);


        $req->bindValue(':IDD',$IDD);
        $req->bindValue(':ID',$ID);
        $req->bindValue(':Nom',$Nom);
		$req->bindValue(':Prenom',$Prenom);
		$req->bindValue(':CIN',$CIN);
		$req->bindValue(':Tel',$Tel);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':PWD',$PWD);
		$req->bindValue(':Photo',$Photo);

		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererClient($ID){
		$sql="SELECT * from Client where ID=$ID";
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