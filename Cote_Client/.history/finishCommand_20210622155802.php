<?php
    if(!isset($_SESSION))
        session_start();

    if(isset($_SESSION['id']) && isset($_SESSION['panier']) && !empty($_SESSION['panier']))
    {
        $idClient=$_SESSION['id'];

        define("MYHOST","localhost");
        define("MYUSER","root");
        define("MYPASS","");
        $db="magasin";
    
        $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);

        $sql="SELECT * FROM client WHERE id_client=\"$idClient\"";
        $result=mysqli_query($idcom,$sql);
        $coord=mysqli_fetch_row($result);

        if(empty($coord))
            echo "<script>alert(\"Erreur de Transaction, Client Non Identifie\");window.location.replace(\"index.php\");</script>";

        
        $sql1="INSERT INTO commande(id_client,`date`) VALUES(\"$idClient\",NOW())";
        $result1=mysqli_query($idcom,$sql1);

        if($result1)
        {
            $sql1="SELECT * FROM commande WHERE id_client=\"$idClient\" ORDER BY `date` DESC";
            $result1=mysqli_query($idcom,$sql1);
            $coord1=mysqli_fetch_row($result1);

            if(!empty($coord1))
            {

                foreach($_SESSION['panier'] as $key=>$value)
                {
                    $sql2="SELECT * FROM article WHERE id_article=\"$key\"";

                    $result2=mysqli_query($idcom,$sql2);
                    $coord2=mysqli_fetch_row($result2);

                    if(!empty($coord2))
                    {
                        $sql3="INSERT INTO ligne(id_comm,id_article,quantite,prix_unit) VALUES (\"$coord1[0]\",\"$key\",\"$value\",\"$coord2[3]\")";
                        $result3=mysqli_query($idcom,$sql3);

                        $sql4="UPDATE article SET quantite=quantite-$value WHERE id_article=\"$key\"";
                        $result4=mysqli_query($idcom,$sql4);

                        if($result4 && $result3)
                        {
                            unset($_SESSION['panier'][$key]);

                            $dest = $coord[4];
                            $sujet = "Email de Confirmation";
                            $corp = "Votre Commande a bien ete realise";
                            $headers = "From: ahthionkevin@gmail.com";

                            if (mail($dest, $sujet, $corp, $headers)) {
                                echo "<script>alert(\"Transaction Reussi avec Envoi de MAIL vers $dest\");/*window.location.replace(\"index.php\");*/</script>";
                            } else {
                                echo "<script>alert(\"Transaction Reussi Sans Envoi de MAILs\");/*window.location.replace(\"index.php\");*/</script>";
                            }
                            
                        }
                        else
                        {
                            echo "<script>alert(\"Erreur de Transaction\");window.location.replace(\"index.php\");</script>";
                        }
                    }
                    else
                    {
                        echo "<script>alert(\"Erreur de Transaction\");window.location.replace(\"index.php\");</script>";

                    }
                    
                } 
            }
            else
            {
                echo "<script>alert(\"Erreur de Transaction\");window.location.replace(\"index.php\");</script>";
            }
            
        }
        else
        {
            echo "<script>alert(\"Erreur de Transaction\");window.location.replace(\"index.php\");</script>";
        }

    }
    else
    {
        echo "<h2>Error 404</h2>";
    }