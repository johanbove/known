<?php
if (!empty($vars['items'])) {

    foreach($vars['items'] as $item) {

        echo '<pre>';
        print_r($item);
        echo '</pre>';

        /* @var \Idno\Entities\Reader\FeedItem $item */
        ?>
        <?php echo $item->draw()?>

        <?php

    }

} else {
    echo 'Nothing to stream...';
}

