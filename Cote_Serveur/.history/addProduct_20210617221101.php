<?php
if(isset($_POST['nom']) && isset($_POST['designation']) && isset($_POST['prix']) && isset($_POST['categorie']) && !empty($_POST['nom']) && !empty($_POST['designation']) && !empty($_POST['prix']) && !empty($_POST['categorie']) )
{     
    $nom=$_POST['nom'];
    $designation=$_POST['designation'];
    $prix=$_POST['prix'];
    $categorie=$_POST['categorie'];
    $qte=$_POST['qte'];
    
    define("MYHOST","localhost");
    define("MYUSER","root");
    define("MYPASS","");
    $db="magasin";
    
    $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);
    //$idbase=@mysqli_select_db($db);
    
   $sql="INSERT INTO article (nom,designation,prix,categorie,quantite) VALUES(\"$nom\",\"$designation\",\"$prix\",\"$categorie\",\"$qte\")";
    //$sql="INSERT INTO client(nom,designation,prix,categorie) VALUES('ali','imane','Marrakech','xyz@gcategorie.com')";
    $result=mysqli_query($idcom,$sql);
    if($result)
        echo "<script>alert(\"VOS DONNEES ONT ETE AJOUTE AVEC SUUCES\");window.location(\"indexProduct.php\")</script>";
    else
    echo "<script>alert(\"ERREUR D ENVOI DE DONNEE\");window.location(\"indexProduct.php\")</script>";

    mysqli_close($idcom);
}
else
    echo "<script>alert(\"VEUILLEZ REMPLIR TOUS LES CHAMPS\");window.location(\"addProductView.php\")</script>";