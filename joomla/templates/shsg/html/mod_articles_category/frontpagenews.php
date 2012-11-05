<?php defined('_JEXEC') or die; ?>

<div id="news-articles">
    <?php foreach ($list as $key => $item) : ?>
        <?php if ($key <= 3): ?>
            <div class="news-article">
                <h3>
                    <?php if ($params->get('link_titles') == 1) : ?>
                    <a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>" title="">
                    <?php endif; ?>
                    <?php echo $item->title; ?>
                    <?php if ($params->get('link_titles') == 1) : ?>
                    </a>
                    <?php endif; ?>
                    <span>(<?php echo JHTML::_('date',$item->created, "D, j. F Y"); ?>)</span>
                </h3>
                <div class="news-article-content">
                    <?php
                        $text = JHTML::_('string.truncate', (strip_tags($item->introtext)), 260);
                        $text = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\">\\0</a>", $text); # TODO auf preg_replace aendern
                    ?>
                    <?php echo $text; ?>
                    <a class="mod-articles-category-readmorelink" href="<?php echo $item->link; ?>" title="">Weiterlesen&hellip;</a>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
