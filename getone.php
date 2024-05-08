<?php

include "db_conn.php";

header('content-type: application/json');

$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case 'GET':
        $data = json_decode(file_get_contents('php://input'), true);
        getLatestData();
        break;

    default:
        break;
}

function getLatestData() {
    include "db_conn.php"; 

    $sql = "SELECT * FROM first_table ORDER BY id DESC LIMIT 1";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);
        
        echo json_encode($row);
    }

    else{
        echo "Request Not Found";
    }
}

?>
