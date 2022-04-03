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

if(isset($_SESSION["login"])){
    $login=$_SESSION["login"];
    $query="SELECT TAILLE, POIDS FROM utilisateur WHERE LOGIN='$login'";
    $result=$connexion->query($query);
    $data = $result->fetch_row();
    echo json_encode($data);
}
?>