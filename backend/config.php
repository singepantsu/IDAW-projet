<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'imangermieux';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die('Erreur de connexion: ' .$conn->connect_error);
};
$sql="Select * from utilisateur";
$result = $conn->query($sql);
$data = $result->fetch_row();
echo json_encode($data);
?>