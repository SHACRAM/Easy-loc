<?php
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/dataBaseConnect.php');

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
?>