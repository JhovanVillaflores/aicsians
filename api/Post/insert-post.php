<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

include_once '../../config/Database.php';
include_once '../../models/Post/Post.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$post = new Post($db);

//$data = json_decode(file_get_contents("php://input"));
//print_r($_POST);
$post->user_id = $_POST['user_id'];
$post->post_desc = $_POST['post_desc'];


if($post->insert_post()) {
}else{
    echo json_encode(
        array(
            'message'=>'Post Successfully',
            'uid'=>$post->user_id
        )
    );
}
