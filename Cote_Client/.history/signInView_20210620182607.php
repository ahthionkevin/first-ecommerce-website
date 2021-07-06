<?php
     if(!isset($_SESSION))
        session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ensa-shop</title>
    <link rel="stylesheet" href="style1.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
        require("header.php");
    ?>

    <?php


    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['mail']) && isset($_POST['password']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse']) && !empty($_POST['mail']) && !empty($_POST['password']))
    {     
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $mail=$_POST['mail'];
        $password=$_POST['password'];
        
        define("MYHOST","localhost");
        define("MYUSER","root");
        define("MYPASS","");
        $db="magasin";
        
        $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);
        
    $sql="INSERT INTO client (nom,prenom,adresse,mail,`password`) VALUES(\"$nom\",\"$prenom\",\"$adresse\",\"$mail\",\"$password\")";

        $result=mysqli_query($idcom,$sql);
        if($result)
            echo "<script>alert(\"VOS DONNEES ONT ETE AJOUTE AVEC SUUCES\");window.location(\"loginView.php\")</script>";
        else
            echo "<script>alert(\"ERREUR D ENVOI DE DONNEE\");window.location(\"index.php\")</script>";

        mysqli_close($idcom);
    }
    else
        echo "<font color=\"red\">VEUILLEZ REMPLIR TOUS LES CHAMPS</font>";
        //echo "<script>alert(\"VEUILLEZ REMPLIR TOUS LES CHAMPS\");window.location(\"signInView.php\")</script>";

    ?>
    <h2>SIGN IN</h2>
    <form action="signInView.php" method="post" class="read" autocomplete="off">
        <table>
            <tr>
                <td><label for="nom">NOM: </label></td>
                <td><input type="text" name="nom" class="sign"></td>
            </tr>

            <tr>
                <td><label for="prenom">PRENOM: </label></td>
                <td><input type="text" name="prenom" class="sign"></td>
            </tr>

            <tr>
                <td><label for="adresse">ADRESSE: </label></td>
                <td><input type="text" name="adresse" class="sign"></td>
            </tr>

            <tr>
                <td><label for="mail">MAIL: </label></td>
                <td><input type="email" name="mail" class="sign"></td>
            </tr>
            
            <tr>
                <td><label for="password">PASSWORD: </label></td>
                <td><input type="password" name="mail" class="sign"></td>
            </tr>


        </table>

        <p>
            <input type="submit" value="Enregistrer" name="enregistrer">
        </p>
    </form>
</body>
</html>