<?php

    $connexionTime=0.15; //*100 = min
    $connexion=false;

    function getIPAddress() {  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
          }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
          }else{
            $ip = $_SERVER['REMOTE_ADDR'];
          }
        return $ip;
    }

    $modTime = date("YmdH.i", filemtime('DataBase/users.txt'));
    $nTime = date("YmdH.i", time());
    $diffTime = (float)$nTime-(float)$modTime;

    if ($diffTime > $connexionTime){
        $connexion=false;
        if ($diffTime > 10) {
            $file = fopen('DataBase/users.txt', "w") or die("Unable to open file!");
            fwrite($file, '');
            fclose($file);
        }
    } else {
        $ip = getIPAddress();
        $file = fopen('DataBase/users.txt', "r") or die("Unable to open file!");
        $filetxt = fread($file,filesize('DataBase/users.txt'));
        fclose($file);
        if (isset($_POST['pass']) AND $_POST['pass'] ==  "fblbadmin71"){
            $connexion = true;
            $file = fopen('DataBase/users.txt', "w") or die("Unable to open file!");
            fwrite($file, $ip."|\t|".$nTime."\n".$filetxt);
            fclose($file);  
        } else {
            $lines = explode('\n',$filetxt);
            foreach ($lines as $line){
                list($savedIP, $time) = explode('|'."\t".'|', $line);
                if ($savedIP == $ip){
                    if ((float)$nTime-(float)$time <= $connexionTime){
                        $connexion = true;
                        break;
                    }
                }
            }
        }           
    }

    fclose($file);
    include 'fablab.php';

?>
