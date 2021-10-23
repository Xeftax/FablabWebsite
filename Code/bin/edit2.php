<script>
    var edit = document.getElementById('item_title');

    edit.addEventListener('blur', function(){
        text = this.innerHTML
        <?php $db = new SQLite3('fablabdata.db');
            $value = $_GET['itemTitle'];
            $query = $db->exec('UPDATE machines SET title=$value WHERE itemId=0');
            if ($query) {
                echo 'Nombre de lignes modifiées : ', $db->changes();}
        ?>
    })
</script>


