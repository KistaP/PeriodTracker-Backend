<?php
header("Access-Control-Allow-Methods: POST");
include "conn.php";


$username = $_POST['username'];
$email = $_POST['email'];
$notificationid = $_POST['notificationid'];
$password = $_POST['password'];
$date = $_POST['date'];



$chkSql = "SELECT email FROM profiles WHERE email = '$email'";
$emstmt = $conn->prepare($chkSql);
$emstmt->execute();
$response = array();
if ($emstmt->rowCount() > 0) {
    $response[0] = array(
        'status' => 'The account with the email and username or already exists.'
    );
    echo json_encode($response[0], JSON_PRETTY_PRINT);
} else {
    $sql = "INSERT INTO profiles (id,username,email,notificationid, password, date) VALUES 
    (Null, :username,:email,:notificationid, :password,:date)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(
        [
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ":notificationid"=>$notificationid,
            ':date' => $date,
        ]
    );
    $response[0] = array(
        'status' => 'Account created Successfully.'
    );
    echo json_encode($response[0], JSON_PRETTY_PRINT);
}