<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
<tr class="row<?php echo $i % 2; ?>">
        <td>
           <?php echo JHtml::_('grid.id', $i, $item->id); ?>
        </td>
        <td><?php echo $item->category_title == '' ? '(Undefiniert)' : $item->category_title; ?></th>
        <td><a href="<?php echo JRoute::_('index.php?option=com_club&task=club.edit&id=' . $item->id); ?>"><?php echo $item->name; ?></a></td>
        <td><?php echo $item->email; ?></td>
        <td><?php echo $item->website; ?></td>
        <td><?php echo $item->username == '' ? JText::_('COM_CLUB_ADMIN_UNDEFINED') : $item->username; ?></td>
        <td>
          <?php echo JHtml::_('jgrid.published', $item->record_visible == 'Y' ? 1 : 0, $i, 'clubs.', true, 'cb'); ?>
        </td>
</tr>
<?php endforeach; ?>
