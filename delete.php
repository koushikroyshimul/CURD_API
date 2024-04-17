<?php

include "db_conn.php";

header('content-type: application/json');

$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case 'DELETE':
        $data = json_decode(file_get_contents('php://input'), true);
        deletemethod($data);
        break;

    default:
        break;
}


function deletemethod($data) {
    include "db_conn.php"; 

    $id = $data["id"];

    $sql = "DELETE FROM `first_table` WHERE id = $id";

    $request = mysqli_query($conn,$sql);

    if($request){

        $affected_rows = mysqli_affected_rows($conn);
        
        if ($affected_rows > 0) {

            echo "Record deleted successfully";
        } 

        else {

            echo "No records deleted";
        }

    } 
    
    else {
        echo "Error updating record: ";
    }
}

?>
