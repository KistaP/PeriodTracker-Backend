<?php
include('conn.php');

// data we get from the client
$id = $_GET['id'];

// array to store the response
$response = array();

$sql = "UPDATE profiles SET premium=1 WHERE id=$id";
$stmt = $conn->prepare($sql);

$stmt->execute();
array_push($response, array("Status" => "Profile Updated"));
// giving the response in json encoded format
echo (json_encode($response[0]));
