<?php
session_start();
require_once(__DIR__.'/functions.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = htmlspecialchars($_POST['billing_id']);
    $contract_id = htmlspecialchars($_POST['contract_id']);
    $montant = htmlspecialchars($_POST['montant']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une facture</title>
</head>
<body>
    <h1>Modifier la facture: <?php echo htmlspecialchars($id)?></h1>
    <form action="post_modify_billing.php" method="POST">
        <input type="hidden" name='id' value='<?php echo htmlspecialchars($id)?>'>
        <div>
            <label for="contract_id">Numéro de contrat</label>
            <input type="number" name="contract_id" required value='<?php  echo htmlspecialchars($contract_id)?>'>
        </div>
        <div>
            <label for="montant">Montant de la facture</label>
            <input type="number" name="montant" step="0.01" min="0" placeholder="0.00" required value='<?php  echo htmlspecialchars($montant)?>'>
        </div>
        <button type="submit">Valider</button>
    </form>
    
</body>
</html>