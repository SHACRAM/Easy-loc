<?php
session_start();

require_once(__DIR__ . '/functions.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $update_contract = updateContract($_POST);//permet de soumettre les modifications du contrat
};

if($update_contract){//message de validation ou non en cas de modification
    ?>
    <p>Le contrat à été modifier</p>
    <a href="/search_contract.php">Retour au contrat</a>
    <?php
} else{
    ?>
    <p>Impossible de modifier le contrat</p>
    <a href="/search_contract.php">Retour au contrat</a>
    <?php
}


?>