<?php
session_start();

require_once(__DIR__ . "/functions.php");

$search_contract = searchContract($_SESSION['search']);
if(isset($search_contract)){
    foreach($search_contract as $contract){
        ?>
        <div>
            <ul>
                <li><h2>Numéro de contrat : <?php echo($contract['id']);?></h2></li>
                <li>Véhicule UID : <?php echo($contract['Vehicle_uid']);?></li>
                <li>Client UID : <?php echo($contract['Customer_uid']);?></li>
                <li>Date de signature du contrat : <?php echo($contract['Sign_datetime']);?></li>
                <li>Date de début du contrat : <?php echo($contract['Loc_begin_datetime']);?></li>
                <li>Date de fin du contrat : <?php echo($contract['Loc_end_datetime']);?></li>
                <li>Date de retour du véhicule : <?php echo($contract['Returning_datetime']);?></li>
                <li>Prix de la location : <?php echo($contract['Price']);?> €</li>
            </ul>
            <form action="modify_contract.php" method="POST">
                <input type="hidden" name="contract_id" value="<?php echo $contract['id']; ?>">
                <button type="submit">Modifier le contrat</button>
            </form>
            <form action="delete_contract.php" method="POST">
                <input type="hidden" name="contract_id" value="<?php echo $contract['id']; ?>">
                <button type="submit">Supprimer le contrat</button>
            </form>
            <a href="contract.php">Faire une nouvelle recherche</a>
        </div>
        <?php
    }
}else{
    ?>
    <p>Aucun contrat n'a été trouvé.</p>
    <a href="contract.php">Revenir à la rechercher</a>
    <?php
}


?>