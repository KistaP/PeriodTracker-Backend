<?php
include('../conn.php');

// data we get from the client
$createddate=$_POST['createddate'];
$user_id=$_POST['user_id'];
$cycle_length=$_POST['cycle_length'];
$periodlength=$_POST['periodlength'];
$lastperioddate=$_POST['lastperioddate'];



// array to store the response
$response = array();

$sql = "INSERT INTO perioddata (id,createddate,user_id,cycle_length,periodlength,lastperioddate) 
                VALUES (Null,:createddate,:user_id,:cycle_length,:periodlength,:lastperioddate)";
$stmt = $conn->prepare($sql);

$stmt->execute(
    [
        
        ':createddate'=>$createddate,
        ':user_id'=>$user_id,
        ':cycle_length'=>$cycle_length,
        ':periodlength'=>$periodlength,
        ':lastperioddate'=>$lastperioddate,
    ]
);
array_push($response, array("Status" => "Data Uploaded"));
// giving the response in json encoded format
echo (json_encode($response[0]));
