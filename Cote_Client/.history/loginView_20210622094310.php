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

    <title>Ensa-Shop</title>
    <!-- basic -->
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Frica</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
     
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <!-- Scrollbar Custom CSS -->
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
   
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
        require("header.php");
    ?>

     
      <!-- catagary section start -->
      <div class="catagary_section layout_padding">
         <div class="container">
            <div class="catagary_main">
               <div class="catagary_left">
                  <h2 class="categary_text">COMMANDER EN TOUTE SECURITE AVEC NOUS</h2>
               </div>
               <div class="catagary_right">
                  <div class="catagary_menu">
                     <p></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- catagary section end -->


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