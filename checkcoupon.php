<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02/05/2018
 * Time: 22:24
 */

header('Content-type: application/json');

include "../../config.php";

if(isset($_POST['coupon']))
{
    $db = config::getConnexion(); //appel fonction static sans new

    $sql = "select * from offre where codepromo = :codepromo ";
    $req=$db->prepare($sql);
    $req->bindValue(":codepromo",$_POST['coupon']);
    $req->execute();
    if ($req->fetch()) {
        echo json_encode($req->fetch()); //return js array instead of js object
    }
    else
    {
        echo "Coupon invalide";
    }
}else
{
    echo "error";

}

?>