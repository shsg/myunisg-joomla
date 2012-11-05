<?php defined('_JEXEC') or die; ?>

<div id="event-articles">
    <?php if (count($events) > 0) { ?>
        <?php foreach ($events as $event) : ?>
                <div class="event-article">
                    <h3>
                        <span><?php echo $event->date_span; ?>:&nbsp;&nbsp;<em><?php echo $event->club_name; ?></em></span><br>
                        <?php if (true) : // ($params->get('link_titles') == 1) : ?>
                        <a class="" href="<?php echo JRoute::_('index.php?option=com_event&view=event&id=' . $event->id . '&name=' . $event->name); ?>" title="">
                        <?php endif; ?>
                        <?php echo $event->name; ?>
                        <?php if (true) : // ($params->get('link_titles') == 1) : ?>
                        </a>
                        <?php endif; ?>
                    </h3>
                    <?php
                        $text = preg_replace('/\s+?(\S+)?$/', '', substr($event->description, 0, 83));
                        # $text = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\">\\0</a>", $text); # TODO auf preg_replace aendern
                    ?>
                 <!--   <div class="event-article-content">
                        (<?php echo $event->category_name; ?>, <?php echo $event->club_name; ?>) <?php echo $text; ?>&hellip;&nbsp;
                        <a class="mod-articles-category-readmorelink" href="<?php echo JRoute::_('index.php?option=com_event&view=event&id=' . $event->id . '&name=' . $event->name); ?>" title="">Anzeigen&hellip;</a>
                    </div> -->
                </div>
        <?php endforeach; ?>
    <?php } else { ?>
        <em>Derzeit stehen keine aktuellen Events an.</em>
    <?php } ?>
</div>
