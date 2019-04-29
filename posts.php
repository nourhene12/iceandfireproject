<?php

include "../config.php";
include "../entities/post.php";
function getAllPosts()
{
	$db=config::connect();
	
		
		$sql = "SELECT * FROM posts";
	try{
		$posts=$db->query($sql);
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	

	return $posts;
}
function getPostAuthorById($user_id)
{
	$db=config::connect();
	$sql = "SELECT username FROM users WHERE id=$user_id";
	try{
		$user=$db->query($sql);
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	

	return $user;
}
?>