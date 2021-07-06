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
               // echo "LOGIN INCORRECT";
                //echo "<a href=\"signInView.php?mail=$coord[3]\">LIEN D'INSCRIPTION</a>";

                echo "<script>";
                    echo "if(confirm(\"VEUILLEZ VOUS INSCRIRE SI VOUS N ETES PAS INSCRITS\"))window.location.replace(\"loginView.php\");";
                    echo "else window.location.replace(\"signInView.php\");";
                    echo "</script>";
            }
            else
            {
                if($password==$coord[5])
                {
                    $_SESSION['id']=$coord[0];
                    header("Location: index.php");
                }
                else
                {
                    echo "Mot de Passe Incorrect";
                    //require 'new'
                }
            }
        }
    }