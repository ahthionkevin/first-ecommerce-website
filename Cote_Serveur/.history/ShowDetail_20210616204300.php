<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SHOW PRODUCT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    require("header.php");
    if(isset($_GET['idProduct']) && !empty($_GET['idProduct']))
    {
        $id=$_GET['idProduct'];
        $sql="SELECT * FROM article WHERE id_article=\"$id\"";

        define("MYHOST","localhost");
        define("MYUSER","root");
        define("MYPASS","");
        $db="magasin";
        
        $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);

        $result=@mysqli_query($idcom,$sql);
        $coord=@mysqli_fetch_row($result);

        echo "<h2>$coord[1]</h2>";

        echo "<form action=\"updateProduct.php?idProduct=$coord[0]\" method=\"post\" class=\"read\">
        <table>
            <tr>
                <td><label for=\"nom\">NOM </label></td>
                <td><input type=\"text\" name=\"nom\" id=\"nom\" value=$coord[1] class=\"sign\"></td>
            </tr>

            <tr>
                <td><label for=\"designation\">Designation </label></td>
                <td><input type=\"text\" name=\"designation\" id=\"designation\" value=$coord[2] class=\"sign\"></td>
            </tr>

            <tr>
                <td><label for=\"prix\">Prix </label></td>
                <td><input type=\"text\" name=\"prix\" id=\"prix\" value=$coord[3] class=\"sign\"></td>
            </tr>

            <tr>
                <td><label for=\"categorie\">Categorie </label></td>
                <td>        <select name=\"categorie\" id=\"catgorie\">
                <option disabled selected value> -- select an option -- </option>
                <option value=\"ordinateur\">ordinateur</option>
                <option value=\"telephone\">telephone</option>
                <option value=\"divers\">divers</option>
            </select></td>
            </tr>

            
            </table>

            <input type=\"submit\" value=\"Enregistrer Modification\" name=\"modifier\">
            </form>";


    }

?>  
</body>
</html>
      
       