<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'imangermieux';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connexion = new mysqli($servername, $username, $password, $database);

if($connexion->connect_error){
    die('Erreur de connexion: ' .$connexion->connect_error);
};

$query = "SELECT * FROM sport";
$results = $connexion->query($query);
if ($results){
    $data = $results->fetch_all();
    echo json_encode($data);
}
else{
    echo json_encode("failure");
}
?>