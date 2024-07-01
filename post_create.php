<?php
session_start();
require_once(__DIR__ . '/functions.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $create_contract = createContract($_POST);//envoie les données du formulaire pour créer un nouveau contrat
}

if($create_contract){
    ?>
    <p>Le contrat à bien été crée</p>
    <a href="/Contract.php">Retour à la page contrat</a>
    <?php
}else{
    ?>
    <p>Impossible de créer le contrat merci de vérifier les informations</p>
    <a href="/create_contract.php">Retour à la page contrat</a>

    <?php
}

?>
