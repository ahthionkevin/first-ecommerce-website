<?php
    if(isset($_GET['idclient']) && !empty($_GET['idclient']))
    {
        $id=$_GET['idclient'];
        $sql="DELETE FROM client WHERE id_client=\"$id\"";

        define("MYHOST","localhost");
        define("MYUSER","root");
        define("MYPASS","");
        $db="magasin";
        
        $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);

        $result=@mysqli_query($idcom,$sql);

        if($result)
        {
            echo "<script>alert(\"Suppression Succes\"); window.location.replace(\"index.php\");</script>";
        }
    }