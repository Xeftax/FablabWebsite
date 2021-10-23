<?php

$sItemTitle = $_POST['itemTitle'];

try {

    $db = new PDO('sqlite:fablabdata.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETC_ASSOC);
    $stmt = $db->prepare('INSERT INTO mahines VALUES(:title)');
    $stmt->bindValue(':title', $sItemTitle);
    $stmt->execute();

} catch(PDOException $ex) {
    echo '{"status":0, "lin":'.__LINE__.'}';
    exit;
}








