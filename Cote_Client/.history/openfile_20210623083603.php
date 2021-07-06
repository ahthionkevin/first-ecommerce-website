<?php
    $monfichier = fopen('../tp1_2/passwd.txt', 'a+');
    $reg='/^' . $id .':/';
    $i=0;
    $ver=$false;
    while($ligne=fgets($monfichier))
    {
        
        if(preg_match($reg,$ligne))
    
            $password1=explode(':',$ligne);
            $ver=true;
            break;
        }
    }

    fclose($monfichier);