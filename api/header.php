<?php

// Headers
// accessable by anyone
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

// Instantiate  and Connect DB 
$database = new Database();
$db = $database->connect();