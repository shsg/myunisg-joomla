<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<h1><a alt="<?php echo $this->event->name; ?>" href="<?php echo JRoute::_('index.php?option=com_event&view=events&id=' . $this->event->id . '&name=' . $this->event->name); ?>"><?php echo $this->event->name; ?></a></h1>
<p><?php echo JText::_('COM_EVENT_HELD_BY'); ?> <a alt="<?php echo $this->event->club_name; ?> Events" href="<?php echo JRoute::_('index.php?option=com_event&view=events&filter=1&clubs[]=' . $this->event->club_id); ?>"><?php echo $this->event->club_name; ?></a> <?php echo JText::_('COM_EVENT_IN_CATEGORY'); ?> <a alt="<?php echo $this->event->category_name; ?> Events" href="<?php echo JRoute::_('index.php?option=com_event&view=events&filter=1&categories[]=' . $this->event->category_id); ?>"><?php echo $this->event->category_name; ?></a></p>
<h2><?php echo JText::_('COM_EVENT_INFO'); ?></h2>
<h3><?php echo JText::_('COM_EVENT_WHEN'); ?></h3>
<p><?php echo $this->event->date_span; ?></p>
<h3><?php echo JText::_('COM_EVENT_WHERE'); ?></h3>
<p><?php echo $this->event->place; ?></p>
<h3><?php echo JText::_('COM_EVENT_DESCRIPTION'); ?></h3>
<p><?php echo $this->event->description; ?></p>

<?php if($this->event->attachement) : ?>
<h2><?php echo JText::_('COM_EVENT_ATTACHEMENT'); ?></h2>
<?php if($this->event->attachement->type=='image') : ?>
<a rel="thumb" href="<?php echo $this->event->attachement->link; ?>"><img src="<?php echo $this->event->attachement->link_thumb; ?>" alt="<?php echo $this->event->attachement->name; ?>" /></a>
<?php else: ?>
<?php echo $attachement->name; ?> <a href="<?php echo $attachement->link; ?>"><?php echo JText::_('COM_EVENT_DOWNLOAD_ATTACHEMENT'); ?></a>
<?php endif; ?>
<?php endif; ?>