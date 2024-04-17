<?php

include "db_conn.php";

header('content-type: application/json');

$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case 'GET':
        $data = json_decode(file_get_contents('php://input'), true);
        getmethod($data);
        break;

    default:
        break;
}


function getmethod($data) {
    include "db_conn.php"; 

    $sql = "SELECT * FROM first_table";

    $request = mysqli_query($conn,$sql);

    if(mysqli_num_rows($request)>0){

        $row = array();

        while($r = mysqli_fetch_assoc($request)){
            $row[] = $r;
        }

        echo json_encode($row);
    }

    else{
        echo "Request Not Found";
    }
}

?>