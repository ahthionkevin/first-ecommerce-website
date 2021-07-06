<?php


if(isset($_POST['nom']) && isset($_POST['designation']) && isset($_POST['prix']) && isset($_POST['categorie']) && isset($_FILES['img']) && !empty($_POST['nom']) && !empty($_POST['designation']) && !empty($_POST['prix']) && !empty($_POST['categorie']) && !empty($_FILES['img']) )
{   
    $name= $_FILES['img']['name'];  
    $temp_name  = $_FILES['img']['tmp_name'];  
    if(isset($name) and !empty($name)){
        $location = 'public/';      
        if(move_uploaded_file($temp_name, $location.$name)){
            echo 'File uploaded successfully';
        }
    } 
    else{
            echo 'You should select a file to upload !!';
    }
    exit();
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
    
    $result=mysqli_query($idcom,$sql);
    if($result)
        echo "<script>alert(\"VOS DONNEES ONT ETE AJOUTE AVEC SUUCES\");window.location(\"indexProduct.php\")</script>";
    else
    echo "<script>alert(\"ERREUR D ENVOI DE DONNEE\");window.location(\"indexProduct.php\")</script>";

    mysqli_close($idcom);
}
else
    echo "<script>alert(\"VEUILLEZ REMPLIR TOUS LES CHAMPS\");window.location(\"addProductView.php\")</script>";