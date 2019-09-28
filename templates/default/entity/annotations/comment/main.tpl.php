<?php

    $user = \Idno\Core\Idno::site()->session()->currentUser();
    $object = $vars['object'];

if (!empty($user) && !empty($object)) {

    ?>
    <div class="row annotation-add">
        <div class="col-md-2 owner h-card visible-md visible-lg">
            <a href="<?php echo $user->getDisplayURL() ?>" class="u-url icon-container"><img class="u-photo"
                                                                                      src="<?php echo $user->getIcon() ?>"/></a>
        </div>
        <div class="col-md-10 idno-comment-container">
            <form action="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL()?>annotation/post" method="post">
                <textarea name="body" placeholder="<?php echo \Idno\Core\Idno::site()->language()->_('Add a comment ...'); ?>" class="form-control mentionable ctrl-enter-submit"></textarea>
                <p style="text-align: right">
                <?php echo \Idno\Core\Idno::site()->actions()->signForm('annotation/post') ?>
                    <input type="hidden" name="object" value="<?php echo $object->getUUID()?>">
                    <input type="hidden" name="type" value="reply">
                    <input type="submit" class="btn btn-save" value="<?php echo \Idno\Core\Idno::site()->language()->_('Leave Comment'); ?>">
                </p>
            </form>
        </div>
    </div>
    <?php

    // Prevent scope pollution
    unset($this->vars['action']);
}

if (\Idno\Core\Idno::site()->currentPage()->isPermalink()
    && !empty($object)
    && ($object->access == 'PUBLIC')
) {
?>
<style>
.webmention-url-form {
   display: none;
}
body.idno_pages_entity_view .webmention-url-form {
   display: block;
}
.webmention-url-form form {
opacity: 0.5;
transition: opacity .2s;
}
.webmention-url-form:focus form,
.webmention-url-form:hover form{
opacity: 1;
}
</style>
<div class="row annotation-add webmention-url-form" style="margin-bottom:15px;">
   <div class="col-md-12 idno-comment-container">
     <p><em><?php echo \Idno\Core\Idno::site()->language()->_('Did you write a <a href="https://indieweb.org/responses" rel="noopener">response</a> to this post? Let me know the URL:'); ?></em></p>
     <form action="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL()?>webmention" method="post">
        <div class="input-group">
           <input class="form-control" name="source" type="url" required placeholder="<?php echo \Idno\Core\Idno::site()->language()->_('Your URL'); ?>">
           <div class="input-group-btn">
              <input class="btn btn-default" type="submit" value="<?php echo \Idno\Core\Idno::site()->language()->_('Send Webmention'); ?>">
           </div>
        </div>
        <input type="hidden" name="content-type" value="html">
        <input type="hidden" name="target" value="<?php echo $object->getDisplayURL()?>">
     </form>
   </div>
</div>
<?php
}