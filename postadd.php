<?PHP

define('DEBUG', false);
error_reporting(E_ALL);

if (DEBUG)
{
    ini_set('display_errors', 'On');        
}
else
{
    ini_set('display_errors', 'Off');
}
include "imageup.php";
include "../entities/post.php";
include "../corp/blog.php";
if (isset($_POST['title']) and isset($_POST['description']) and isset($_POST['body']) and isset($_FILES['preview-input']) and isset($_FILES['header-input'])){
	if(isset($_POST['publish']))
	{
		$pub="1";
	}
	else
		$pub="0";
$obj=new blogpost("2",$_POST['title'],$_POST['description'],$_FILES['header-input']["name"],$_FILES['preview-input']['name'],$_POST['body'],$pub);

ajouterpost($obj);
imageupload($_FILES['preview-input'],$_FILES['header-input']);
/*$content = http_build_query (array (
'file1' => $_FILES['header-input'],
'file2' => $_FILES['preview-input']
));

$context = stream_context_create (array (
'http' => array (
'method' => 'POST',
'header'  => 'Content-Type: application/x-www-form-urlencoded',
'content' => $content
)
));

$result = file_get_contents("http://localhost/Front/Admin/views/imageup.php",null,$context); 
var_dump($result);*/
header('Location: index.php');

}
else
{ echo "failed"; die();}
?>