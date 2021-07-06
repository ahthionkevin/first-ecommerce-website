<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AJOUTER PRODUIT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require("header.php");
    ?>
    <h2>AJOUTER PRODUIT</h2>
    <form action="addProduct.php" method="post" class="read" autocomplete="off">
        <table>
            <tr>
                <td><label for="nom">NOM PRODUIT </label></td>
                <td><input type="text" name="nom" class="sign"></td>
            </tr>

            <tr>
                <td><label for="prenom">PRENOM </label></td>
                <td><input type="text" name="prenom" class="sign"></td>
            </tr>

            <tr>
                <td><label for="adresse">ADRESSE </label></td>
                <td><input type="text" name="adresse" class="sign"></td>
            </tr>

            <tr>
                <td><label for="mail">MAIL </label></td>
                <td><input type="email" name="mail" class="sign"></td>
            </tr>

        </table>

        <p>
            <input type="submit" value="Enregistrer">
        </p>
    </form>
</body>
</html>