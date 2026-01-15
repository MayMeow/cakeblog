<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="posts view content">
            <?= $post->body_html ?>
        </div>
    </div>
</div>