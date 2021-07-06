<?php
    if(!isset($_SESSION))
        session_start();

    if(!isset($_SESSION['panier']))
        $_SESSION['panier']= array();

    if(!isset($_SESSION['content']))
        $_SESSION['content']=0;

    if(isset($_POST['valider']))
    {
        if(isset($_GET['idProduct']))
        {
            $idProduct=$_GET['idProduct'];
            if(!empty($_POST['qte']) && $_POST['qte']>0)
            {
                
                define("MYHOST","localhost");
                define("MYUSER","root");
                define("MYPASS","");
                $db="magasin";
                
                $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);

                $qte=$_POST['qte'];
                $sql1="SELECT * FROM article WHERE id_article=\"$idProduct\"";

                $result1=mysqli_query($idcom,$sql1);
                $coord1=mysqli_fetch_row($result1);

                if(empty($coord1))
                {
                    die("Aucun Produits a ajouter au panier");
                }

                $_SESSION['panier'][$coord1[0]]=$qte;

                echo "<pre>";
                var_dump($_SESSION);
                echo "</pre>";

                echo "<script>window.location.replace(\"panier.php\")</script>";
          
            }
        }
        else
        {
            die("Aucun Produits a ajouter au panier");
        }
    }
    else
    {

    }
        