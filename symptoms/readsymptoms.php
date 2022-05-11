<?php
header("Access-Control-Allow-Methods: POST");
include "../conn.php";
$response = array();
$row = array();

if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM mysymptoms WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response[0] = $row;
    echo json_encode($response[0], JSON_PRETTY_PRINT);
} else if (isset($_GET["user_id"])) {
    $user_id = $_GET['user_id'];
    $sql = "SELECT * FROM mysymptoms WHERE user_id=$user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response[0] = $row;
    echo json_encode($response[0], JSON_PRETTY_PRINT);
} else {
    $sql = "SELECT * FROM mysymptoms";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response[0] = $row;
    echo json_encode($response[0], JSON_PRETTY_PRINT);
}
