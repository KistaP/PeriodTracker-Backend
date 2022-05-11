<?php
include('../conn.php');

// data we get from the client
$user_id = $_POST['user_id'];
$update_date = $_POST['update_date'];
$symptoms = $_POST['symptoms'];
$period_start_date = $_POST['period_start_date'];
$period_end_date = $_POST['period_end_date'];

// array to store the response
$response = array();


$sql0 = "SELECT  * from mysymptoms WHERE user_id=$user_id AND period_start_date='$period_start_date' AND period_end_date='$period_end_date'";

$stmt0 = $conn->prepare($sql0);
$stmt0 ->execute();
if ($stmt0->rowCount() > 0) {
    $sql = "UPDATE mysymptoms SET symptoms='$symptoms' WHERE user_id=$user_id  AND period_start_date='$period_start_date' AND period_end_date='$period_end_date'";
    $stmt = $conn->prepare($sql);

    $stmt->execute();
    array_push($response, array("Status" => "Data Uploaded"));
    // giving the response in json encoded format
    echo (json_encode($response[0]));
} else {
    $sql = "INSERT INTO mysymptoms (id,user_id,update_date,symptoms,period_start_date,period_end_date) VALUES (NUll,'$user_id','$update_date','$symptoms','$period_start_date','$period_end_date')";
    $stmt = $conn->prepare($sql);

    $stmt->execute();
    array_push($response, array("Status" => "Data Uploaded"));
    // giving the response in json encoded format
    echo (json_encode($response[0]));
}
