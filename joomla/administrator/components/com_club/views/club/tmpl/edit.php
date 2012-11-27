<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip'); 
JHtml::_('behavior.formvalidation');
?>

<form action="<?php echo JRoute::_('index.php?option=com_club&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="club-form">
  <fieldset class="adminform">
    <legend><?php echo JText::_('COM_CLUB_ADMIN_MENU_CLUB_BASIC'); ?></legend>
    <ul class="adminformlist">
      <?php $isAdmin = ClubPermissionChecker::isAdminUser(); ?>
      <?php foreach($this->form->getFieldset() as $field): ?>
        <?php
          $viewField = false;
          switch($field->type)
          {
            case 'Category':
            case 'User':
              if($isAdmin == true) 
                $viewField = true;
              break;
            default:
              $viewField = true;
          }
        ?>
        <?php if($viewField == true) : ?>
        <li><?php echo $field->label;echo $field->input;?></li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </fieldset>
  <div>
    <input type="hidden" name="task" value="club.edit" />
    <?php echo JHtml::_('form.token'); ?>
  </div>
</form>

