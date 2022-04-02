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

if (isset($_POST["log"]) && (isset($_POST["pass"]))){
    $login=$_POST["log"];
    $password=$_POST["pass"];
    $sql="Select * from utilisateur where LOGIN='".$login."' and MDP='".$password."'";
    $result = $connexion->query($sql);
    $data = $result->fetch_row();
    if (!empty($data)){
        $_SESSION["login"]=$login;
        echo json_encode($data);
    }
    else{
        echo json_encode("failure");
    }
}
else{
    echo json_encode("failure");
};
?>