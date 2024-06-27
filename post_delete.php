<?php
session_start();

require_once(__DIR__ . "/functions.php");

if(!isset($_POST['contract_id'])){
    $_SESSION['message'] = "L'identifiant fourni est inconnu.";
    header('Location: /contract.php');
    exit();
}

$id = $_POST['contract_id'];

$result_delete = deleteContract($id);

if (!$result_delete) {
    ?>
    <p>Impossible de suprimer le contrat</p>
    <a href="/search_contract.php">Revenir au résultat de la recherche</a>
<?php
} else {
    ?>
    <p>Le contrat à bien été suprimé!</p>
    <a href="/contract.php">Revenir à la page contrat</a>
    <?php
}
?>