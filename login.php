<?php
header("Access-Control-Allow-Methods: POST");
include "conn.php";
$email = $_GET['email'];
$password = $_GET['password'];
$response = array();
$sql = "SELECT * FROM profiles WHERE email='$email'";
$stmt = $conn->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    $response[0] = array(
        'status' => "Account with the email doesn't exist."
    );
    echo json_encode($response[0], JSON_PRETTY_PRINT);
} else {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row['email'] == $email && $row['password'] == $password) {
        $response[0] = $row;
        echo json_encode($response[0], JSON_PRETTY_PRINT);
    } else {
        $response[0] = array(
            'status' => "Invalid Credentials."
        );
        echo json_encode($response[0], JSON_PRETTY_PRINT);
    }
}