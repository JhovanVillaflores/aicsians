<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Search/Search.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$search= new Search($db);

$keyword = $_GET['keyword'];
$uid = $_GET['uid'];
$search->keyword = '%'.$keyword.'%';
$search->uid = $uid;

$search->search_data();
?>
