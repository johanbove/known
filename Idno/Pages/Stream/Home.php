<?php

namespace Idno\Pages\Stream {

    use Idno\Entities\Reader\Feed;

    class Home extends \Idno\Common\Page
    {

        function getContent()
        {
            if ($items = Feed::get()) {

                $t = \Idno\Core\Idno::site()->template();
                $t->__(array(
                    'title' => 'Stream',
                    'body'  => $t->__(array(
                        'items' => $items
                    ))->draw('stream/home')
                ))->drawPage();

            }

        }

    }

}

