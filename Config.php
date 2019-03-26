<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: Chaabouni Mariem
 * Date: 09/10/2017
 * Time: 16:40
 */

class Config
{
    public function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "iceandfiredb";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //  echo "Connected to DB";
            return $conn;
        } catch
        (PDOException $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>


=======
<?php
/**
 * Created by PhpStorm.
 * User: Chaabouni Mariem
 * Date: 09/10/2017
 * Time: 16:40
 */

class Config
{
    public function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "iceandfiredb";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //  echo "Connected to DB";
            return $conn;
        } catch
        (PDOException $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>


>>>>>>> 99ae4a7fb067645f690785c8e5d968418b7f2187
