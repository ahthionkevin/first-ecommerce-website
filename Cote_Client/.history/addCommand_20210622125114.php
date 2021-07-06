<!DOCTYPE html>
<html lang="en">
<head>
<title>FRICA</title>
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
    if(!isset($_SESSION))
        session_start();

    if(isset($_SESSION['id']))
    {

        require 'header.php';
        ?>
        <!-- catagary section start -->
      <div class="catagary_section layout_padding">
         <div class="container">
            <div class="catagary_main">
               <div class="catagary_left">
                  <h2 class="categary_text">VALIDER COMMANDE</h2>
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
        $idClient=$_SESSION['id'];

        define("MYHOST","localhost");
        define("MYUSER","root");
        define("MYPASS","");
        $db="magasin";
    
        $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);

        $sql="SELECT * FROM client WHERE id_client=\"$idClient\"";
        $result=mysqli_query($idcom,$sql);

        $coord=@mysqli_fetch_row($result);

        if(empty($coord))
        {
            die("OK");
        }
        echo "<form action=\"addCommand.php\" method=\"post\" class=\"read\">
    
        <table>
            <tr>
                <td>NOM</td>
                <td>$coord[1]</td>
            </tr>

            <tr>
                <td>PRENOM</td>
                <td>$coord[2]</td>
            </tr>

            <tr>
                <td>ADRESSE</td>
                <td>$coord[3]</td>
            </tr>

            <tr>
                <td>MAIL</td>
                <td>$coord[4]</td>
            </tr>

            <tr>
                <td><label for=\"adresse\">ADRESSE DE LIVRAISON </label></td>
                <td><input type=\"text\" name=\"adresse\" value=\"$coord[3]\" class=\"sign\"></td>
            </tr>

            <tr>
            <td><label for=\"carte\">Carte Bancaire </label></td>
            <td><input type=\"text\" name=\"carte\" class=\"sign\"></td>
            </tr>

            
            </table>

            <input type=\"submit\" value=\"Valider la Commande\" name=\"valider\">
            </form>";

    }
    else
    {
        echo "<script>window.location.replace(\"loginView.php?action=achat\")</script>";
    }

    ?>

    <?php
        if(isset($_POST['valider']))
        {
            if(!empty($_POST['adresse']) && !empty($_POST['carte']))
            {
                $num=$_POST['carte'];
                $adresse=$_POST['adresse'];

                if(strlen($num) == 16){	// 16 caractères
                    // Séparation de tous les caractères
                    $c = array();
                    for($i=0; $i<16; $i++){
                        if(is_numeric(substr($num,$i,1))){	// Uniquement des chiffres
                            $c[$i] = substr($num,$i,1);
                        }else{
                            $validate=false;
                        }
                    }
                    // Contrôle
                    $m1 = 0;
                    for($i=0; $i<16; $i++){
                        if(($i%2)==0){
                            $x = $c[$i]*2;
                            if($x>9){
                                $m1 += $x-9;
                            }else{
                                $m1 += $x;
                            }
                        }else{
                            $m1 += $c[$i];
                        }
                    }
                    if(($m1%10)!=0){	// Doit être multiple de 10
                         $validatefalse;
                    }
                    // Pas d'erreur
                    $validate=true;
                }else{
                    $validate=false;
                }

                if($validate)
                {
                    echo "<script>";
                    echo "if(confirm(\"Voulez vous effectuer la transaction\"))window.location.replace(\"finishCommand.php\");";
                    echo "</script>";
                }
                else
                {
                    echo "<div align=\"center\"><font color=\"red\" >Veuillez Saisir une carte Bancaire Valide</font></div>";
                }
            }
            else
            {
                echo "<div align=\"center\"><font color=\"red\" >Veuillez REmplir tous le Formulaire</font></div>";
            }
        }
    ?>

</body>
</html>

