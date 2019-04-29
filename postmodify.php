<?PHP
include "../entities/post.php";
include "../corp/blog.php";
if($_GET['true']=="1")
{
delete($_GET['id']);
}
else
{
echo "slm";
if (isset($_POST['text-input']) and isset($_POST['description-input']) and isset($_POST['textarea-input'])){
$obj=new blogpost("1",$_POST['text-input'],$_POST['description-input'],"","",$_POST['textarea-input'],"1");
$obj->setId($_POST['idp']);
modifierpost($obj);
}

header('Location: index.php'); 
?>