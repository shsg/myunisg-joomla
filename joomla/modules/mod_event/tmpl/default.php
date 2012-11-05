<?php
// no direct access
defined('_JEXEC') or die;
?>
<ul>
	<?php foreach ($events as $event) : ?>
	<ol>
		<span><?php echo $event->date_span; ?></span>-
		<span><?php echo $event->name; ?></span>-
		<span><?php echo $event->club_name; ?></span>-
		<span><?php echo $event->category_name; ?></span>
	</ol>
	<?php endforeach; ?>
</ul>