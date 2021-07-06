<?php
     if(!isset($_SESSION))
        session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Frica</title>
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
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
                  <h2 class="categary_text">SIGN IN</h2>
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

    <?php

    if(isset($_POST['enregistrer']))
    {
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
        {
            $sql1="SELECT * FROM client ORDER BY id_client DESC";
            $result1=mysqli_query($idcom,$sql1);
            $coord1=mysqli_fetch_row($result1);

            $monfichier = fopen('../tp1_2/passwd.txt', 'a+');
            fputs($monfichier, $coord1[0] . ':' . $password  . "\n");

            fclose($monfichier);

            echo "<script>alert(\"VOS DONNEES ONT ETE AJOUTE AVEC SUUCES\");/*window.location(\"loginView.php\")*/</script>";
        }
            
        else
            echo "<script>alert(\"ERREUR D ENVOI DE DONNEE\");window.location(\"index.php\")</script>";

        mysqli_close($idcom);
    }
    else
        echo "<font color=\"red\">VEUILLEZ REMPLIR TOUS LES CHAMPS</font>";
        //echo "<script>alert(\"VEUILLEZ REMPLIR TOUS LES CHAMPS\");window.location(\"signInView.php\")</script>";
    }

    ?>
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
                <td><input type="password" name="password" class="sign"></td>
            </tr>


        </table>

        <p>
            <input type="submit" value="Enregistrer" name="enregistrer">
        </p>
    </form>
</body>
</html>