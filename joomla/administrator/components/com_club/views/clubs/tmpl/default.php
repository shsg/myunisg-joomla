<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// load tooltip behavior
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_club'); ?>" method="post" name="adminForm">
<table class="adminlist">
        <thead>
          <tr>
            <th><?php echo JText::_('COM_CLUB_ADMIN_LABEL_CLUB_SELECTED'); ?></th> 
            <th><?php echo JText::_('COM_CLUB_ADMIN_LABEL_CATEGORY'); ?></th>                
            <th><?php echo JText::_('COM_CLUB_ADMIN_LABEL_CLUB_NAME'); ?></th>
            <th><?php echo JText::_('COM_CLUB_ADMIN_LABEL_CLUB_MAIL'); ?></th>
            <th><?php echo JText::_('COM_CLUB_ADMIN_LABEL_CLUB_WEBSITE'); ?></th>
            <th><?php echo JText::_('COM_CLUB_ADMIN_LABEL_CLUB_MUSER'); ?></th>
            <th><?php echo JText::_('COM_CLUB_ADMIN_LABEL_CLUB_VISIBLE'); ?></th>
          </tr>
        </thead>
        <tfoot>
          <td colspan="7"><?php echo $this->pagination->getListFooter(); ?></td>
        </tfoot>
        <tbody>
          <?php foreach($this->items as $i => $item): ?>
          <tr class="row<?php echo $i % 2; ?>">
            <td>
               <?php echo JHtml::_('grid.id', $i, $item->id); ?>
            </td>
            <td><?php echo $item->category_title == '' ? '(Undefiniert)' : $item->category_title; ?></th>
            <td><a href="<?php echo JRoute::_('index.php?option=com_club&task=club.edit&id=' . $item->id); ?>"><?php echo $item->name; ?></a></td>
            <td><?php echo $item->email; ?></td>
            <td><?php echo $item->website; ?></td>
            <td><?php echo $item->user_fullname == '' ? JText::_('COM_CLUB_ADMIN_UNDEFINED') : $item->user_loginname . " (" . $item->user_fullname . ")"; ?></td>
            <td>
              <?php echo JHtml::_('jgrid.published', $item->record_visible == 'Y' ? 1 : 0, $i, 'clubs.', true, 'cb'); ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
</table>
<div>
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="boxchecked" value="0" />
  <?php echo JHtml::_('form.token'); ?>
</div>
</form>
