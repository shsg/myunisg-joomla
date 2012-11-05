<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php echo '<?xml version="1.0"?>'; ?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
	<channel>
		<title>Studentenschaft der Universit&auml;t St. Gallen - Veranstaltungen</title>
		<link><?php echo JURI::getInstance()->toString(); ?></link>
		<description></description>
		<image>
			<url></url>
			<title></title>
			<link></link>
		</image>
		<language>de-de</language>
		<generator>Studentenschaft der Universit&auml;t St. Gallen</generator>
		<?php foreach($this->items as $event) : ?>
		<item>
			<title><![CDATA[<?php echo $event->name; ?>]]> (Veranstalter: <![CDATA[<?php echo $event->club_name; ?>]]>)</title>
			<link><?php echo JRoute::_('index.php?option=com_event&view=event&id=' . $event->id . '&name=' . $event->name); ?></link>
			<guid isPermaLink="false"><?php echo JRoute::_('index.php?option=com_event&view=event&id=' . $event->id . '&name=' . $event->name); ?></guid>
			<category><![CDATA[<?php echo $event->category_name; ?>]]></category>
			<category><![CDATA[<?php echo $event->club_name; ?>]]></category>
			<description><![CDATA[<?php echo $event->description; ?>]]></description>
			<dc:creator><![CDATA[<?php echo $event->club_name; ?>]]></dc:creator>
			<pubDate><?php echo $event->record_updated; ?></pubDate>
		</item>
		<?php endforeach; ?>
	</channel>
</rss>