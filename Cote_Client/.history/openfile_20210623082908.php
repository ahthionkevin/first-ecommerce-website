<?php
    $monfichier = fopen('../tp1_2/passwd.txt', 'a+');
    $id=28;
    $reg='/^' . $id .':/';
    while($ligne=fgets($monfichier))
    {
        $i++;

        if(preg_match($reg,$ligne))
        {
            echo $ligne;
            echo $i;
            break;
        }
    }

    fclose($monfichier);