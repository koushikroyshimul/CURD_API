<?php

include "db_conn.php";

header('content-type: application/json');

$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        updatemethod($data);
        break;

    default:
        break;
}


function updatemethod($data) {
    include "db_conn.php"; 

    $id = $data["id"];
    $name = $data["name"];
    $roll = $data["roll"];
    $dept = $data["dept"];
    $created_by = $data["created_by"];

    $sql = "UPDATE `first_table` SET `name`='$name',`roll`='$roll',`dept`='$dept',`created_by`='$created_by' WHERE id = $id";

    $request = mysqli_query($conn,$sql);

    if($request){

        $affected_rows = mysqli_affected_rows($conn);
        
        if ($affected_rows > 0) {

            echo "Record updated successfully";
        } 

        else {

            echo "No records updated";
        }

    } 
    
    else {
        echo "Error updating record: ";
    }

    // if(mysqli_query($conn,$sql)){
    //     echo "DATA UPDATED";
    // }
    // else {
    //     echo "DATA NOT UPDATED";
    // }
    
}

?>
