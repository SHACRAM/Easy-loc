<?php
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/dataBaseConnect.php');

//fonction qui permet de rechercher un contrat dans la base de données avec son id

function searchContract($search){
    global $mysqlClient;

    $mysql_search = $mysqlClient->prepare('SELECT * FROM Contract WHERE id = :id');
    $mysql_search->bindParam(':id', $search, PDO::PARAM_INT);

    $mysql_search->execute();
    $result_contrat = $mysql_search->fetchAll();

    if (count($result_contrat) === 0) {
        return null;
    } else {
        return $result_contrat;
    }
}


//fonction qui permet de supprimer un contrat
function deleteContract($id){
    global $mysqlClient;

    $mysql_delete = $mysqlClient->prepare('DELETE FROM Contract WHERE id = :id');
    $mysql_delete->bindParam(':id', $id, PDO::PARAM_INT);

    $mysql_delete->execute();
    $result_delete = $mysql_delete->fetchAll();

    if ($mysql_delete->rowCount() > 0) {
        return true; 
    } else {
        return false; 
    }  
}

//fonction qui permet de créer un nouveau contrat
function createContract(){
    global $mysqlClient;

    $vehicule = $_POST['vehicule'];
    $client =$_POST['client'];
    $dateSignature = $_POST['date_signature'];
    $dateDebutLoc = $_POST['date_debut_location'];
    $dateFinLoc = $_POST['date_fin_location'];
    $dateRetour = $_POST['date_retour_vehicule'];
    $prix = $_POST['prix'];

    $mysql_create = $mysqlClient->prepare('INSERT INTO Contract(Vehicle_uid, Customer_uid, Sign_datetime, Loc_begin_datetime,  Loc_end_datetime, Returning_datetime, Price) VALUES (:vehicule, :client, :dateSignature, :dateDebutLoc, :dateFinLoc, :dateRetour, :prix)');

    $mysql_create->execute([
        'vehicule'=>$vehicule,
        'client'=>$client,
        'dateSignature'=>$dateSignature,
        'dateDebutLoc'=>$dateDebutLoc,
        'dateFinLoc'=>$dateFinLoc,
        'dateRetour'=>$dateRetour,
        'prix'=>$prix
    ]);

    $result_create = $mysql_create->fetchAll();

    if ($mysql_create->rowCount()>0){
        return true;
    }else{
        return false;
    }
}
//fonction qui permet de mettre à jour un contrat existant
function updateContract(){
    global $mysqlClient;

    if (!isset($_POST['id'], $_POST['vehicule'], $_POST['client'], $_POST['date_signature'], $_POST['date_debut_location'], $_POST['date_fin_location'], $_POST['date_retour_vehicule'], $_POST['prix'])) {
        return false;
    }

    $id = $_POST['id'];
    $vehicule = $_POST['vehicule'];
    $client =$_POST['client'];
    $dateSignature = $_POST['date_signature'];
    $dateDebutLoc = $_POST['date_debut_location'];
    $dateFinLoc = $_POST['date_fin_location'];
    $dateRetour = $_POST['date_retour_vehicule'];
    $prix = $_POST['prix'];

    $mysql_update = $mysqlClient->prepare('UPDATE Contract SET Vehicle_uid = :vehicule, Customer_uid=:client, Sign_datetime = :dateSignature, Loc_begin_datetime = :dateDebutLoc, Loc_begin_datetime = :dateFinLoc, Returning_datetime = :dateRetour, Price= :prix WHERE id = :id');

    $mysql_update->execute([
        'id'=>$id,
        'vehicule'=>$vehicule,
        'client'=>$client,
        'dateSignature'=>$dateSignature,
        'dateDebutLoc'=>$dateDebutLoc,
        'dateFinLoc'=>$dateFinLoc,
        'dateRetour'=>$dateRetour,
        'prix'=>$prix
    ]);

    $result_update = $mysql_update->fetchAll();

    if ($mysql_update->rowCount()>0){
        return true;
    }else{
        return false;
    }
}
//Permet de rechercher une facture par son id
function searchBilling($search){
    global $mysqlClient;

    $billing = $mysqlClient->prepare('SELECT * FROM Billing WHERE id = :id');
    $billing->bindParam(':id', $search, PDO::PARAM_INT);

    $billing->execute();
    $result_billing = $billing->fetchAll();

    if(count($result_billing)===0){
        return null;
    }else{
        return $result_billing;
    }
}

function createBilling($numbContract, $amount) {
    global $mysqlClient;

    try {
        $mysqlClient->beginTransaction();

        // Vérification si le contrat existe
        $check_contract = $mysqlClient->prepare('SELECT id FROM Contract WHERE id = :id');
        $check_contract->execute(['id' => $numbContract]);
        $contract = $check_contract->fetch(PDO::FETCH_ASSOC);

        if ($contract) {
            $create_billing = $mysqlClient->prepare('INSERT INTO Billing(contract_id, amount) VALUES (:id, :amount)');
            $create_billing->execute([
                'id' => $numbContract,
                'amount' => $amount
            ]);
            $mysqlClient->commit();
            return true;
        } else {
            // Le contrat n'existe pas, annulation de la transaction
            $mysqlClient->rollBack();
            return false;
        }
    } catch (PDOException $e) {
        // Affiche l'erreur
        $mysqlClient->rollBack();
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

function modifyBilling(){ //Permet de modifier une facture en vérifiant dabord si le contrat existe
    global $mysqlClient;

    if(!isset($_POST['id'], $_POST['contract_id'], $_POST['montant'])){
        return false;
    }

    $id = $_POST['id'];
    $contract_id = $_POST['contract_id'];
    $montant = $_POST['montant'];

    try {
        $mysqlClient->beginTransaction();

        $check_contract = $mysqlClient->prepare('SELECT id FROM Contract WHERE id = :id');
        $check_contract->execute(['id' => $contract_id]);

        if ($check_contract->rowCount() > 0) {
            $modify_billing = $mysqlClient->prepare('UPDATE Billing SET contract_id = :contract_id, amount = :montant WHERE id = :id');
            $modify_billing->execute([
                'contract_id' => $contract_id,
                'montant' => $montant,
                'id' => $id
            ]);

            $mysqlClient->commit();
            return true;
        } else {
            $mysqlClient->rollBack();
            return false;
        }
    } catch (PDOException $e) {
        $mysqlClient->rollBack();
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}


?>