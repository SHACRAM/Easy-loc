<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une nouvelle facture</title>
</head>
<body>
    <h1>Créer une nouvelle facture</h1>
    <form action="post_create_billing.php" method="POST">
        <div>
            <label for="contract_id">Numéro de contrat</label>
            <input type="number" name="contract_id" required>
        </div>
        <div>
            <label for="montant">Montant de la facture</label>
            <input type="number" name="montant" step="0.01" min="0" placeholder="0.00" required>
        </div>
        <button type="submit">Valider</button>
    </form>
    <a href="billing.php">Retoruner à la page facture</a>
    
</body>
</html>