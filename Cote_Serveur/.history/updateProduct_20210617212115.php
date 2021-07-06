<?php
    if(isset($_POST['modifier']) && isset($_GET['idProduct']) && !empty($_GET['idProduct']))
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

        $sql="UPDATE article SET nom=\"$nom\",designation=\"$designation\",prix=\"$prix\",categorie=\"$categorie\" WHERE id_articlet=\"$id\"";

        $result=mysqli_query($idcom,$sql);
        if($result)
            echo "<script>alert(\"VOS DONNEES ONT ETE MODIFIER AVEC SUCCES\");window.location(\"indexProduct.php\")</script>";
        else
        echo "<script>alert(\"VOS DONNEES N ONT PAS PU ETRE MODIFIER\");window.location(\"indexProduct.php\")</script>";
    
        mysqli_close($idcom);
    }