<?php
    if(isset($_POST['modifier']) && isset($_GET['idProduct']) && !empty($_GET['idProduct']) )
    {
            $id=$_GET['idProduct'];

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

                //======================================
                $name= $_FILES['img']['name'];  
                $temp_name  = $_FILES['img']['tmp_name'];  
                if(isset($name) and !empty($name))
                {
                    $location = 'public/';      
                    if(move_uploaded_file($temp_name, $location.$id.".jpg"))
                    {    
                        $sql="UPDATE article SET designation=\"$designation\",prix=\"$prix\",categorie=\"$categorie\" WHERE id_article=\"$id\"";
                    }
                } 
                else{
                    $sql="UPDATE article SET designation=\"$designation\",prix=\"$prix\",categorie=\"$categorie\" WHERE id_article=\"$id\"";
                }

                //======================================
                
               
                
                $result=mysqli_query($idcom,$sql);
                if($result)
                {
                    echo "<script>";
                    echo "window.alert(\"VOS DONNEES ONT ETE AJOUTE AVEC SUUCES\");window.location.replace(\"indexProduct.php\")";
                    echo "</script>";
                    //header("Location: indexProduct.php");
                }
                   
                else
                {
                    echo "<script>alert(\"ERREUR D ENVOI DE DONNEE\");window.location.replace(\"indexProduct.php\");</script>";

                }
               

                mysqli_close($idcom);
        
    }
    else
    {
        echo "<script>alert(\"VEUILLEZ REMPLIR TOUS LES CHAMPS\");window.location.replace(\"showProduct.php\");</script>"; 

    }
