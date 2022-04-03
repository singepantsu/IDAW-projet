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

if(isset($_SESSION["login"]) && isset($_POST['sport_id']) && isset($_POST['level'])){
    $log=$_SESSION["login"];
    $id_sport=$_POST['sport_id'];
    $lvl=$_POST['level'];
    $query = "INSERT INTO `pratique` (`LOGIN`, `NIVEAU`, `ID_SPORT`) VALUES ('$log', '$lvl', '$id_sport') ";
    $results = $connexion->query($query);
    if ($results){
        echo json_encode("Success");
    }
    else
        echo json_encode("failure");
}
else{
    echo json_encode("failure");
}
?>