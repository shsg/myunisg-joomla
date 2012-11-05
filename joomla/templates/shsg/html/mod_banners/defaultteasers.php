<?php
// no direct access
defined('_JEXEC') or die;

require_once JPATH_ROOT . '/components/com_banners/helpers/banner.php';
$baseurl = JURI::base();
?>

<div id="teasers">
    <div id="main-teaser-left" class="main-teaser box">
        <?php foreach($list as $item): ?>
            <?php if ($item->params->getValue('alt') == "mainad-left") : ?>
        <a href="<?php echo JRoute::_('index.php?option=com_banners&task=click&id='. $item->id); ?>" title="">
            <img src="<?php echo $item->params->get('imageurl'); ?>" alt="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>" >
            <span class="teaser-bg"></span>
            <span class="teaser-title"><?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>&hellip;</span>
        </a>
            <?php
                $found = true;
                break;
                endif;
            ?>
        <?php endforeach; ?>
    </div>
    <div id="main-teaser-right" class="main-teaser box">
        <?php foreach($list as $item): ?>
            <?php if ($item->params->getValue('alt') == "mainad-right") : ?>
        <a href="<?php echo JRoute::_('index.php?option=com_banners&task=click&id='. $item->id); ?>" title="">
            <img src="<?php echo $item->params->get('imageurl'); ?>" alt="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>" >
            <span class="teaser-bg"></span>
            <span class="teaser-title"><?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>&hellip;</span>
        </a>
            <?php
                $found = true;
                break;
                endif;
            ?>
        <?php endforeach; ?>
    </div>
    <div id="sub-teasers">
        <div class="sub-teaser box" id="sub-teaser-1">
            <?php foreach($list as $item): ?>
                <?php if ($item->params->getValue('alt') == "subad-left") : ?>
            <a href="<?php echo JRoute::_('index.php?option=com_banners&task=click&id='. $item->id); ?>" title="">
                <img src="<?php echo $item->params->get('imageurl'); ?>" alt="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>" >
                <span class="teaser-bg"></span>
                <span class="teaser-title"><?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>&hellip;</span>
            </a>
                <?php
                    $found = true;
                    break;
                    endif;
                ?>
            <?php endforeach; ?>
        </div>
        <div class="sub-teaser box" id="sub-teaser-2">
            <?php foreach($list as $item): ?>
                <?php if ($item->params->getValue('alt') == "subad-middle") : ?>
            <a href="<?php echo JRoute::_('index.php?option=com_banners&task=click&id='. $item->id); ?>" title="">
                <img src="<?php echo $item->params->get('imageurl'); ?>" alt="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>" >
                <span class="teaser-bg"></span>
                <span class="teaser-title"><?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>&hellip;</span>
            </a>
                <?php
                    $found = true;
                    break;
                    endif;
                ?>
            <?php endforeach; ?>
        </div>
        <div class="sub-teaser box" id="sub-teaser-3">
            <?php foreach($list as $item): ?>
                <?php if ($item->params->getValue('alt') == "subad-right") : ?>
            <a href="<?php echo JRoute::_('index.php?option=com_banners&task=click&id='. $item->id); ?>" title="">
                <img src="<?php echo $item->params->get('imageurl'); ?>" alt="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>" >
                <span class="teaser-bg"></span>
                <span class="teaser-title"><?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>&hellip;</span>
            </a>
                <?php
                    $found = true;
                    break;
                    endif;
                ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>