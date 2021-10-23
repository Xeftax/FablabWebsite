<?php 
    $data = $_POST['data'];
    $path = "../Database/data/data.txt";// . scandir('DataBase/data/',1)[0];

    echo $path."\n";
    echo $data."\n";

    $file = fopen($path, "w") or die("Unable to open file!");
    fwrite($file, $data);
    fclose($file);
    ?>