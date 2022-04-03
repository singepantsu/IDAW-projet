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

if (isset($_SESSION["login"]) && isset($_POST["date"]) && isset($_POST["quant"]) && isset($_POST["name"])){
    $log = $_SESSION["login"];
    $date = $_POST["date"];
    $quant = $_POST["quant"];
    $name = $_POST["name"];
    $query = "INSERT INTO `consomme` (`QUANTITE`, `DATE_CONSO`, `ID_ALI`, `LOGIN`) VALUES ('$quant', '$date', '$name', '$log')";
    $results = $connexion->query($query);
    if ($results){
        echo json_encode("Victory");
    }
    else{
        echo json_encode("Failure");
    }
    
}
?>