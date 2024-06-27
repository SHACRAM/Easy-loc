<?php
session_start();
?>
<h1>Ajouter un nouveau contrat</h1>
<form action="/post_create.php" method="POST">
    <div>
        <label for="vehicule">Entrer l'uid du véhicule</label>
        <input type="text" name="vehicule" require>
    </div>
    <div>
        <label for="client">Entrer le numéro du client</label>
        <input type="text" name="client" require>
    </div>
    <div>
        <label for="date_signature">Date de signature du contrat</label>
        <input type="datetime-local" name="date_signature" require>
    </div>
    <div>
        <label for="date_debut_location">Date de début de la location</label>
        <input type="datetime-local" name="date_debut_location" require>
    </div>
    <div>
        <label for="date_fin_location">Date de fin de la location</label>
        <input type="datetime-local" name="date_fin_location" require>
    </div>
    <div>
        <label for="date_retour_vehicule">Date de retour du véhicule</label>
        <input type="datetime-local" name="date_retour_vehicule" require>
    </div>
    <div>
        <label for="prix">Coût de la location</label>
        <input type="number" name="prix" step="0.01" min="0" placeholder="0.00" required>
    </div>
    <button type="submit">Enregistrer le contrat</button>
</form>


<?php



?>