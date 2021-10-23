<?php
    
    try {

        $db = new PDO('sqlite:fablabdata.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $stmt = $db->prepare('SELECT * FROM machines');
        $stmt->execute();
        echo json_encode($stmt->fetchAll());
                
    } catch(PDOException $ex) {
        echo '{"status":0, "lin":'.__LINE__.'}';
        exit;
    }

?>

<?php
                try {

                    $db = new PDO('sqlite:fablabdata.db');
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    $stmt = $db->prepare('SELECT * FROM machines');
                    $stmt->execute();
                    echo json_encode($stmt->fetchAll());
                
                } catch(PDOException $ex) {
                    echo '{"status":0, "lin":'.__LINE__.'}';
                    exit;
                }
            ?>
            </p>
            <script>
                var edit = document.getElementById('item_title');
                edit.addEventListener('blur', function(){
                    <?php $db = new SQLite3('fablabdata.db');
                    $value = $_GET['itemTitle'];
                    $query = $db->exec('UPDATE machines SET title=$value WHERE itemId=0');
                    if ($query) {$db->changes();}
                    ?>
                });
            </script>