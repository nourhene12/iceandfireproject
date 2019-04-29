<?php
include_once "../Config.php";

class LivraisonC 
{
		/*public function afficher_livreurPhysique($liv)
	{
		echo "id:".$liv->get_id()."<br>";
		echo "CIN:".$liv->get_cin()."<br>";
		echo "nom:".$liv->get_nom()."<br>";
		echo "prenom:".$liv->get_prenom()."<br>";
		echo "mail:".$liv->get_mail()."<br>";
		echo "telephone:".$liv->get_telephone()."<br>";
		echo "ville:".$liv->get_ville()."<br>";
		echo "rue:".$liv->get_rue()."<br>";
		echo "codepostal:".$liv->get_codepostal()."<br>";
		echo "disponiblité :".$liv->get_disponible()."<br>";

	}*/
	public function ajouter_Livraison($l)
	{
		      
        $sql = "INSERT INTO `livraison` (`name`,`prenom`,`adresse`,`ville`,`code`,`cmp`,`civ`) VALUES (:name,:prenom,:adresse,:ville,:code,:cmp,:civ)";
        $q = $this->db->prepare($sql);
        $name = $d->getName();
        $prenom = $d->getPrenom();
        $adresse = $d->getAdresse();
        $ville = $d->getVille();
        $code = $d->getCode();
        $cmp = $d->getCmp();
        $civ = $d->getCiv();
		
		$q->bindValue(':name', $name);
        $q->bindValue(':prenom', $prenom);
        $q->bindValue(':adresse', $adresse);
        $q->bindValue(':ville', $ville);
        $q->bindValue(':code', $code);
        $q->bindValue(':cmp', $cmp);
        $q->bindValue(':civ', $civ);

        try {
		$q->execute();
			} catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
	}
	public static function get_livraison()
	{
		  $list=[];
        $db = config::connect(); //appel fonction static sans new
        $req = $db->query("SELECT u.id,com.idCmd FROM commande com, user u WHERE idCmd=(SELECT MAX(idCmd) FROM commande) and com.idclient=u.id ");

    foreach ($req->fetchAll() as $liv)
    {
        $list[] = new Livraison($liv['idliv'], $liv['idclient'],$liv['idcom'],$liv['datepreferee'],$liv['etalivraison']);
    }

        return $list;
	}
	public function afficher_listelivraison()
	{
		$sql="select l.idliv,u.nom,u.prenom,c.idCmd,l.datepreferee,l.etatlivraison,l.idlivreur,l.idLivMor from livraison l,user u,commande c where l.idcom=c.idCmd and l.idclient=u.id;";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
		function supprimer_livraison($idliv)
	{
		$sql="DELETE FROM livraison where idliv= :idliv";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idliv',$idliv);
		try{
          if($req->execute())
          {
          	           	header("Location: ../back/livraisonindex.php");
          }
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}
	function afficherLivraison($idliv,$c)
{
	$sql="SELECT $c From livreurphysique where idliv=".$idliv ;
	$db = config::getConnexion()->prepare($sql);
	$db->execute();
	while ($result=$db->fetch(PDO::FETCH_ASSOC)) 
	{
		return $result[$c];
	}
}
	function recuperer_livraison($idliv)
	{
		$sql="SELECT * from livraison where idliv=$idliv";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function relation_livraisonphysique()
	{
		$sql="select l.idliv,u.adresse,c.idCmd,p.cin,p.telephone,p.nom,u.username,u.prenom from livraison l,commande c,user u,livreurphysique p where p.ville=u.adresse and l.idcom=c.idCmd and l.idclient=u.id ;";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function relation_livraisonmoral()
	{
		$sql="select l.idliv,u.adresse,c.idCmd,p.codefiscal,p.telephone,p.nom,u.username,u.prenom from livraison l,commande c,user u,livreurmoral p where p.ville=u.adresse and l.idcom=c.idCmd and l.idclient=u.id ;";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}


function modifierLivraison($e,$idliv)
    {

	$sql="UPDATE livraison SET idliv=:idliv, idclient=:idclient,idcom=:idcom,datepreferee=:datepreferee,etatlivraison=:etatlivraison WHERE idliv=:idliv";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idliv=$e->get_idliv();
        $idclient=$e->get_idclient();
        $idcom=$e->get_idcom();
        $datepreferee=$e->get_datepreferee();
        $etatlivraison=$e->get_etatlivraison();
		$datas = array(':idliv'=>$idliv, ':idclient'=>$idclient, ':idcom'=>$idcom,':datepreferee'=>$datepreferee,':etatlivraison'=>$etatlivraison);
		$req->bindValue(':idliv',$idliv);
		$req->bindValue(':idclient',$idclient);
		$req->bindValue(':idcom',$idcom);
		$req->bindValue(':datepreferee',$datepreferee);
		$req->bindValue(':etatlivraison',$etatlivraison);
		
		
            $req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
		
	}
	public function modifierEtatLivraisonPhy($liv,$val,$idliv)
	{
		echo $liv;
		$db=config::getConnexion();
		$sql="UPDATE `livraison` SET `etatlivraison` = '".$val."',`idlivreur`=".$liv." WHERE `livraison`.`idliv` =".$idliv; 
		echo "<br>".$sql;
		$req=$db->prepare($sql);
		$req->execute();
	}
		public function modifierEtatLivraisonMor($livM,$val,$idliv)
	{
		echo $liv;
		$db=config::getConnexion();
		$sql="UPDATE `livraison` SET `etatlivraison` = '".$val."',`idLivMor`=".$livM." WHERE `livraison`.`idliv` =".$idliv; 
		echo "<br>".$sql;
		$req=$db->prepare($sql);
		$req->execute();
	}
public function Getlivraisondatecourante()
{ 

		  $list=[];
        $db = config::getConnexion(); //appel fonction static sans new
        $req = $db->query("select l.idliv from livraison l where l.datepreferee=curdate();");

    foreach ($req->fetchAll() as $liv)
    {
        $list[] = new Livraison($liv['idliv'], $liv['idclient'],$liv['idcom'],$liv['datepreferee'],$liv['etalivraison']);
     
    }

        return $list;
}
public function recupererlivraisondatecourante()
{

		$sql="select *from livraison l where l.datepreferee=curdate();";
		
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}
public function recupererlivraisonpardefaut()
{

		$sql="select *from livraison l where l.etatlivraison='pas_encore'";
		
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}
function afficherLivraisonDateCourante()
{
	$sql="select l.idliv from livraison l where  l.etatlivraison='pas_ecore' and l.datepreferee=curdate() ";
	$db = config::getConnexion()->prepare($sql);
	$db->execute();
	while ($result=$db->fetch(PDO::FETCH_ASSOC)) 
	{
		return $result[$c];
	}
}
function calculernombrelivraison()
{
	$sql="SELECT COUNT(*) from livraison";
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