<?php
    if(isset($_POST['modifier']) && isset($_GET['idProduct']) && !empty($_GET['idProduct']))
    {
        $id=$_GET['idProduct'];

        print_r($_FILES);eexit();
       
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

                $sql="UPDATE article SET nom=\"$nom\",designation=\"$designation\",prix=\"$prix\",categorie=\"$categorie\",quantite=\"$qte\",`image`=\"$name\' WHERE id_article=\"$id\"";

                $result=mysqli_query($idcom,$sql);
                if($result)
                    echo "<script>alert(\"VOS DONNEES ONT ETE MODIFIER AVEC SUCCES\");window.location(\"indexProduct.php\")</script>";
                else
                    echo "<script>alert(\"VOS DONNEES N ONT PAS PU ETRE MODIFIER\");window.location(\"indexProduct.php\")</script>";
            
                mysqli_close($idcom);
                    }
                } 
                else{
                    echo 'You should select a file to upload !!';
                }

        
    }