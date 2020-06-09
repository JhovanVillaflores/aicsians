<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

include_once '../../config/Database.php';
include_once '../../models/Post/Post.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$post= new Post($db);

$post_id = $_GET['post_id'];
$post->id = $post_id;

$post->delete_post();
?>
