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

if(isset($_POST['login']) && isset($_POST['mdp']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['birthday']) && isset($_POST['height']) && isset($_POST['weight']) && isset($_POST['age']) && isset($_POST['sex'])){
    $login = $_POST['login'];
    $password = $_POST['mdp'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $dateNaissance = $_POST['birthday'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $query = "UPDATE `utilisateur` SET DATE_NAISSANCE = '$dateNaissance', `TAILLE` = '$height', `AGE` = '$age', `POIDS` = '$weight', `SEXE` = '$sex', `NOM_UTIL` = '$name', `PRENOM_UTIL` = '$surname', `MDP` = '$password' WHERE `LOGIN`='$login' ";
    $result=$connexion->query($query);
    if ($result){
        echo json_encode($login);
    }
    else{
        echo json_encode("failure");
    }
}
else{
    echo json_encode("failure");
}
?>