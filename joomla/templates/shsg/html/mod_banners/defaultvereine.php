<?php
// no direct access
defined('_JEXEC') or die;

require_once JPATH_ROOT . '/components/com_banners/helpers/banner.php';
$baseurl = JURI::base();

$i = 0;
?>

<div id="clubs" class="box">
    <h3>Vereine</h3>
    <?php foreach($list as $item): ?>
    <?php $i++; if ($i > 4) break; ?>
    <a href="<?php echo JRoute::_('index.php?option=com_banners&task=click&id='. $item->id); ?>" title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>" target="_blank"><img src="<?php echo $item->params->get('imageurl'); ?>" alt="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>" /></a>
    <?php endforeach; ?>
</div>
