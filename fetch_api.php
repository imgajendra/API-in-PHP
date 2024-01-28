<?php
//DB CONNECTION
$conn = mysqli_connect('localhost' , 'root','' , 'api_db');

//CHECK CONNECTION
if ($conn) {
    // CONFIGURATION FOR JSON 
    header('Content-Type: application/json; charset=utf-8');

    //FETCH DATA FROM DATABASE
    $result = mysqli_query($conn , "select * from api_table");

    if ($result) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            # code...
             $response[$i]['id'] = $row['id'];
             $response[$i]['name'] = $row['fname'];
             $response[$i]['lname'] = $row['lname'];
             $response[$i]['password'] = $row['password'];
        }
        //CONVERTS IN JSON
        echo json_encode($response , JSON_PRETTY_PRINT);
    }
    
}else{
    echo "disconnected";
}



?>