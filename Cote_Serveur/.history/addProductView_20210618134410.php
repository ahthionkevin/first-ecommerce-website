<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AJOUTER PRODUIT</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <?php
        require("header.php");
    ?>
    <h2>AJOUTER PRODUIT</h2>
    <form action="addProduct.php" method="post" class="read" autocomplete="off" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="nom">NOM PRODUIT </label></td>
                <td><input type="text" name="nom" class="sign"></td>
            </tr>

            <tr>
                <td><label for="designation">DESIGNATION PRODUIT </label></td>
                <td><input type="text" name="designation" class="sign"></td>
            </tr>

            <tr>
                <td><label for="prix">PRIX </label></td>
                <td><input type="text" name="prix" class="sign"></td>
            </tr>

            <tr>
                <td><label for="qte">QUANTITE STOCK</label></td>
                <td><input type="text" name="qte" class="sign"></td>
            </tr>

            <tr>
                <td><label for="img">IMAGE: </label></td>
                <td><input type="file" name="img" id="img" accept="image/*" class="sign"></td>
            </tr>

            <tr>
                <td><label for="categorie">Categorie </label></td>
                <td><select name="categorie" id="caetgorie">
                    <option value="ordinateur">ordinateur</option>
                    <option value="telephone">telephone</option>
                    <option value="divers">divers</option>
                </select></td>
            </tr>

        </table>
        
        <p>
            <input type="submit" value="Enregistrer">
        </p>
    </form>
    <div><img src="#" id="image" height="200px"></div>
    
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