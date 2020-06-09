<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post/Post.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$post = new Post($db);

$result = $post->read_post();
//Get Row Count
$num = $result->rowCount();


if($num > 0){
    //Post Array
    $posts_arr = array();
    $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $posts_list = array(
            'id' => $id,
            'user_id' => $fld_user_id,
            'first_name' => $fld_first_name,
            'last_name' => $fld_last_name,
            'sex' => $fld_sex,
            'fld_post_desc' => $fld_post_desc,
            'post_date' => $fld_post_date,
            'image_path' => $fld_image_path,
        );

        //push to data
        array_push($posts_arr['data'], $posts_list);
    }

    echo json_encode($posts_arr);
}else{
    echo json_encode(
        array(
            'message'=>'No Post Found',
            'no_post'=>0
        )
    );
}
?>
