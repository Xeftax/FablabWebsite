<?php

    include 'ItemBox.php';

    header('content-type: text/css');
    ob_start('ob_gzhandler');
    header('Cache-Control: max-age=31536000, must-revalidate');
   
    switch ($state) {
        case 0 :

            $stateBackgroundColor='rgba(103, 186, 109, 0.7)';
            $stateBorderColor='#67BA6D';
            $statePos='0%';
            $stateChangeRight='rgba(245, 208, 97, 0.7)';
            $stateChangeLeft='rgba(207, 70, 71, 0.7)';

            break;

        case 1 :

            $stateBackgroundColor='rgba(245, 208, 97, 0.7)';
            $stateBorderColor='#F5D061';
            $statePos='15.46%';
            $stateChangeRight='rgba(103, 186, 109, 0.7)';
            $stateChangeLeft='rgba(207, 70, 71, 0.7)';

            break;

        case 2 :

            $stateBackgroundColor='rgba(207, 70, 71, 0.7)';
            $stateBorderColor='#CF4647';
            $statePos='0%';
            $stateChangeRight='rgba(103, 186, 109, 0.7)';
            $stateChangeLeft='rgba(245, 208, 97, 0.7)';

            break;
}
?>

.ItemState {
    background: <?php echo $stateBackgroundColor;?>;
    border: 1px solid <?php echo $stateBorderColor;?>;
}

.ItemState p {
    left: <?php echo $statePos;?>;
}

.ItemStateLeftChange {
    background: <?php echo $stateChangeLeft;?>;
}

.ItemStateRightChange {
    background: <?php echo $stateChangeRight;?>;
}