<?php

namespace Idno\Pages\Stream {

    use Idno\Entities\Reader\Feed;

    class Home extends \Idno\Common\Page
    {

        function getContent()
        {
            if ($feeds = Feed::get()) {

                $t = \Idno\Core\Idno::site()->template();
                $t->__(array(
                    'title' => 'Stream',
                    'body'  => $t->__(array(
                        'feeds' => $feeds
                    ))->draw('stream/home')
                ))->drawPage();

            }

        }

    }

}

