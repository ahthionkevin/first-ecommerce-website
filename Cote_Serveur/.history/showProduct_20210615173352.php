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
    if(isset($_GET['idclient']) && !empty($_GET['idclient']))
    {
        $id=$_GET['idclient'];
        $sql="SELECT * FROM client WHERE id_client=\"$id\"";

        define("MYHOST","localhost");
        define("MYUSER","root");
        define("MYPASS","");
        $db="magasin";
        
        $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);

        $result=@mysqli_query($idcom,$sql);
        $coord=@mysqli_fetch_row($result);

        echo "<h2>INFORMATION DU CLIENT</h2>";

        echo "<form action=\"updateUser.php?idclient=$coord[0]\" method=\"post\" class=\"read\">
        <table>
            <tr>
                <td><label for=\"nom\">NOM </label></td>
                <td><input type=\"text\" name=\"nom\" value=$coord[1] class=\"sign\"></td>
            </tr>

            <tr>
                <td><label for=\"prenom\">PRENOM </label></td>
                <td><input type=\"text\" name=\"prenom\" value=$coord[2] class=\"sign\"></td>
            </tr>

            <tr>
                <td><label for=\"adresse\">ADRESSE </label></td>
                <td><input type=\"text\" name=\"adresse\" value=$coord[3] class=\"sign\"></td>
            </tr>

            <tr>
                <td><label for=\"mail\">MAIL </label></td>
                <td><input type=\"email\" name=\"mail\" value=$coord[4] class=\"sign\"></td>
            </tr>

            
            </table>

            <input type=\"submit\" value=\"Enregistrer Modification\" name=\"modifier\">
            </form>";


    }

?>  
</body>
</html>
      
       