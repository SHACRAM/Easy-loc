<?php
require_once(__DIR__ . '/config/mysql.php');

try {
    $mysqlClient = new PDO('mysql:host=' . mysql_host . ';port=3306;dbname=' . mysql_dbname . ';charset=utf8', mysql_user, mysql_password);
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

?>