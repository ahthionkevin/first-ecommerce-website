<?php


if(isset($_POST['designation']) && isset($_POST['prix']) && isset($_POST['categorie']) && isset($_FILES['img']) && !empty($_POST['designation']) && !empty($_POST['prix']) && !empty($_POST['categorie']) && !empty($_FILES['img']) )
{   
    


    $name= $_FILES['img']['name'];  
    $temp_name  = $_FILES['img']['tmp_name'];  
    if(isset($name) and !empty($name)){
        $location = 'public/';      
        {
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
            
            $sql="INSERT INTO article (designation,prix,categorie,quantite) VALUES(\"$designation\",\"$prix\",\"$categorie\",\"$qte\")";
            
            $result=mysqli_query($idcom,$sql);
            if($result)
            {
                $sql1="SELECT * FROM article ORDER BY id_article DESC";
                $result1=mysqli_query($idcom,$sql1);

                $coord1=mysqli_fetch_row($result1);
                move_uploaded_file($temp_name, $location.$coord1[0].".jpg");
                
                //echo "<script>alert(\"VOS DONNEES ONT ETE AJOUTE AVEC SUUCES\");window.location.replace(\"indexProduct.php\");</script>";
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

    
}
else
{
    echo "<script>alert(\"VEUILLEZ REMPLIR TOUS LES CHAMPS\");window.location.replace(\"addProductView.php\");</script></script>";
    //header("Location: addProduct.php");
}
    