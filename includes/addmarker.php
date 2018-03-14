<?php
require_once("connectToDB.php");

// todo add informaton about plant varieties found
// Gets data from URL parameters.
$name = $_GET['name'];
$address = $_GET['address'];
$phone = $_GET['phone'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$type = $_GET['type'];


// Inserts new row with place data.
$sql = "INSERT INTO markers (owner, address, phone, lat, lng, type) VALUES (?,?,?,?,?,?)";

$q = $_db->prepare($sql);
$q->execute([$name, $address, $phone, $lat, $lng, $type]);

?>