<title>connexion</title>
<?php
class config {
    private static $instance = NULL;

    public static function getConnexion() {
      if (!isset(self::$instance)) {
		try{
        self::$instance = new PDO('mysql:host=localhost;dbname=ice&fire', 'root', '');
		self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return self::$instance;
    }
  }
 $conn = new mysqli("localhost","root","","ice&fire");
  if($conn->connect_error){
  	die("could not connect to the database".$conn->connect_error);
  }
?>