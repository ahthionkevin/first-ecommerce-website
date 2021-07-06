<?php
    $monfichier = fopen('../tp1_2/passwd.txt', 'a+');
    $id=29;
    $reg='/^' . $id .':/';
    $i=0;
    $ver=false;
    while($ligne=fgets($monfichier))
    {
        
        if(preg_match($reg,$ligne))
        {
            $password1=explode(':',$ligne);
            var_dump($password1);
            $ver=true;
            break;
        }
    }

    fclose($monfichier);