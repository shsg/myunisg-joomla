<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip'); 
JHtml::_('behavior.formvalidation');
?>
<form action="<?php echo JRoute::_('index.php?option=com_club&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="club-form" enctype="multipart/form-data">
  <fieldset class="adminform">
    <legend><?php echo JText::_('COM_CLUB_ADMIN_MENU_CLUB_CONST'); ?></legend>
    <label><?php echo JText::_('COM_CLUB_ADMIN_LABEL_CURRENT_CONST'); ?></label>    
    <?php if($this->item->file_constitution != '') : ?>
      <a href="<?php echo $this->item->file_constitution; ?>"><?php echo JText::_('COM_CLUB_ADMIN_LABEL_DOWNLOAD_CONST'); ?></a><br />
    <?php else : ?>
      <?php echo JText::_('COM_CLUB_ADMIN_LABEL_NO_CONST'); ?>
    <?php endif; ?>
    <label><?php echo JText::_('COM_CLUB_ADMIN_LABEL_UPLOAD_CONST'); ?></label>
    <input type="file" name="file_const" />
    <div>
      <input type="hidden" name="task" value="club.setConstitution" />
      <?php echo JHtml::_('form.token'); ?>
    </div>
  </fieldset>
</form>
