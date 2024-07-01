<?php
session_start();
//enregistre les données de l'ancien contrat dans la variable globale "$_SESSION" pour y avoir accès depuis la page de modification
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['formData'] = $_POST;
    header('Location: /modify_contract.php');
    exit();
} 
?>