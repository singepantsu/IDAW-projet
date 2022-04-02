<?php
    session_start();
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'imangermieux';

    $connexion = new mysqli($servername, $username, $password, $database);

    if($connexion->connect_error){
        die('Erreur de connexion: ' .$connexion->connect_error);
    }

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
        $query = "INSERT INTO utilisateur (`LOGIN`, DATE_NAISSANCE, TAILLE, AGE, POIDS, SEXE, NOM_UTIL, PRENOM_UTIL, MDP) VALUES ('$login', '$dateNaissance', '$height', '$age', '$weight', '$sex', '$name', '$surname', '$password')";
        $result = $connexion->query($query);
        if($result)
            $_SESSION["login"]=$login;
            echo $connection->insert_id;
    }
?>