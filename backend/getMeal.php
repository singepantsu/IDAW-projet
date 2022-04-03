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

if (isset($_SESSION["login"])){
    $log = $_SESSION["login"];
    $query = "SELECT QUANTITE, DATE_CONSO, NOM_ALI FROM utilisateur INNER JOIN consomme USING (LOGIN) INNER JOIN aliment USING (ID_ALI) WHERE LOGIN = '$log'";
    $results = $connexion->query($query);
    if ($results){
        $data = $results->fetch_all();
        echo json_encode($data);
    }
    else{
        echo json_encode("failure");
    }
}
else{
    echo json_encode("failure");
}
?>