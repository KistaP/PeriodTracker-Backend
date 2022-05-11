<?php
header("Access-Control-Allow-Methods: POST");
include "../conn.php";
$response = array();
$row = array();

$sql = "SELECT * FROM healthtips";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
$response[0] = $row;
echo json_encode($response[0], JSON_PRETTY_PRINT);
