<?php

// $db = new mysqli("localhost", "cloud9homes", "S6kUfUK#L`v3MnA", "australia_db");

$sys_path = getcwd().'/inf_admin/base/db_conn.php';
include_once($sys_path);

// $db = new mysqli("localhost", "infc9hdb", "9Fhpj%97", "prodinfraveo_ausdb");
// echo $db->connect_error;
$conn = create_conn();
$data = $_GET['key'];
$array = array();
$sql = "SELECT suburb, postcode FROM infraveo_australia_db WHERE suburb LIKE '%$data%' OR postcode LIKE '%$data%'";
// echo $sql;
$result = $conn->query($sql);
while($row = mysqli_fetch_array($result)){
    $array[] = $row['suburb'].", ".$row['postcode'];
}
echo json_encode($array);
close_conn($conn);

?>