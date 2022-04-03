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

if (isset($_POST["name_add"])){
    $name=$_POST["name_add"];
    $query="SELECT ID_ALI FROM aliment WHERE NOM_ALI='$name'";
    $results=$connexion->query($query);
    if ($results->num_rows == 0){
        echo json_encode("failure");
    }
    else{
        $data=$results->fetch_row();
        echo json_encode($data);
    }
}
else{
    echo json_encode("failure");
}
?>