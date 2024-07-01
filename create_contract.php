<?php
session_start();
//Formulaire à remplir par l'utilisateur pour renseigner les informations du nouveau contrat
?>
<h1>Ajouter un nouveau contrat</h1>
<form action="/post_create.php" method="POST">
    <div>
        <label for="vehicule">Entrer l'uid du véhicule</label>
        <input type="text" name="vehicule" required>
    </div>
    <div>
        <label for="client">Entrer le numéro du client</label>
        <input type="text" name="client" required>
    </div>
    <div>
        <label for="date_signature">Date de signature du contrat</label>
        <input type="datetime-local" name="date_signature" required>
    </div>
    <div>
        <label for="date_debut_location">Date de début de la location</label>
        <input type="datetime-local" name="date_debut_location" required>
    </div>
    <div>
        <label for="date_fin_location">Date de fin de la location</label>
        <input type="datetime-local" name="date_fin_location" required>
    </div>
    <div>
        <label for="date_retour_vehicule">Date de retour du véhicule</label>
        <input type="datetime-local" name="date_retour_vehicule" required>
    </div>
    <div>
        <label for="prix">Coût de la location</label>
        <input type="number" name="prix" step="0.01" min="0" placeholder="0.00" required>
    </div>
    <button type="submit">Enregistrer le contrat</button>
</form>
<a href="/Contract.php">Retourner à la page contrat</a>
<?php
?>