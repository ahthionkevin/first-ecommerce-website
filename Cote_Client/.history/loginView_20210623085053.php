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
                $monfichier = fopen('../tp1_2/passwd.txt', 'a+');
                $reg='/^' . $coord[0] .':/';
                
                while($ligne=fgets($monfichier))
                {
                    
                    if(preg_match($reg,$ligne))
                    {
                        $password1=explode(':',$ligne);
                        
                        break;
                    }
                }

                fclose($monfichier);
                $password .="\n";
                var_dump($password1);
                echo $password;
                echo $password ==$password1[1];
                exit;
                if($password ==$password1[1])
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
                  <h2 class="categary_text">LOG IN</h2>
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


    
    <?php if(isset($_GET['action'])):?>
    <form action="loginView.php?action=achat" method="post" class="read" autocomplete="off">
    <?php else:?>
    <form action="loginView.php" method="post" class="read" autocomplete="off">
    <?php endif?>
        <table>
            <tr>
                <td><label for="mail">MAIL </label></td>
                <td><input type="email" name="mail" class="sign"></td>
            </tr>

            <tr>
                <td><label for="password">PASSWORD </label></td>
                <td><input type="password" name="password" class="sign"></td>
            </tr>
           
        </table>
        <?php if(isset($err)){echo  "<font color=\"red\">$err</font>";}?>
        <p>
            <button><a href="signInView.php">S'inscrire</a></button>
            <input type="submit" name="seConnecter" value="Se Connecter">
        </p>
    </form>


    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "100%";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script> 
</body>
</html>