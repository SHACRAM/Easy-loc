<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $input = trim($_POST['search_billing']);
    if($input === ''){
        ?>
        <p>Merci de remplir ce champs</p>
        <?php
    }else{
        $_SESSION["search"] = htmlspecialchars($input);
        header('Location:search_billing.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy-Loc</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="contract.php">Contract</a></li>
                <li><a href="billing.php">Billing</a></li>
                
            </ul>
        </nav>
    </header>

    <h1>Page Billing</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="search_billing">Entrer le numéro d'une facture</label>
        <input type="text" name="search_billing" required>
        <button type="submit">Rechercher</button>
    </form>
    <a href="/create_billing.php">Créer une nouvelle facture</a>
    
</body>
</html>

