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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
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
    <h2>MON PANIER</h2>;
    

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

                echo "<table border=\"3\" cellspacing=\"0\" cellpadding=\"10\" align=\"center\" width=\"100%\">
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