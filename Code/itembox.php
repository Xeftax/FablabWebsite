<?php
    /* get data */

    $path = "Database/data/" . scandir('DataBase/data/',1)[0];
    $file = fopen($path, "r") or die("Unable to open file!");
    //echo fread($file,filesize($path));
    $lines = explode("\n",fread($file,filesize($path)));
    fclose($file);

    foreach ($lines as $line){

        list($id, $title, $picture, $state, $time, $nbwait, $desctitle, $description, $descpicture, $desclink) = explode('|'."\t".'|', $line);
        //echo $id;
        //echo $lines;
        $stateRight = 0;
        $stateLeft = 0;

        /* update CSS */
        switch ($state) {
            case 0 :
                $stateRight = 1;
                $stateLeft = 2;
                echo '<style type="text/css" id="styles">';
                echo '.ItemState {background: rgba(103, 186, 109, 0.7);';
                echo 'border: 1px solid #67BA6D;}';
                echo '.ItemState p {left: 0%;}'; 
                echo '.ItemStateLeftChange {background: rgba(245, 208, 97, 0.7);}';
                echo '.ItemStateRightChange {background: rgba(207, 70, 71, 0.7);}';
                break;

            case 1 :
                $stateRight = 0;
                $stateLeft = 2;
                echo '<style type="text/css" id="styles">';
                echo '.ItemState {background: rgba(245, 208, 97, 0.7);';
                echo 'border: 1px solid #F5D061;}';
                echo '.ItemState p {left: 15.46%;}'; 
                echo '.ItemStateLeftChange {background: rgba(103, 186, 109, 0.7);}';
                echo '.ItemStateRightChange {background: rgba(207, 70, 71, 0.7);}';
                break;

            case 2 :
                $stateRight = 0;
                $stateLeft = 1;
                echo '<style type="text/css" id="styles">';
                echo '.ItemState {background: rgba(207, 70, 71, 0.7);';
                echo 'border: 1px solid #CF4647;}';
                echo '.ItemState p {left: 0%;}'; 
                echo '.ItemStateLeftChange {background: rgba(103, 186, 109, 0.7);}';
                echo '.ItemStateRightChange {background: rgba(245, 208, 97, 0.7);}';
                break;
        }
        /* change text cursor on admin */
        if($connexion){
            echo '.ItemTitle {cursor: text;}';
            echo '.ItemTimeWait {cursor: text;}';
            echo '.ItemWaitListText {cursor: text;}';
        }
        /*echo '.ItemBackground {';
        echo "grid-column: $id +1;";
        echo 'grid-row: 1;}';*/
        echo '</style>';

        /* write HTML */
        echo "<div id='item_background_$id' class='ItemBackground'>";
        echo '<div class="ItemLine"></div>';
        echo "<p id='item_title_$id' class='ItemTitle' ";
        if ($connexion){echo "contenteditable='true'";};
        echo ">$title</p>";
        echo "<img class='ItemPicture' src=$picture>";
        if ($connexion){
        echo '<div class="ItemSelectPictureBackground">';
        echo '<div class="ItemSelectPicture">';
        //echo '<label for="import_image">Importer une image</label>';
        echo '<form action="./ItemPictures/upload.php" method="post" enctype="multipart/form-data">';
        echo '<input type="file" id="import_image" name="the_file" accept="image/png, image/jpeg, image/jpg">';
        echo '</form>';
        echo '<p>Importer une image</p>';
        echo '</div>';
        echo '</div>';
        }
        echo "<div id='item_state_$id'class='ItemState'>"."\n";

        /* adapt HTML */
        switch ($state) {
            case 0 :
                echo '<p>Disponible'."\n";
                echo '</p>'."\n";
                break;

            case 1 :
                echo '<img src="ItemBox/wait_logo.png" alt="Fablab machine wait icon." srcset="ItemBox/wait_logo.svg">'."\n";
                echo '<p>Utilisé</p>'."\n";
                break;

            case 2 :
                echo '<p>En panne</p>'."\n";
                break;
        }
        if ($connexion){
        echo '<div class="ItemStateLeftChangeSelector" onclick="changeStateColor(0)"></div>'."\n";
        echo '<div class="ItemStateRightChangeSelector" onclick="changeStateColor(1)"></div>'."\n";
        echo "<div class='ItemStateRightChange'></div>"."\n";
        echo "<div class='ItemStateLeftChange'></div>"."\n";
        }
        echo '</div>'."\n";

        /* special 'utilisé' sate */
        if ($state == 1) {
            echo "<p id='item_timewait_$id' class='ItemTimeWait' ";
            if ($connexion){echo "contenteditable='true'";};
            echo ">≃$time</p>"."\n";
            if ($nbwait != 0 OR $connexion=true) { //0 en non editabe
                echo '<div class="ItemWaitList">'."\n";
                echo "<p class='ItemWaitListText' id='item_waitlist_$id' ";
                if ($connexion){echo "contenteditable='true'";};
                echo ">+$nbwait</p>"."\n";
                echo '</div>'."\n";
            }
        }

        /* end writing */
        echo '<img class="ItemInfoIcon" src="ItemBox/info_logo.png" alt="Fablab machine info icon." srcset="ItemBox/info_logo.svg">'."\n";
        echo '</div>'."\n";

        /* edit file script */
        if ($connexion){
        echo "<script>";
        echo "let modLine_$id = '$lines[$id]'.split('|\t|');"."\n";
        echo "let filePt1_$id = '';"."\n";
        echo "let filePt2_$id = '';"."\n";
        echo "for (let i = 0; i < " . sizeof($lines) . "; i++) {"."\n";
        echo "if (i < $id) {filePt1 = filePt1+'".$lines[i]."'".' + "\n";}'."\n"; //    /!\ peut etre la cause d'une erreur car compris comme un caractère
        echo "if (i > $id)".'{filePt2 = "\n" +'."filePt2+'".$lines[i]."';}}"."\n";
            //Update Text Data Function
        echo "function updateTextData(newtext, index) {\n";
        echo "  let line = '';\n";
        echo "  for (let i = 0; i < modLine_$id.length; i++) {\n";
        echo "      if (i != index) {line = line + modLine_$id"."[i]".';}'."\n";
        echo '      else {line = line + newtext;}'."\n";
        echo "      if (i != modLine_$id.length -1) {line = line  + '|\t|';}}\n";
        echo "  $.ajax({type: 'POST',url: 'scripts/savefile.php',data: {data: line}})};";
            //Update Title
        echo "var editTitle_$id = document.getElementById('item_title_$id');\n";
        echo "editTitle_$id.addEventListener('blur', function(){\n";
        echo "  updateTextData(editTitle_$id.innerHTML, 1)});\n";

        if ($state == 1){
            //Update Time Wait
        echo "var editTimeWait_$id = document.getElementById('item_timewait_$id');\n";
        echo "editTimeWait_$id.addEventListener('blur', function(){\n";
        echo "  text = editTimeWait_$id.innerHTML;\n";
        echo "  if (text[0] == '≃') {text = text.substr(1);}\n";
        echo "  updateTextData(text, 4)});\n";
            //Update Wait List
        echo "var editWaitList_$id = document.getElementById('item_waitlist_$id');\n";
        echo "editWaitList_$id.addEventListener('blur', function(){\n";
        echo "  text = editWaitList_$id.innerHTML;\n";
        echo "  if (text[0] == '+') {text = text.substr(1);}\n";
        echo "  updateTextData(text, 5)});\n";
        }

            //Uptate State
        echo "function changeStateColor(state_id){\n";
        echo "  newState = 0;\n";
        echo "  if (state_id == 1){newState = $stateLeft}\n";
        echo "  else {newState = $stateRight}\n";
        echo "  let line = '';\n";
        echo "  for (let i = 0; i < modLine_$id.length; i++) {\n";
        echo "      if (i != 3) {line = line + modLine_$id"."[i]".';}'."\n";
        echo '      else {line = line + newState;}'."\n";
        echo "      if (i != modLine_$id.length -1) {line = line  + '|\t|';}}\n";
        echo "  $.ajax({type: 'POST',url: 'scripts/savefile.php',data: {data: line}});\n";
        echo "  window.location.reload();};\n";
        echo "</script>";
        
        }
    }
?>




