<?php
session_start();
require_once(__DIR__.'/functions.php');

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $modify_billing = modifyBilling($_POST);
}

if($modify_billing){
    ?>
    <p>La facture à bien été modifié</p>
    <a href="billing.php">Chercher une nouvelle facture</a>
    <?php
    
}else{
    ?>
    <p>Contrat inconnu</p>
    <a href="/search_billing.php">Revenir à la facture</a>
    <?php
}


?>