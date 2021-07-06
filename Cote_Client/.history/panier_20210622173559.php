<?php
    if(!isset($_SESSION))
        session_start();
    if(!isset($_SESSION['content']))
        $_SESSION['content']=0;
    if(isset($_SESSION['panier']))
        $_SESSION['content']=array_Sum($_SESSION['panier']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Ensa-Shop</title>
</head>
<body>
    <?php
        if(isset($_GET['del']))
        {
            unset($_SESSION['panier'][$_GET['del']]);
            $_SESSION['content']=array_Sum($_SESSION['panier']);
        }
    ?>

    
    <?php require 'header.php';?>
    <!-- catagary section start -->
    <div class="catagary_section layout_padding">
         <div class="container">
            <div class="catagary_main">
               <div class="catagary_left">
                  <h2 class="categary_text">MON PANIER</h2>
               </div>
               <div class="catagary_right">
                  <div class="catagary_menu">
                     <h1><?=$_SESSION['content']?></h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- catagary section end -->
    

    <?php
        if(isset($_SESSION['panier']) && !empty($_SESSION['panier']))
        {
            
            $ids=array_keys($_SESSION['panier']);
    
            define("MYHOST","localhost");
            define("MYUSER","root");
            define("MYPASS","");
            $db="magasin";
                    
            $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);
    
            $sql="SELECT * FROM article WHERE id_article IN (" . implode(',',$ids) .")";
    
            $result=mysqli_query($idcom,$sql);

            $coord=@mysqli_fetch_row($result);

            
            if(empty($coord))
                echo "<p class=\"red\">AUCUN CLIENT ENREGISTRER DANS LA BASE DE DONNEES<br>Veuillez enregistrer un client</p>";
            else
            {
                
                echo "<a href=\"index.php\">Poursuivre Vos Achats</a>&nbsp;";
                echo "<a href=\"addCommand.php\">Finaliser Commande</a>";

                echo "<table border=\"3\" cellspacing=\"0\" cellpadding=\"10\" align=\"center\" width=\"50%\">
                <tr>
                <th>Image</th>
                <th>nom</th>
                <th>designation</th>
                <th>Prix</th>
                <th>Categorie</th>
                <th>Quantite Commande</th>
                <th>Montant</th>
                <th>Option</th>
                </tr>";

                echo "<tr>
                <td><img height=\"100px\" src=\"../tp1_2/public/$coord[6]\"/></td>
                <td>$coord[1]</td>
                <td>$coord[2]</td>
                <td>$coord[3] dhs</td>
                <td>$coord[4]</td>
                <td>" . $_SESSION['panier'][$coord[0]] . "</td>
                <td> " . $_SESSION['panier'][$coord[0]]*$coord[3] . " dhs </td>
                <td><a href=\"panier.php?del=$coord[0]\">Supprimer</a></td>
                </tr>";

                $total=$_SESSION['panier'][$coord[0]]*$coord[3];
                while($coord=mysqli_fetch_row($result))
                {
                    
                    echo "<tr>
                    <td><img height=\"100px\" src=\"../tp1_2/public/$coord[6]\"/></td>
                    <td>$coord[1]</td>
                    <td>$coord[2]</td>
                    <td>$coord[3] dhs</td>
                    <td>$coord[4]</td>
                    <td>" . $_SESSION['panier'][$coord[0]] . "</td>
                    <td> " . $_SESSION['panier'][$coord[0]]*$coord[3] ." dhs </td>
                    <td><a href=\"panier.php?del=$coord[0]\">Supprimer</a></td>
                    </tr>";

                    $total+=$_SESSION['panier'][$coord[0]]*$coord[3];

                }

                echo "<tr>
                <td colspan=\"6\">Total</td>
                <td colspan=\"2\"> " . number_format($total,2,'.'," ") . "dhs</td>
                </tr>";
                echo '</table>';
                
               
            }

        }
        else
        {
            echo "<font color=\"red\">Votre Panier est Vide</font>";
        }

    ?>
</body>
</html>