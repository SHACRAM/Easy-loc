<?php
session_start();

require_once(__DIR__ . '/functions.php');

$search_billing = searchBilling($_SESSION['search']);

if(isset($search_billing)){
    foreach($search_billing as $billing){
        ?>
            <div>
                <h2>Facture numéro : <?php echo htmlspecialchars($billing['id']);?></h2>
                <p>Contrat numéro :  <?php echo htmlspecialchars($billing['contract_id'])?></p>
                <p>Montant de la facture : <?php echo htmlspecialchars($billing['amount'])?> €</p>
            </div>
            <form action="modify_billing.php" method="POST">
                <input type="hidden" name="billing_id" value="<?php echo htmlspecialchars($billing['id'])?>">
                <input type="hidden" name="contract_id" value="<?php echo htmlspecialchars($billing['contract_id'])?>">
                <input type="hidden" name="montant" value="<?php echo htmlspecialchars($billing['amount'])?>">
                <button type="submit">Modifier</button>
            </form>
            <form action="delete_billing" method="POST">
                <input type="hidden" name="billing_id" value="<?php echo htmlspecialchars($billing['id'])?>">
                <button type="submit">Supprimer</button>
            </form>
            <a href="/billing.php">Faire une nouvelle recherche de facture</a>
            
        <?php
    
    }


}else{
    ?>
    <p>Aucune facture trouvée</p>
    <a href="/billing.php">Faire une nouvelle recherche de facture</a>
    <?php
}
?>