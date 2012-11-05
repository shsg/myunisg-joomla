<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$selectedClubs = JRequest::getVar('clubs', array());
$selectedCategories = JRequest::getVar('categories', array());
$selectedBeginDate = JRequest::getString('dateBegin', '');
$selectedEndDate = JRequest::getString('dateEnd', '');
?>
<div id="eventslist">
    <h1><?php echo JText::_('COM_EVENTS_TITLE'); ?></h1>
    <h2><?php echo JText::_('COM_EVENTS_TITLE_CURRENT'); ?></h2>
    <?php if (count($this->currentItems) > 0) { ?>
        <table width="100%">
            <thead>
                <tr>
                    <th width="230"><?php echo JText::_('COM_EVENTS_TITLE_DATE'); ?></th>
                    <th width="130"><?php echo JText::_('COM_EVENTS_TITLE_CATEGORY'); ?></th>
                    <th width="200"><?php echo JText::_('COM_EVENTS_TITLE_CLUB'); ?></th>
                    <th width="*"><?php echo JText::_('COM_EVENTS_TITLE_NAME'); ?></th>
                    <th width="100"><?php echo JText::_('COM_EVENTS_TITLE_DETAILS'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->currentItems as $event) : ?>
                    <tr>
                        <td><?php echo $event->date_span; ?></td>
                        <td><?php echo $event->category_name; ?></td>
                        <td><?php echo $event->club_name; ?></td>
                        <td><?php echo $event->name; ?></td>
                        <td><a href="<?php echo JRoute::_('index.php?option=com_event&view=event&id=' . $event->id . '&name=' . $event->name); ?>"><?php echo JText::_('COM_EVENTS_ACTION_DETAILS_SHOW'); ?></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <em>Derzeit keine aktuellen Events</em>
    <?php } ?>

    <h2><?php echo JText::_('COM_EVENTS_TITLE_UPCOMING'); ?></h2>
    <a id="eventslistfilterlink" href="javascript:$('#eventslistfilter').show();$('#eventslistfilterlink').hide();void(0);" title="">Filter anzeigen&hellip;</a>
    <div id="eventslistfilter" style="display: none;">
        <h3><?php echo JText::_('COM_EVENTS_TITLE_FILTER'); ?></h3>
        <form method="get" action="<?php JRoute::_('option=com_event&view=events'); ?>">
            <div class="event-filter event-filter-clubs">
                <h4><?php echo JText::_('COM_EVENTS_TITLE_FILTER_CLUBS'); ?></h4>
                <select name="clubs[]" multiple="multiple" size="4">
                    <?php foreach($this->clubs as $club) : ?>
                        <option value="<?php echo $club->id; ?>"<?php echo in_array($club->id, $selectedClubs) ? ' selected="selected"' : ''; ?>/>&nbsp;<?php echo $club->name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="event-filter event-filter-categories">
                <h4><?php echo JText::_('COM_EVENTS_TITLE_FILTER_CATEGORIES'); ?></h4>
                <select name="categories[]" multiple="multiple" size="4">
                    <?php foreach($this->categories as $category) : ?>
                        <option value="<?php echo $category->id; ?>"<?php echo in_array($category->id, $selectedCategories) ? ' selected="selected"' : ''; ?>/>&nbsp;<?php echo $category->name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="event-filter event-filter-date">
                <h4><?php // echo JText::_('COM_EVENTS_TITLE_FILTER_DATE'); ?>Datum:</h4>
                <label for="dateBegin"><?php echo JText::_('COM_EVENTS_TITLE_FILTER_DATE_BEGIN'); ?></label>
                <input id="dateBegin" type="text" name="dateBegin" value="<?php echo $selectedBeginDate; ?>" placeholder="DD.MM.YYYY" />
                <br />
                <label for="dateEnd"><?php echo JText::_('COM_EVENTS_TITLE_FILTER_DATE_END'); ?></label>
                <input id="dateEnd" type="text" name="dateEnd" value="<?php echo $selectedEndDate; ?>" placeholder="DD.MM.YYYY" />
            </div>
            <div class="event-filter event-submit">
                <input type="submit" value="<?php echo JText::_('COM_EVENTS_ACTION_FILTER'); ?>" />
            </div>
        </form>
    </div>
    <table width="100%">
        <thead>
            <tr>
                <th width="230"><?php echo JText::_('COM_EVENTS_TITLE_DATE'); ?></th>
                <th width="130"><?php echo JText::_('COM_EVENTS_TITLE_CATEGORY'); ?></th>
                <th width="200"><?php echo JText::_('COM_EVENTS_TITLE_CLUB'); ?></th>
                <th width="*"><?php echo JText::_('COM_EVENTS_TITLE_NAME'); ?></th>
                <th width="100"><?php echo JText::_('COM_EVENTS_TITLE_DETAILS'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->items as $event) : ?>
                <tr>
                    <td><?php echo $event->date_span; ?></td>
                    <td><a href="<?php echo JRoute::_('index.php?option=com_event&view=events&categories%5B%5D=' . $event->category_id); ?>"><?php echo $event->category_name; ?></a></td>
                    <td><a href="<?php echo JRoute::_('index.php?option=com_event&view=events&clubs%5B%5D=' . $event->club_id); ?>"><?php echo $event->club_name; ?></a></td>
                    <td><?php echo $event->name; ?></td>
                    <td><a href="<?php echo JRoute::_('index.php?option=com_event&view=event&id=' . $event->id . '&name=' . $event->name); ?>"><?php echo JText::_('COM_EVENTS_ACTION_DETAILS_SHOW'); ?></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>