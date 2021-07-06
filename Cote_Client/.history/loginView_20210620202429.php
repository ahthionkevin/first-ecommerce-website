<?php
     if(!isset($_SESSION))
        session_start();


    if(isset($_POST['seConnecter']))
    {
        if(!empty($_POST['mail']) && !empty($_POST['password']))
        {
            define("MYHOST","localhost");
            define("MYUSER","root");
            define("MYPASS","");
            $db="magasin";
    
            $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);

            $mail=$_POST['mail'];
            $password=$_POST['password'];

            $sql="SELECT * FROM client WHERE mail LIKE \"$mail\"";
            $result=mysqli_query($idcom,$sql);

            $coord=mysqli_fetch_row($result);

            if(empty($coord))
            {
                echo "LOGIN INCORRECT";
            }
            else
            {
                if($password==$coord[5])
                {
                    $_SESSION['id']=$coord[0];
                    if(isset($_GET['action']))
                        header("Location: addCommand.php");
                    else
                        header("Location: index.php");
                }
                else
                {
                    $err="Mot de Passe Incorrect";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ensa-Shop</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
        require("header.php");
    ?>
    <h2>LOGIN IN</h2>
    <?php if(isset($_GET['action'])):?>
    <form action="loginView.php?action=achat" method="post" class="read" autocomplete="off">
    <?php else:?>
    <form action="loginView.php" method="post" class="read" autocomplete="off">
    <?php endif?>
        <table>
            <tr>
                <td><label for="mail">LOGIN </label></td>
                <td><input type="text" name="mail" class="sign"></td>
            </tr>

            <tr>
                <td><label for="password">PASSWORD </label></td>
                <td><input type="password" name="password" class="sign"></td>
            </tr>
           
        </table>
        <?php if(isset($err)){echo  "<font color=\"red\">$err</font>";}?>
        <p>
            <a href="signInView.php">S'inscrire</a>
            <input type="submit" name="seConnecter" value="Se Connecter">
        </p>
    </form>
</body>
</html>