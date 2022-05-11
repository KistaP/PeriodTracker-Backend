<?php
include('conn.php');

// data we get from the client
$date = $_POST['date'];
$address = $_POST['address'];
$email = $_POST['email'];



// array to store the response
$response = array();

$sql = "INSERT INTO showrooms (id,date,address,email) 
                VALUES (Null,:date,:address,:email)";
$stmt = $conn->prepare($sql);

$stmt->execute(
    [
        ':date' => $date,
        ':address' => $address,
        ':email' => $email,

    ]
);
array_push($response, array("Status" => "Data Uploaded"));
// giving the response in json encoded format
echo (json_encode($response[0]));
