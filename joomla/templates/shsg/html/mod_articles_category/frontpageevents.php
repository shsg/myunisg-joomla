<?php defined('_JEXEC') or die; ?>


<div id="event-articles">
    <?php foreach ($list as $key => $item) : ?>
        <?php if ($key <= 5): ?>
            <div class="event-article">
                <h3>
                    <span><?php echo JHTML::_('date',$item->created, "D, j. F Y"); ?>:</span>
                    <?php if ($params->get('link_titles') == 1) : ?>
                    <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>" title="">
                    <?php endif; ?>
                    <?php echo $item->title; ?>
                    <?php if ($params->get('link_titles') == 1) : ?>
                    </a>
                    <?php endif; ?>
                </h3>
                <div class="event-article-content">
                    <?php echo $item->introtext; ?>
                    <a class="mod-articles-category-readmorelink" href="<?php echo $item->link; ?>" title="">Weiterlesen&hellip;</a>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
