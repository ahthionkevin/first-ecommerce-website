<?php
    if(isset($_POST['modifier']) && isset($_GET['idProduct']) && !empty($_GET['idProduct']) )
    {
        $id=$_GET['idProduct'];

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
                
                $sql="UPDATE article SET nom=\"$nom\",designation=\"$designation\",prix=\"$prix\",categorie=\"$categorie\",quantite=\"$qte\" WHERE id_article=\"$id\"";
                
                $result=mysqli_query($idcom,$sql);
                if($result)
                {
                    echo "<script>alert(\"VOS DONNEES ONT ETE AJOUTE AVEC SUUCES\")</script>";
                    header("Location: indexProduct.php");
                }
                   
                else
                {
                    echo "<script>alert(\"ERREUR D ENVOI DE DONNEE\")</script>";
                    header("Location: indexProduct.php");

                }
               

                mysqli_close($idcom);
        
    }
    else
    {
        echo "<script>alert(\"VEUILLEZ REMPLIR TOUS LES CHAMPS\");</script>"; 
        header("Location: addProduct.php");

    }
