<?php
include('../conn.php');

// data we get from the client
$url = $_POST['link'];



// array to store the response
$response = array();

$sql = "INSERT INTO healthtips (id,url) VALUES (Null,'$url')";
$stmt = $conn->prepare($sql);

$stmt->execute();
array_push($response, array("Status" => "Data Uploaded"));
// giving the response in json encoded format
echo (json_encode($response[0]));
