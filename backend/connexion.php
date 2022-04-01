<?php
require "config.php";

function connected(){
    return isset($_SESSION["username"]);
}

function connexion(){
    if (!connected()){
        $_SESSION["username"];
    }

}

function decconnexion(){
    if (!connected()){
        session_unset();
        session_destroy();
    }
}
?>