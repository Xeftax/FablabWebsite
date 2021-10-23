<?php
    $path = scandir('DataBase/data/',1)[0];
    $file = fopen($path, "r") or die("Unable to open file!");
    $lines = explode('\n',fread($file,filesize($path)));
    fclose($file);
?>

<script>
    let lines = []
    var phpLines = json_encode($lines)
    phpLines.forEach((item) => {
        lines.push(item.split('|\t|'))
        lines.forEach((item, index) => {
            document.getElementById
        })
    })

    function(itemid, valueindex, value){
        lines[itemid][valueindex] = value
        <?php
            $path = scandir('DataBase/data/',1)[0];
            $file = fopen($path, "w") or die("Unable to open file!");
            
            //list($id, $title, $picture, $state, $time, $nbwait, $desctitle, $description, $descpicture, $desclink) = explode('|\t|', $line);
            fclose($file);
        ?>
    }
</script>
