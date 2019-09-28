<?php

    $url = \Idno\Core\Idno::site()->config()->getDisplayURL() . 'content/replies/' . $vars['search'];
    $title = \Idno\Core\Idno::site()->language()->_('Replies');
    $icon = '<i class="fa fa-reply"></i>';

    echo $this->__(array( 'url' => $url, 'title' => $title, 'icon' => $icon ))->draw('shell/toolbar/content/entry');

