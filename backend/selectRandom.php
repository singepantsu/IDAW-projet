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

if(isset($_POST["imc"]) && isset($_POST["lvl"])){
    $imc=$_POST["imc"];
    $lvl=$_POST["lvl"];
    //adapte selon l'imc et le niveau de sport
    if ($imc > 20){
        if ($lvl > 4)
            $query="SELECT NOM_ALI FROM aliment WHERE ID_ALI IN (SELECT ID_ALI FROM contient WHERE (RATIO>150 AND (ID_NUTR IN ('5', '6', '8', '9'))) OR (RATIO>800 AND ID_NUTR='1'))";
        else
            $query="SELECT NOM_ALI FROM aliment WHERE ID_ALI IN (SELECT ID_ALI FROM contient WHERE (RATIO<150 AND (ID_NUTR IN ('5', '6', '8', '9'))) OR (RATIO>800 AND ID_NUTR='1'))";
    }
    else{
        if ($lvl > 4)
            $query="SELECT NOM_ALI FROM aliment WHERE ID_ALI IN (SELECT ID_ALI FROM contient WHERE (RATIO>150 AND (ID_NUTR IN ('5', '6', '8', '9'))) OR (RATIO<800 AND ID_NUTR='1'))";
        else
            $query="SELECT NOM_ALI FROM aliment WHERE ID_ALI IN (SELECT ID_ALI FROM contient WHERE (RATIO<150 AND (ID_NUTR IN ('5', '6', '8', '9'))) OR (RATIO<800 AND ID_NUTR='1'))";
    }
    $result=$connexion->query($query);
    if ($result){
        $data = $result->fetch_all();
        echo json_encode($data);
    }
    else
    echo json_encode('failure');
}
else
    echo json_encode('failure');
?>