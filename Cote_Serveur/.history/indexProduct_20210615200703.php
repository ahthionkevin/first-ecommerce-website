<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wnomth=device-wnomth, initial-scale=1.0">
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
        <input type="text" name="min" nom="min">

        <label>PRIX MIN</label>
        <input type="text" name="min" nom="min">

        <label>PRIX MAX</label>
        <input type="text" name="max" nom="max">

        <label>CATEGORIE</label>
        <select name="categorie" nom="caetgorie">
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
                        $nom=$_POST['nom'];
                        $min=$_POST['min'];
                        $max=$_POST['max'];
                        $sql="SELECT * FROM client WHERE nom_client=\"$nom\" AND min=\"$min\" AND max=\"$max\"";
                    }
                    else
                    {
                        $nom=$_POST['nom'];
                        $min=$_POST['min'];
                        $sql="SELECT * FROM client WHERE nom_client=\"$nom\" AND min=\"$min\"";
                    }
                }
                else
                {
                    if(isset($_POST['max']) && !empty($_POST['max']))
                    {
                        $nom=$_POST['nom'];
                        $max=$_POST['max'];
                        $sql="SELECT * FROM client WHERE nom_client=\"$nom\" AND max=\"$max\"";
                    }
                    else
                    {
                        $nom=$_POST['nom'];
                        $sql="SELECT * FROM client WHERE nom_client=\"$nom\"";
                    }
                }
            }
            else
            {
                if(isset($_POST['min']) && !empty($_POST['min']))
                {
                    
                    if(isset($_POST['max']) && !empty($_POST['max']))
                    {
                        $min=$_POST['min'];
                        $max=$_POST['max'];
                        $sql="SELECT * FROM client WHERE min=\"$min\" AND max=\"$max\"";
                    }
                    else
                    {
                        $min=$_POST['min'];
                        $sql="SELECT * FROM client WHERE min=\"$min\"";
                    }
                }
                else
                {
                    if(isset($_POST['max']) && !empty($_POST['max']))
                    {
                        $max=$_POST['max'];
                        $sql="SELECT * FROM client WHERE max=\"$max\"";
                    }
                }
            }

            
           
            

            $result=@mysqli_query($nomcom,$sql);

            $coord=@mysqli_fetch_row($result);

            if(empty($coord))
                echo "<p class=\"red\">CLIENT N EXISTE PAS</p>";
            else
            {

                echo "<h2>LISTE DES PRODUITS</h2>";
                echo "<table border=\"3\" cellspacing=\"0\" cellpadding=\"10\" align=\"center\" wnomth=\"100%\">
                <tr>
                <th>nom</th>
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
                <td><a href=\"showProduct.php?nomProduct=$coord[0]\">Voir</a> | <a href=\"deleteProduct.php?nomProduct=$coord[0]\">Supprimer</a></td>
                </tr>";

                while($coord=mysqli_fetch_row($result))
                {
                    
                    echo "<tr>
                    <td>$coord[1]</td>
                    <td>$coord[2]</td>
                    <td>$coord[3] dhs</td>
                    <td>$coord[4]</td>
                    <td><a href=\"showProduct.php?nomProduct=$coord[0]\">Voir</a> | <a href=\"deleteProduct.php?nomProduct=$coord[0]\">Supprimer</a></td>
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
            $sql="SELECT * FROM article ORDER BY min DESC LIMIT 5";

            
            $result=@mysqli_query($nomcom,$sql);

            $coord=@mysqli_fetch_row($result);

            
            if(empty($coord))
                echo "<p class=\"red\">AUCUN CLIENT ENREGISTRER DANS LA BASE DE DONNEES<br>Veuillez enregistrer un client</p>";
            else
            {

                echo "<h2>LISTE DES PRODUITS</h2>";
                echo "<table border=\"3\" cellspacing=\"0\" cellpadding=\"10\" align=\"center\" wnomth=\"100%\">
                <tr>
                <th>nom</th>
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
                <td><a href=\"showProduct.php?nomProduct=$coord[0]\">Voir</a> | <a href=\"deleteProduct.php?nomProduct=$coord[0]\">Supprimer</a></td>
                </tr>";

                while($coord=mysqli_fetch_row($result))
                {
                    
                    echo "<tr>
                    <td>$coord[1]</td>
                    <td>$coord[2]</td>
                    <td>$coord[3] dhs</td>
                    <td>$coord[4]</td>
                    <td><a href=\"showProduct.php?nomProduct=$coord[0]\">Voir</a> | <a href=\"deleteProduct.php?nomProduct=$coord[0]\">Supprimer</a></td>
                    </tr>";

                }

                echo '</table>';

        }}
    ?>
</body>
</html>