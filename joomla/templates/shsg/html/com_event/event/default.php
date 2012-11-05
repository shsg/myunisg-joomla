<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<div id="event">
    <h1><?php echo $this->event->name; ?></h1>
    <p>Veranstaltet von <strong><?php echo $this->event->club_name; ?></strong> in der Kategorie <strong><?php echo $this->event->category_name; ?></strong></p>
    <h3>Wann</h3>
    <p><?php echo $this->event->date_span; ?></p>
    <h3>Wo</h3>
    <p><?php echo $this->event->place; ?></p>
    <h3>Beschreibung</h3>
    <p><?php echo nl2br($this->event->description, false); ?></p>

    <?php if($this->event->attachement) : ?>
        <h2>Anhang</h2>
        <?php if($this->event->attachement->type=='image') : ?>
            <a rel="thumb" href="<?php echo $this->event->attachement->link; ?>"><img src="<?php echo $this->event->attachement->link_thumb; ?>" alt="<?php echo $this->event->attachement->name; ?>" /></a>
        <?php else: ?>
            <a href="<?php echo $attachement->link; ?>" title="Herunterladen"><?php echo $attachement->name; ?></a>
        <?php endif; ?>
    <?php endif; ?>
</div>