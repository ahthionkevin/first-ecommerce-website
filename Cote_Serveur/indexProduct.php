<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wnomth=device-wnomth, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Ensa-Shop</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

</head>
<body>
    <?php
        require("header.php");
    ?>

    <h2>Recherche Produit</h2>
    <form action="indexProduct.php" method="post">
        <label for="nom">nom</label>
        <input type="text" name="nom" id="nom">

        <label for="min">PRIX MIN</label>
        <input type="text" name="min" id="min">

        <label for="max">PRIX MAX</label>
        <input type="text" name="max" id="max">

        <label for="categorie">CATEGORIE</label>
        <select name="categorie" id="catgorie">
            <option disabled selected value> -- select an option -- </option>
            <option value="ordinateur">ordinateur</option>
            <option value="telephone">telephone</option>
            <option value="divers">divers</option>
        </select>
        
        <input type="submit" value="Search" name="search">
    </form>

    <?php
        if(isset($_POST['search']))
        {
            define("MYHOST","localhost");
            define("MYUSER","root");
            define("MYPASS","");
            $db="magasin";
            
            $nomcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);
            
            if(isset($_POST['nom']) && !empty($_POST['nom']))
            {
               
                if(isset($_POST['min']) && !empty($_POST['min']))
                {
                    
                    if(isset($_POST['max']) && !empty($_POST['max']))
                    {
                        if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                        {
                            $nom=$_POST['nom'];
                            $min=$_POST['min'];
                            $max=$_POST['max'];
                            $categorie=$_POST['categorie'];
                            $sql="SELECT * FROM article WHERE designation=\"$nom\" AND prix>=\"$min\" AND prix<=\"$max\" AND categorie=\"$categorie\"";
                        }
                        else
                        {
                            $nom=$_POST['nom'];
                            $min=$_POST['min'];
                            $max=$_POST['max'];
                            $sql="SELECT * FROM article WHERE designation=\"$nom\" AND prix>=\"$min\" AND prix<=\"$max\"";
                        }
                    }
                    else
                    {
                        if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                        {
                            $nom=$_POST['nom'];
                            $min=$_POST['min'];
                            $categorie=$_POST['categorie'];
                            $sql="SELECT * FROM article WHERE designation=\"$nom\" AND prix>=\"$min\" AND categorie=\"$categorie\"";
                        }
                        else
                        {
                            $nom=$_POST['nom'];
                            $min=$_POST['min'];
                            $sql="SELECT * FROM article WHERE designation=\"$nom\" AND prix>=\"$min\"";
                        }
                    }
                }
                else
                {
                    if(isset($_POST['max']) && !empty($_POST['max']))
                    {
                        if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                        {
                            $nom=$_POST['nom'];
                            $max=$_POST['max'];
                            $categorie=$_POST['categorie'];
                            $sql="SELECT * FROM article WHERE designation=\"$nom\" AND prix<=\"$max\" AND categorie=\"$categorie\"";
                        }
                        else
                        {
                            $nom=$_POST['nom'];
                            $max=$_POST['max'];
                            $sql="SELECT * FROM article WHERE designation=\"$nom\" AND prix<=\"$max\"";
                        }
                    }
                    else
                    {
                        if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                        {
                            $nom=$_POST['nom'];
                            $categorie=$_POST['categorie'];
                            $sql="SELECT * FROM article WHERE designation=\"$nom\" AND categorie=\"$categorie\"";
                        }
                        else
                        {
                            $nom=$_POST['nom'];
                            $sql="SELECT * FROM article WHERE designation=\"$nom\"";
                        }
                    }
                }
            }
            else
            {
                if(isset($_POST['min']) && !empty($_POST['min']))
                {
                    
                    if(isset($_POST['max']) && !empty($_POST['max']))
                    {
                        if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                        {
                            $min=$_POST['min'];
                            $max=$_POST['max'];
                            $categorie=$_POST['categorie'];
                            $sql="SELECT * FROM article WHERE prix>=\"$min\" AND prix<=\"$max\" AND categorie=\"$categorie\"";
                        }
                        else
                        {
                            $min=$_POST['min'];
                            $max=$_POST['max'];
                            $sql="SELECT * FROM article WHERE prix>=\"$min\" AND prix<=\"$max\"";
                        }
                    }
                    else
                    {
                        if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                        {
                            $min=$_POST['min'];
                            $categorie=$_POST['categorie'];
                            $sql="SELECT * FROM article WHERE prix>=\"$min\" AND categorie=\"$categorie\"";
                        }
                        else
                        {
                            $min=$_POST['min'];
                            $sql="SELECT * FROM article WHERE prix>=\"$min\"";
                        }
                    }
                }
                else
                {
                    if(isset($_POST['max']) && !empty($_POST['max']))
                    {
                        if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                        {
                            $max=$_POST['max'];
                            $categorie=$_POST['categorie'];
                            $sql="SELECT * FROM article WHERE prix<=\"$max\" AND categorie=\"$categorie\"";
                        }
                        else
                        {
                            $max=$_POST['max'];
                            $sql="SELECT * FROM article WHERE prix<=\"$max\"";
                        }
                    }
                    else
                    {
                        if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                        {
                            $categorie=$_POST['categorie'];
                            $sql="SELECT * FROM article WHERE categorie=\"$categorie\"";
                        }
                        else
                        {
                            $nom=$_POST['nom'];
                            $sql="SELECT * FROM article";
                        }
                    }
                }
            }

            
           
            

            $result=@mysqli_query($nomcom,$sql);

            $coord=@mysqli_fetch_row($result);

            if(empty($coord))
                echo "<p class=\"red\">PRODUIT N EXISTE PAS</p>";
            else
            {

                echo "<h2>LISTE DES PRODUITS</h2>";
                echo "<table border=\"3\" cellspacing=\"0\" cellpadding=\"10\" align=\"center\" wnomth=\"100%\">
                <tr>
                <th>designation</th>
                <th>Prix</th>
                <th>Categorie</th>
                <th>Option</th>
                </tr>";

                echo "<tr>
                <td>$coord[1]</td>
                <td>$coord[2] dhs</td>
                <td>$coord[3]</td>
                <td><a href=\"showProduct.php?idProduct=$coord[0]\">Voir</a> | <a href=\"deleteProduct.php?idProduct=$coord[0]\">Supprimer</a></td>
                </tr>";

                while($coord=mysqli_fetch_row($result))
                {
                    
                    echo "<tr>
                    <td>$coord[1]</td>
                    <td>$coord[2] dhs</td>
                    <td>$coord[3]</td>
                    <td><a href=\"showProduct.php?idProduct=$coord[0]\">Voir</a> | <a href=\"deleteProduct.php?idProduct=$coord[0]\">Supprimer</a></td>
                    </tr>";

                }

                echo '</table>';


             }

        }

        else
        {
            define("MYHOST","localhost");
            define("MYUSER","root");
            define("MYPASS","");
            $db="magasin";
            
            $nomcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);
            $sql="SELECT * FROM article ORDER BY designation DESC";

            
            $result=@mysqli_query($nomcom,$sql);

            $coord=@mysqli_fetch_row($result);

            
            if(empty($coord))
                echo "<p class=\"red\">AUCUN CLIENT ENREGISTRER DANS LA BASE DE DONNEES<br>Veuillez enregistrer un client</p>";
            else
            {

                echo "<h2>LISTE DES PRODUITS</h2>";
                echo "<table border=\"3\" cellspacing=\"0\" cellpadding=\"10\" align=\"center\" wnomth=\"100%\">
                <tr>
                <th>designation</th>
                <th>Prix</th>
                <th>Categorie</th>
                <th>Option</th>
                </tr>";

                echo "<tr>
                <td>$coord[1]</td>
                <td>$coord[2] dhs</td>
                <td>$coord[3]</td>
                <td><a href=\"showProduct.php?idProduct=$coord[0]\">Voir</a> | <a href=\"deleteProduct.php?idProduct=$coord[0]\">Supprimer</a></td>
                </tr>";

                while($coord=mysqli_fetch_row($result))
                {
                    
                    echo "<tr>
                    <td>$coord[1]</td>
                    <td>$coord[2] dhs</td>
                    <td>$coord[3]</td>
                    <td><a href=\"showProduct.php?idProduct=$coord[0]\">Voir</a> | <a href=\"deleteProduct.php?idProduct=$coord[0]\">Supprimer</a></td>
                    </tr>";

                }

                echo '</table>';

        }}
    ?>
</body>
</html>