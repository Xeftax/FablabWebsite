<?php

    //$path = scandir('DataBase/data/',1)[0];
    $file = fopen("Database/data/data.txt", "r") or die("Unable to open file!");
    $lines = explode('\n',fread($file,filesize("Database/data/data.txt")));
    fclose($file);

?>