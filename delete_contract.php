<?php
session_start();

require_once(__DIR__ . "/functions.php");
$id = $_POST['contract_id'];
?>
<form action="post_delete.php" method="POST">
    <input type="hidden" name="contract_id" value="<?php echo $id; ?>">
    <h1>Etes-vous sur de vouloir supprimer ce contrat?</h1>
    <button type="submit">Supprimer le contrat</button>
    <a href="search_contract.php">Retourner aux résultats de la recherche.</a>
</form>
<?php


?>