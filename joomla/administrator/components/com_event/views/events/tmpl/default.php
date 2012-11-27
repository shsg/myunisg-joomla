<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// load tooltip behavior
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_event'); ?>" method="post" name="adminForm">
<table class="adminlist">
        <thead>
          <tr>
            <th><?php echo JText::_('COM_EVENT_ADMIN_LABEL_ID'); ?></th>
            <th><?php echo JText::_('COM_EVENT_ADMIN_LABEL_CATEGORY'); ?></th>                
            <th><?php echo JText::_('COM_EVENT_ADMIN_LABEL_CLUB_NAME'); ?></th>
            <th><?php echo JText::_('COM_EVENT_ADMIN_LABEL_NAME'); ?></th>
            <th><?php echo JText::_('COM_EVENT_ADMIN_LABEL_DATE'); ?></th>
            <th><?php echo JText::_('COM_EVENT_ADMIN_LABEL_PLACE'); ?></th>
            <th><?php echo JText::_('COM_EVENT_ADMIN_LABEL_EVENT_VISIBLE'); ?></th>
          </tr>
        </thead>
        <tfoot>
          <td colspan="7"><?php echo $this->pagination->getListFooter(); ?></td>
        </tfoot>
        <tbody>
          <?php foreach($this->items as $i => $item): ?>
          <tr class="row<?php echo $i % 2; ?>">
            <td>
               <?php echo JHtml::_('grid.id', $i, $item->id), $item->id; ?>
            </td>
            <td><?php echo $item->category_name; ?></td>
            <td><?php echo $item->club_name; ?></td>
            <td><a href="<?php echo JRoute::_('index.php?option=com_event'); ?>&task=event.edit&layout=edit&id=<?php echo $item->id; ?>"><?php echo $item->name; ?></a></td>            
            <td><?php echo $item->date_span; ?></td>
            <td><?php echo $item->place; ?></td>
            <td>
              <?php echo JHtml::_('jgrid.published', $item->record_visible == 'Y' ? 1 : 0, $i, 'events.', true, 'cb'); ?>
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
