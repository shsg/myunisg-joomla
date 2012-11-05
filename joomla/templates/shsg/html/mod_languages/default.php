<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
// JHtml::_('stylesheet', 'mod_languages/template.css', array(), true);
?>
<div id="language-switcher" class="mod-languages<?php echo $moduleclass_sfx ?>">
<?php
    $numItems = count($list);
    $i = 1;
?>
<?php foreach($list as $language):?>
	<?php if ($params->get('show_active', 0) || !$language->active):?>
		<a href="<?php echo $language->link;?>" class="<?php echo $language->active ? 'lang-active' : '';?>" title="<?php echo $language->title; ?>"><?php echo $language->title;?></a><?php if ($i != $numItems) : ?> | <?php endif ?> 
	<?php $i++; endif;?>
<?php endforeach;?>
</div>
