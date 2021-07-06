<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>
<body>
    <?php
        require("header.php");
    ?>

    <h2>Recherche Produit</h2>
    <form action="index.php" method="post">
        <label>min</label>
        <input type="text" name="min" id="min">

        <label>PRIX MIN</label>
        <input type="text" name="min" id="min">

        <label>PRIX MAX</label>
        <input type="text" name="max" id="max">

        <label>CATEGORIE</label>
        <select name="categorie" id="caetgorie">
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
            
            $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);
            
            if(isset($_POST['nom']) && !empty($_POST['nom']))
            {
               
                if(isset($_POST['min']) && !empty($_POST['min']))
                {
                    
                    if(isset($_POST['adresse']) && !empty($_POST['adresse']))
                    {
                        $id=$_POST['nom'];
                        $min=$_POST['min'];
                        $addr=$_POST['adresse'];
                        $sql="SELECT * FROM client WHERE id_client=\"$id\" AND min=\"$min\" AND adresse=\"$addr\"";
                    }
                    else
                    {
                        $id=$_POST['nom'];
                        $min=$_POST['min'];
                        $sql="SELECT * FROM client WHERE id_client=\"$id\" AND min=\"$min\"";
                    }
                }
                else
                {
                    if(isset($_POST['adresse']) && !empty($_POST['adresse']))
                    {
                        $id=$_POST['nom'];
                        $addr=$_POST['adresse'];
                        $sql="SELECT * FROM client WHERE id_client=\"$id\" AND adresse=\"$addr\"";
                    }
                    else
                    {
                        $id=$_POST['nom'];
                        $sql="SELECT * FROM client WHERE id_client=\"$id\"";
                    }
                }
            }
            else
            {
                if(isset($_POST['min']) && !empty($_POST['min']))
                {
                    
                    if(isset($_POST['adresse']) && !empty($_POST['adresse']))
                    {
                        $min=$_POST['min'];
                        $addr=$_POST['adresse'];
                        $sql="SELECT * FROM client WHERE min=\"$min\" AND adresse=\"$addr\"";
                    }
                    else
                    {
                        $min=$_POST['min'];
                        $sql="SELECT * FROM client WHERE min=\"$min\"";
                    }
                }
                else
                {
                    if(isset($_POST['adresse']) && !empty($_POST['adresse']))
                    {
                        $addr=$_POST['adresse'];
                        $sql="SELECT * FROM client WHERE adresse=\"$addr\"";
                    }
                }
            }

            
           
            

            $result=@mysqli_query($idcom,$sql);

            $coord=@mysqli_fetch_row($result);

            if(empty($coord))
                echo "<p class=\"red\">CLIENT N EXISTE PAS</p>";
            else
            {

                echo "<h2>LISTE DES PRODUITS</h2>";
                echo "<table border=\"3\" cellspacing=\"0\" cellpadding=\"10\" align=\"center\" width=\"100%\">
                <tr>
                <th>min</th>
                <th>designation</th>
                <th>Prix</th>
                <th>Categorie</th>
                <th>Option</th>
                </tr>";

                echo "<tr>
                <td>$coord[1]</td>
                <td>$coord[2]</td>
                <td>$coord[3] dhs</td>
                <td>$coord[4]</td>
                <td><a href=\"showProduct.php?idProduct=$coord[0]\">Voir</a> | <a href=\"deleteProduct.php?idProduct=$coord[0]\">Supprimer</a></td>
                </tr>";

                while($coord=mysqli_fetch_row($result))
                {
                    
                    echo "<tr>
                    <td>$coord[1]</td>
                    <td>$coord[2]</td>
                    <td>$coord[3] dhs</td>
                    <td>$coord[4]</td>
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
            
            $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);
            $sql="SELECT * FROM article ORDER BY min DESC LIMIT 5";

            
            $result=@mysqli_query($idcom,$sql);

            $coord=@mysqli_fetch_row($result);

            
            if(empty($coord))
                echo "<p class=\"red\">AUCUN CLIENT ENREGISTRER DANS LA BASE DE DONNEES<br>Veuillez enregistrer un client</p>";
            else
            {

                echo "<h2>LISTE DES PRODUITS</h2>";
                echo "<table border=\"3\" cellspacing=\"0\" cellpadding=\"10\" align=\"center\" width=\"100%\">
                <tr>
                <th>min</th>
                <th>designation</th>
                <th>Prix</th>
                <th>Categorie</th>
                <th>Option</th>
                </tr>";

                echo "<tr>
                <td>$coord[1]</td>
                <td>$coord[2]</td>
                <td>$coord[3] dhs</td>
                <td>$coord[4]</td>
                <td><a href=\"showProduct.php?idProduct=$coord[0]\">Voir</a> | <a href=\"deleteProduct.php?idProduct=$coord[0]\">Supprimer</a></td>
                </tr>";

                while($coord=mysqli_fetch_row($result))
                {
                    
                    echo "<tr>
                    <td>$coord[1]</td>
                    <td>$coord[2]</td>
                    <td>$coord[3] dhs</td>
                    <td>$coord[4]</td>
                    <td><a href=\"showProduct.php?idProduct=$coord[0]\">Voir</a> | <a href=\"deleteProduct.php?idProduct=$coord[0]\">Supprimer</a></td>
                    </tr>";

                }

                echo '</table>';

        }}
    ?>
</body>
</html>