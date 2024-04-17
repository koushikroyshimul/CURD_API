<?php

include "db_conn.php";

header('content-type: application/json');

$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        postmethod($data);
        break;

    default:
        break;
}

function postmethod($data) {
    include "db_conn.php"; 

    $name = $data["name"];
    $roll = $data["roll"];
    $dept = $data["dept"];
    $created_by = $data["created_by"];

    $sql = "INSERT INTO `first_table` (`name`, `roll`, `dept`, `created_by`) VALUES ('$name', '$roll', '$dept', '$created_by')";

    if(mysqli_query($conn,$sql)){
        echo "DATA INSERTED";
    }
    else {
        echo "ERROR";
    }
}


?>
