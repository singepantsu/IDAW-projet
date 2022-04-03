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

if(isset($_POST["id_meal"])){
    $id = $_POST["id_meal"];
    $query = "SELECT RATIO, ID_NUTR FROM contient WHERE ID_ALI='$id' AND ID_NUTR IN ('1', '5', '6', '8', '9')";
    $results = $connexion->query($query);
    $data = $results->fetch_all();
    echo json_encode($data);
}
else{
    echo json_encode("failure");
}
?>