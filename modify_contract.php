<?php
session_start();

require_once(__DIR__ . '/functions.php');

$formData = $_SESSION['formData'];
//formulaire qui affichent les données actuelles du contrat et qui permet de les modifier

?>
<h1>Modifier le contrat</h1>
<form action="/post_modify.php" method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($formData['contract_id']); ?>">
    <div>
        <label for="vehicule">Entrer l'uid du véhicule</label>
        <input type="text" name="vehicule" value="<?php echo htmlspecialchars($formData['vehicule']); ?>" required>
    </div>
    <div>
        <label for="client">Entrer le numéro du client</label>
        <input type="text" name="client" value="<?php echo htmlspecialchars($formData['client']); ?>" required>
    </div>
    <div>
        <label for="date_signature">Date de signature du contrat</label>
        <input type="datetime-local" name="date_signature" value="<?php echo htmlspecialchars($formData['dateSignature']); ?>" required>
    </div>
    <div>
        <label for="date_debut_location">Date de début de la location</label>
        <input type="datetime-local" name="date_debut_location" value="<?php echo htmlspecialchars($formData['dateDebutLoc']); ?>" required>
    </div>
    <div>
        <label for="date_fin_location">Date de fin de la location</label>
        <input type="datetime-local" name="date_fin_location" value="<?php echo htmlspecialchars($formData['dateFinLoc']); ?>" required>
    </div>
    <div>
        <label for="date_retour_vehicule">Date de retour du véhicule</label>
        <input type="datetime-local" name="date_retour_vehicule" value="<?php echo htmlspecialchars($formData['dateRetour']); ?>" required>
    </div>
    <div>
        <label for="prix">Coût de la location</label>
        <input type="number" name="prix" step="0.01" min="0" placeholder="0.00" value="<?php echo htmlspecialchars($formData['prix']); ?>" required>
    </div>
    <button type="submit">Enregistrer le contrat</button>
</form>
<a href="/search_contract.php">Retourner à la page contrat</a>
<?php









?>