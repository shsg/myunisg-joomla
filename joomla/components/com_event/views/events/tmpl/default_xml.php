<?php defined('_JEXEC') or die('Restricted access'); ?>
<events>
    <?php foreach($this->items as $event) : ?>
    <event>
        <title><![CDATA[<?php echo $event->name; ?>]]></title>
        <association><![CDATA[<?php echo $event->club_name; ?>]]></association>
        <location><![CDATA[<?php echo $event->place; ?>]]></location>
        <link>http://myunisg.ch<?php echo JRoute::_('index.php?option=com_event&view=event&id=' . $event->id . '&name=' . $event->name); ?></link>
        <description><![CDATA[<?php echo $event->description; ?>]]></description>
        <category><![CDATA[<?php echo $event->category_name; ?>]]></category>
        <startdate><?php echo date('d.m.Y h:m', strtotime($event->date_begin)); ?></startdate>
        <enddate><?php echo date('d.m.Y h:m', strtotime($event->date_end)); ?></enddate>
        <formateddate>
            <strong><?php echo $event->date_span; ?></strong>
        </formateddate>
    </event>
    <?php endforeach; ?>
</events>
