<?php
session_start();
require_once(__DIR__ . '/functions.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $contract_id = htmlspecialchars(trim($_POST['contract_id']));
    $montant = htmlspecialchars(trim($_POST['montant']));

    $create_billing = createBilling($contract_id, $montant);

    if($create_billing){
        ?>
        <p>La facture à été crée</p>
        <a href="billing.php">Retourner à la page facture</a>
        <?php
    }else{
        ?>
        <p>Numéro de contrat inconnu</p>
        <a href="create_billing.php">Créer une nouvelle facture</a>
        <?php
    }
    
}else{
    ?>
    <p>Impossible de créer la facture</p>
    <a href="billing.php">Retourner à la page billing</a>
    <?php
}


?>