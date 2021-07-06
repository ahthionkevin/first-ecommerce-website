<?php
    $monfichier = fopen('../tp1_2/passwd.txt', 'a+');
    $id=28;
    $reg='/^' . $id .':/';
    $i=0;
    while($ligne=fgets($monfichier))
    {
        $i++;

        if(preg_match($reg,$ligne))
        {
            echo $ligne;
            echo $i;
            $password1=explode(':',$ligne);
            break;
        }
    }

    fclose($monfichier);