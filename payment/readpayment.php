<?php
header("Access-Control-Allow-Methods: POST");
include "../conn.php";
$response = array();
$row = array();

if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $sql = "SELECT pa.*, pr.username, pr.email,pr.date as createDate from payment pa Join profiles pr on pa.customerid = pr.id WHERE pa.user_id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $response[0] = $row;
    echo json_encode($response[0], JSON_PRETTY_PRINT);
} else {

    $sql = "SELECT pa.*, pr.username, pr.email,pr.date as createDate from payment pa Join profiles pr on pa.customerid = pr.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response[0] = $row;
    echo json_encode($response[0], JSON_PRETTY_PRINT);
}
