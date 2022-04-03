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

if(isset($_SESSION["login"]) && isset($_POST['id_s'])){
    $log=$_SESSION["login"];
    $id_sport=$_POST['id_s'];
    $query = "DELETE FROM pratique WHERE `ID_SPORT`='$id_sport' AND `LOGIN`='$log'";
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