<?php
    if(isset($_POST['modifier']) && isset($_GET['idProduct']) && !empty($_GET['idclient']))
    {
        $id=$_GET['idclient'];
       


        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $mail=$_POST['mail'];
        
        define("MYHOST","localhost");
        define("MYUSER","root");
        define("MYPASS","");
        $db="magasin";
        
        $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);

        $sql="UPDATE client SET nom=\"$nom\",prenom=\"$prenom\",adresse=\"$adresse\",mail=\"$mail\" WHERE id_client=\"$id\"";

        $result=mysqli_query($idcom,$sql);
        if($result)
            echo "<script>alert(\"VOS DONNEES ONT ETE MODIFIER AVEC SUCCES\");window.location(\"index.php\")</script>";
        else
        echo "<script>alert(\"VOS DONNEES N ONT PAS PU ETRE MODIFIER\");window.location(\"index.php\")</script>";
    
        mysqli_close($idcom);
    }