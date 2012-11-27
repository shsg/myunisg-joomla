<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// load tooltip behavior
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_event'); ?>" method="post" name="adminForm" enctype="multipart/form-data">
	<div>
		<label><?php echo JText::_('COM_EVENT_ADMIN_LABEL_NEW_ATTACHEMENT'); ?></label>
		<input type="file" name="file_attachement" />
		<br />
		<?php echo JText::_('COM_EVENT_ADMIN_UPLOAD_RESTRICTION'); ?>
		<br /><br />
		<?php if (isset($this->attachement) && $this->attachement->link != '') : ?>
			<?php if($this->attachement->type == 'image') : ?>
			<img src="<?php echo $this->attachement->link_thumb; ?>" />
			<?php else : ?>
			<a href="<?php echo $this->attachement->link; ?>" target="_blank"><?php echo JText::_('COM_EVENT_ADMIN_DOWNLOAD_ATTACHEMENT'); ?></a>
			<?php endif; ?>
		<?php else : ?>
		<label><?php echo JText::_('COM_EVENT_ADMIN_LABEL_NO_ATTACHEMENT'); ?></label>
		<br /><br />
		<?php endif; ?>
		<?php echo JHtml::_('form.token'); ?>
		<input type="hidden" name="task" value="attachement.save" />
		<input type="hidden" name="id" value="<?php echo $this->id; ?>" />
	</div>
</form>
<br />