<?php
    $monfichier = fopen('../tp1_2/passwd.txt', 'a+');
    $id=28;
    while($ligne=fgets($monfichier))
    {
        $i++;
    }

    fclose($monfichier);