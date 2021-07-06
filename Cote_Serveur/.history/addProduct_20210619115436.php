<?php


if(isset($_POST['nom']) && isset($_POST['designation']) && isset($_POST['prix']) && isset($_POST['categorie']) && isset($_FILES['img']) && !empty($_POST['nom']) && !empty($_POST['designation']) && !empty($_POST['prix']) && !empty($_POST['categorie']) && !empty($_FILES['img']) )
{   
    


    $name= $_FILES['img']['name'];  
    $temp_name  = $_FILES['img']['tmp_name'];  
    if(isset($name) and !empty($name)){
        $location = 'public/';      
        if(move_uploaded_file($temp_name, $location.$name)){
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
            
            $sql="INSERT INTO article (nom,designation,prix,categorie,quantite,`image`) VALUES(\"$nom\",\"$designation\",\"$prix\",\"$categorie\",\"$qte\",\"$name\")";
            
            $result=mysqli_query($idcom,$sql);
            if($result)
            {
                echo "<script>alert(\"VOS DONNEES ONT ETE AJOUTE AVEC SUUCES\");window.location.replace(\"indexProduct.php\");</script>";
               // header("Location: indexProduct.php");
            }
                
            else
            {
                echo "<script>alert(\"ERREUR D ENVOI DE DONNEE\");window.location.replace(\"indexProduct.php\");</script>";
                // header("Location: indexProduct.php");
            }
            

            mysqli_close($idcom);
        }
    } 
    else{
        echo "<script>alert(\"You should select a file to upload !!\");window.location.replace(\"addProductView.php\");</script>";
        //header("Location: addProduct.php");
    }
    
}
else
{
    echo "<script>alert(\"VEUILLEZ REMPLIR TOUS LES CHAMPS\");</script>";
    //header("Location: addProduct.php");
}
    