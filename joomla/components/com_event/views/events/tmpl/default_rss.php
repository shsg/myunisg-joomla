<?php defined('_JEXEC') or die('Restricted access'); ?>
<?xml version="1.0"?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
	<channel>
		<title>Uni St. Gallen Events</title>
		<link><?php echo JURI::getInstance()->toString(); ?></link>
		<description></description>
		<image>
			<url></url>
			<title></title>
			<link></link>
		</image>
		<language>de-de</language>
		<generator>Byteplex Solutions GmbH</generator>
		<?php foreach($this->items as $event) : ?>
		<item>
			<title><![CDATA[<?php echo $event->name; ?>]]></title>
			<link><?php echo JRoute::_('index.php?option=com_event&view=event&id=' . $event->id . '&name=' . $event->name); ?></link>
			<guid isPermaLink="false"></guid>
			<category><![CDATA[<?php echo $event->category_name; ?>]]></category>
			<category><![CDATA[<?php echo $event->club_name; ?>]]></category>
			<description><![CDATA[<?php echo $event->description; ?>]]></description>
			<dc:creator>Byteplex Solutions GmbH</dc:creator>
			<pubDate><?php echo $event->record_updated; ?></pubDate>
		</item>
		<?php endforeach; ?>
	</channel>
</rss>