<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ensa-Shop</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
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

        echo "<h2>INFORMATION DU PRODUIT</h2>";

        echo "<form action=\"updateProduct.php?idProduct=$coord[0]\" method=\"post\" class=\"read\" autocomplete=\"off\" enctype=\"multipart/form-data\">
        <table>
            <tr>
                <td><label for=\"nom\">DESIGNATION </label></td>
                <td><input type=\"text\" name=\"nom\" id=\"nom\" value=\"$coord[1]\" class=\"sign\"></td>
            </tr>

            <tr>
                <td><label for=\"prix\">Prix </label></td>
                <td><input type=\"text\" name=\"prix\" id=\"prix\" value=\"$coord[2]\" class=\"sign\"></td>
            </tr>

            
            <tr>
                <td><label for=\"qte\">QUANTITE EN STOCK </label></td>
                <td><input type=\"text\" name=\"qte\" id=\"qte\" value=\"$coord[4]\" class=\"sign\"></td>
            </tr>

            <tr>
                <td><label for=\"img\">IMAGE: </label></td>
                <td><input type=\"file\" name=\"img\" id=\"img\" accept=\"image/jpg\" class=\"sign\"></td>
            </tr>

           

            <tr>
                <td><label for=\"categorie\">CATEGORIE </label></td>
                
                <td><select name=\"categorie\" value=$coord[4] class=\"sign\" >
                <option></option>";
                if("divers"==$coord[3])
                echo "<option selected >divers</option>";
                else
                echo "<option>divers</option>";
                if("telephone"==$coord[3])
                echo"<option selected>telephone</option>";
                else
                echo"<option>telephone</option>";
                if("ordinateur"==$coord[3])
                echo"<option selected>ordinateur</option>";
                else
                "<option>ordinateur</option>";
                
               echo" </select>
                </td>

            </tr>


            
            </table>
            <img src=\"public/$coord[0].jpg\" id=\"image\" height=\"200px\">
            <input type=\"submit\" value=\"Enregistrer Modification\" name=\"modifier\">
            </form>";


    }

?>  
</body>

<script>
    var image=document.getElementById("image");
    
    var img=document.getElementById("img");

    img.addEventListener('change',function(){
        const [file] = img.files
  if (file) {
    image.src = URL.createObjectURL(file)
  }
    });
    
</script>
</html>
      
       