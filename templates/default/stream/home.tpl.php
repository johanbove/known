<?php
if (!empty($vars['feeds'])) {

    echo '<h1>Stream</h1>';

    foreach($vars['feeds'] as $feed) {

        // echo '<pre>';
        // print_r($feed);
        // echo '</pre>';

        /* @var \Idno\Entities\Reader\FeedItem $item */
        ?>
        <?php $items = $feed->retrieveItems(); ?>

        <?php echo '<h3><a href="' . $feed->getFeedURL() . '" class="u-follow-of">' . $feed->title . '</a></h3>'; ?>

        <?php
        // echo '<pre>';
        // print_r($items);
        // echo '</pre>';

        echo '<ol>';
        foreach($items as $item) {
            echo '<li><a href="' . $item->url . '">' . $item->title . '</a></li>';
        }
        echo '</ol>';
    }

} else {
    echo 'Nothing to stream...';
}

