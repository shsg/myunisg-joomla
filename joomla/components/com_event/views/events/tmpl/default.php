<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$selectedClubs = JRequest::getVar('clubs', array());
$selectedCategories = JRequest::getVar('categories', array());
$selectedBeginDate = JRequest::getString('dateBegin', '');
$selectedEndDate = JRequest::getString('dateEnd', '');

?>
<h1><?php echo JText::_('COM_EVENTS_TITLE'); ?></h1>
<h2><?php echo JText::_('COM_EVENTS_TITLE_CURRENT'); ?></h2>
<table>
<tr>
	<th><?php echo JText::_('COM_EVENTS_TITLE_DATE'); ?></th>
	<th><?php echo JText::_('COM_EVENTS_TITLE_CATEGORY'); ?></th>
	<th><?php echo JText::_('COM_EVENTS_TITLE_CLUB'); ?></th>
	<th><?php echo JText::_('COM_EVENTS_TITLE_NAME'); ?></th>
	<th><?php echo JText::_('COM_EVENTS_TITLE_DETAILS'); ?></th>
</tr>
<?php foreach($this->currentItems as $event) : ?>
<tr>
	<td><?php echo $event->date_span; ?></td>
	<td><?php echo $event->category_name; ?></td>
	<td><?php echo $event->club_name; ?></td>
	<td><?php echo $event->name; ?></td>
	<td><a href="<?php echo JRoute::_('index.php?option=com_event&view=event&id=' . $event->id . '&name=' . $event->name); ?>"><?php echo JText::_('COM_EVENTS_ACTION_DETAILS_SHOW'); ?></a></td>
</tr>
<?php endforeach; ?>
</table>

<h2><?php echo JText::_('COM_EVENTS_TITLE_UPCOMING'); ?></h2>
<h3><?php echo JText::_('COM_EVENTS_TITLE_FILTER'); ?></h3>
<form method="GET" action="<?php echo JRoute::_('index.php?option=com_event&view=events?filter=1'); ?>">
	<div class="event-filter event-filter-clubs">
		<h4><?php echo JText::_('COM_EVENTS_TITLE_FILTER_CLUBS'); ?></h4>
		<ul>
			<?php foreach($this->clubs as $club) : ?>
			<li>
				<input type="checkbox" name="clubs[]" value="<?php echo $club->id; ?>"<?php echo in_array($club->id, $selectedClubs) ? ' checked="true"' : ''; ?>/>&nbsp;<?php echo $club->name; ?>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="event-filter event-filter-categories">
		<h4><?php echo JText::_('COM_EVENTS_TITLE_FILTER_CATEGORIES'); ?></h4>
		<ul>
			<?php foreach($this->categories as $category) : ?>
			<li>
				<input type="checkbox" name="categories[]" value="<?php echo $category->id; ?>"<?php echo in_array($category->id, $selectedCategories) ? ' checked="true"' : ''; ?>/>&nbsp;<?php echo $category->name; ?>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="event-filter event-filter-date">
		<label for="dateBegin"><?php echo JText::_('COM_EVENTS_TITLE_FILTER_DATE_BEGIN'); ?></label>
		<input id="dateBegin" type="text" name="dateBegin" value="<?php echo $selectedBeginDate; ?>"/>
		<br />
		<label for="dateEnd"><?php echo JText::_('COM_EVENTS_TITLE_FILTER_DATE_END'); ?></label>
		<input id="dateEnd" type="text" name="dateEnd" value="<?php echo $selectedEndDate; ?>"/>
	</div>
	<div class="event-submit">
		<input type="submit" value="<?php echo JText::_('COM_EVENTS_ACTION_FILTER'); ?>" />
	</div>
</form>

<table>
<tr>
	<th><?php echo JText::_('COM_EVENTS_TITLE_DATE'); ?></th>
	<th><?php echo JText::_('COM_EVENTS_TITLE_CATEGORY'); ?></th>
	<th><?php echo JText::_('COM_EVENTS_TITLE_CLUB'); ?></th>
	<th><?php echo JText::_('COM_EVENTS_TITLE_NAME'); ?></th>
	<th><?php echo JText::_('COM_EVENTS_TITLE_DETAILS'); ?></th>
</tr>
<?php foreach($this->items as $event) : ?>
<tr>
	<td><?php echo $event->date_span; ?></td>
	<td><?php echo $event->category_name; ?></td>
	<td><?php echo $event->club_name; ?></td>
	<td><a href="<?php echo JRoute::_('index.php?option=com_event&view=event&id=' . $event->id . '&name=' . $event->name); ?>"><?php echo $event->name; ?></a></td>
	<td><a href="<?php echo JRoute::_('index.php?option=com_event&view=event&id=' . $event->id . '&name=' . $event->name); ?>"><?php echo JText::_('COM_EVENTS_ACTION_DETAILS_SHOW'); ?></a></td>
</tr>
<?php endforeach; ?>
</table>