<?php
if(isset($_POST['nom']) && isset($_POST['designation']) && isset($_POST['prix']) && isset($_POST['mail']) && !empty($_POST['nom']) && !empty($_POST['designation']) && !empty($_POST['prix']) && !empty($_POST['mail']) )
{     
    $nom=$_POST['nom'];
    $designation=$_POST['designation'];
    $prix=$_POST['prix'];
    $mail=$_POST['mail'];
    
    define("MYHOST","localhost");
    define("MYUSER","root");
    define("MYPASS","");
    $db="magasin";
    
    $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);
    //$idbase=@mysqli_select_db($db);
    
   $sql="INSERT INTO client (nom,designation,prix,mail) VALUES(\"$nom\",\"$designation\",\"$prix\",\"$mail\")";
    //$sql="INSERT INTO client(nom,designation,prix,mail) VALUES('ali','imane','Marrakech','xyz@gmail.com')";
    $result=mysqli_query($idcom,$sql);
    if($result)
        echo "<script>alert(\"VOS DONNEES ONT ETE AJOUTE AVEC SUUCES\");window.location(\"index.php\")</script>";
    else
    echo "<script>alert(\"ERREUR D ENVOI DE DONNEE\");window.location(\"index.php\")</script>";

    mysqli_close($idcom);
}
else
    echo "<script>alert(\"VEUILLEZ REMPLIR TOUS LES CHAMPS\");window.location(\"signIn.php\")</script>";