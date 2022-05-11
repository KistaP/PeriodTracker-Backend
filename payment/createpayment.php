<?php
include('../conn.php');

// data we get from the client
$amount=$_POST['amount'];
$description=$_POST['description'];
$customer_id=$_POST['customer_id'];
$khalti_no=$_POST['khalti'];



// array to store the response
$response = array();

$sql = "INSERT INTO perioddata (id,amount,description,customer_id,khalti) 
                VALUES (Null,:amount,:description,:customer_id,:khalti)";
$stmt = $conn->prepare($sql);

$stmt->execute(
    [
        ':amount'=>$amount,
        ':description'=>$description,
        ':customer_id'=>$customer_id,
        ':khalti'=>$khalti,
    ]
);
array_push($response, array("Status" => "Data Uploaded"));
// giving the response in json encoded format
echo (json_encode($response[0]));
