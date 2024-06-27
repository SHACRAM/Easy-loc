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
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="contract.php">Contract</a></li>
                <li><a href="billing.php">Billing</a></li>
            </ul>
        </nav>
    </header>

    <h1>Page contracts</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

    <label for="search">Entrer le numéro du contrat</label>
    <input type="text" name="search">
    <button type="submit">Rechercher</button>
    </form>
    
</body>
</html>


<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] =="POST"){
    $input = trim($_POST['search']);
    if ($input ===''){ 
        ?>
        <p>Merci de remplir le champs</p>
        <?php
    } else {
        $_SESSION["search"] = htmlspecialchars($input);
        header("Location: search_contract.php");
    }
}
?>
<a href="/create_contract.php">Créer un nouveau contrat.</a>