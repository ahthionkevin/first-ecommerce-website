<?php
    if(!isset($_SESSION))
        session_start();


    if(isset($_POST['seConnecter']))
    {
        if(!empty($_POST['mail']) && !empty($_POST['password']))
        {
            define("MYHOST","localhost");
            define("MYUSER","root");
            define("MYPASS","");
            $db="magasin";
    
            $idcom=@mysqli_connect(MYHOST,MYUSER,MYPASS,$db);

            $mail=$_POST['mail'];
            $password=$_POST['password'];

            $sql="SELECT * FROM client WHERE mail LIKE \"$mail\"";
            $result=mysqli_query($idcom,$sql);

            $coord=mysqli_fetch_row($result);

            if(empty($coord))
            {
                echo "LOGIN INCORRECT";
                //echo "<a href=\"signInView.php?mail=$coord[3]\">LIEN D'INSCRIPTION</a>";

                    echo "<script>";
                    echo "if(confirm(\"VEUILLEZ VOUS INSCRIRE SI VOUS N ETES PAS INSCRITS\"))window.location.replace(\"signInView.php\");";
                    echo "else window.location.replace(\"loginView.php\");";
                    echo "</script>";
            }
            else
            {
                $i=0;
                $monfichier = fopen('../tp1_2/passwd.txt', 'a+');
                while(!feof($monfichier))
                {
                    $ligne=fgets($monfichier);
                    $i++;
                    $reg='/^'. $id . ':/';

                    if(preg_match($reg,$ligne))
                        break;
                }

                fseek($fp, 0);
                for($j=0;$j<$i;$j++)
                {
                    $ligne=fgets($monfichier);
                }

                fclose($monfichier);

                if($password==$coord[5])
                {
                    $_SESSION['id']=$coord[0];
                    header("Location: index.php");
                }
                else
                {
                    echo "Mot de Passe Incorrect";
                    require 'newpass.php';
                }
            }
        }
        else
    {
                    echo "<script>";
                    echo "alert(\"VEUILLEZ REMPLIR TOUS LES CHAMPS\");window.location.replace(\"loginView.php\");";
                    echo "</script>";
    }
    }
    