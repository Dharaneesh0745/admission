<?php

@include 'config.php';

$query = $conn->query("SELECT * FROM enquiryform2");
$fetched = array();

while($data = $query->fetch_assoc()){
    $fetched[] = $data;
}
header('Content-Type: application/json');
echo json_encode($fetched);
?>