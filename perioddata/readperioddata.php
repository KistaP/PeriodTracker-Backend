<?php
header("Access-Control-Allow-Methods: POST");
include "../conn.php";
$response = array();
$row = array();

if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $sql = "SELECT * FROM perioddata WHERE user_id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $response[0] = $row;
    echo json_encode($response[0], JSON_PRETTY_PRINT);
} else {

    $sql = "SELECT * FROM perioddata";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response[0] = $row;
    echo json_encode($response[0], JSON_PRETTY_PRINT);
}
