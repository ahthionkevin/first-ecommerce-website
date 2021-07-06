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
                            $sql="SELECT * FROM article WHERE nom=\"$nom\" AND prix>=\"$min\" AND prix<=\"$max\" AND categorie=\"$categorie\"";
                        }
                        else
                        {
                            $nom=$_POST['nom'];
                            $min=$_POST['min'];
                            $max=$_POST['max'];
                            $sql="SELECT * FROM article WHERE nom=\"$nom\" AND prix>=\"$min\" AND prix<=\"$max\"";
                        }
                    }
                    else
                    {
                        if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                        {
                            $nom=$_POST['nom'];
                            $min=$_POST['min'];
                            $categorie=$_POST['categorie'];
                            $sql="SELECT * FROM article WHERE nom=\"$nom\" AND prix>=\"$min\" AND categorie=\"$categorie\"";
                        }
                        else
                        {
                            $nom=$_POST['nom'];
                            $min=$_POST['min'];
                            $sql="SELECT * FROM article WHERE nom=\"$nom\" AND prix>=\"$min\"";
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
                            $sql="SELECT * FROM article WHERE nom=\"$nom\" AND prix<=\"$max\" AND categorie=\"$categorie\"";
                        }
                        else
                        {
                            $nom=$_POST['nom'];
                            $max=$_POST['max'];
                            $sql="SELECT * FROM article WHERE nom=\"$nom\" AND prix<=\"$max\"";
                        }
                    }
                    else
                    {
                        if(isset($_POST['categorie']) && !empty($_POST['categorie']))
                        {
                            $nom=$_POST['nom'];
                            $categorie=$_POST['categorie'];
                            $sql="SELECT * FROM article WHERE nom=\"$nom\" AND categorie=\"$categorie\"";
                        }
                        else
                        {
                            $nom=$_POST['nom'];
                            $sql="SELECT * FROM article WHERE nom=\"$nom\"";
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
                            $sql="SELECT * FROM article WHERE nom=\"$nom\" AND prix<=\"$max\"";
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

                while($coord=mysqli_fetch_row($result))
                {
                    
                    echo "<div>
                    <h3>$coord[1]</h3>
                    <p>$coord[2]</p>
                    <p>$coord[3] dhs</p>
                    <p>$coord[4]</p>
                    <p><a href=\"showProduct.php?idProduct=$coord[0]\">Voir</a></p>
                    </div>";

                }


             }

        }

        else
        {
            define("MYHOST","localhost");
            define("MYUSER","root");
            define("MYPASS","");
            $db="magasin";
            
            $nomcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);
            $sql="SELECT DISTINCT categorie FROM article";

            
            $result=@mysqli_query($nomcom,$sql);


            while($coord=mysqli_fetch_row($result))
            {
                echo "<article><h2>$coord[0]</h2>";
                $sql="SELECT * FROM article WHERE categorie=\"$coord[0]\"";

                $result1=@mysqli_query($nomcom,$sql);

                while($coord1=mysqli_fetch_row($result1))
                {
                    echo "<div><h3>$coord1[1]</h3>
                    <p>description : $coord1[2]</p>
                    <p>prix : $coord1[3]</p></div>";
                }


                echo "</article>";
            }
                    
                    

        }
    ?>
</body>
</html>