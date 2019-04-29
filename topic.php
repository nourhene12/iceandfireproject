<?php
include("../config.php");
function display(){$sql="SELECT * FROM forum_question ORDER BY id DESC";
// OREDER BY id DESC is order result by descending
$db = config::connect();
$result=$db->query($sql);

return $result;
}

function delete($id){$sql="DELETE FROM forum_question where id=$id";
// OREDER BY id DESC is order result by descending
$db = config::getConnexion();
$result=$db->query($sql);

return $result;
}

function update($id,$topic,$details){
$sql="UPDATE forum_question SET topic=:topic , detail=:detail WHERE id=:id";
$db = config::getConnexion();
$req=$db->prepare($sql);
$req->bindValue(":id",$id);
$req->bindValue(":topic",$topic);
$req->bindValue(":detail",$details);
$result=$req->execute();

return $result;
}

?>