<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/User/User.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$user = new User($db);

$result = $user->read_user();
//Get Row Count
$num = $result->rowCount();


if($num > 0){
    //Post Array
    $users_arr = array();
    $users_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $users_list = array(
            'i_recno' => $i_recno,
            'i_type' => $i_type,
            'i_item' => $i_item,
            'i_qty' => $i_qty,
            'i_remarks' => $i_remarks,
        );

        //push to data
        array_push($users_arr['data'], $users_list);
    }

    echo json_encode($users_arr);
}else{
    echo json_encode(
        array(
            'message'=>'No Users Found'
        )
    );
}
?>
