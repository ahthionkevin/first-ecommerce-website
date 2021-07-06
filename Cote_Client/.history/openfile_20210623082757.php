<?php
    $monfichier = fopen('../tp1_2/passwd.txt', 'a+');
    $id=28;
    $reg='/^' . $id ':/';
    while($ligne=fgets($monfichier))
    {
        $i++;

        if(preg_match())
    }

    fclose($monfichier);