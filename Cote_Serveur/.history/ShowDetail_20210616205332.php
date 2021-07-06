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

        echo "<div>";
        echo "<h2>$coord[1]</h2>";
        echo "<p>$coord[2]</p>";
        echo "<p>$coord[3] dhs</p>";
        echo "<form action=\"addCommand.php\" method=\"post\"><label>Prix: </label><input type=\"button\" value=\"-\"><input type=\"text\" name=\"qte\" value=\"0\"></form>";
        echo "</div>";
    


    }

?>  
</body>
</html>
      
       