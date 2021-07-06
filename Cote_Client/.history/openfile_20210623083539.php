<?php
    $monfichier = fopen('../tp1_2/passwd.txt', 'a+');
    $reg='/^' . $id .':/';
    $i=0;
    $ver=$false;
    while($ligne=fgets($monfichier))
    {
        
        if(preg_match($reg,$ligne))
        {
            echo $ligne;
            echo $i;
            $password1=explode(':',$ligne);
            var_dump($password1);
            break;
        }
    }

    fclose($monfichier);