<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<h1>Vereine</h1>
<?php foreach($this->items as $category => $clubs) :?>
<h2><?php echo $category; ?></h2>
  <table class="clubs">
  <thead><?php echo $this->loadTemplate('category_head');?></thead>
  <?php foreach($clubs as $club) : ?>
    <tr class="club-<?php echo $club->id; ?> club-title">
      <td><?php echo $club->name; ?></td>
      <td><a target="_blank" href="http://<?php echo $club->website; ?>"><?php echo $club->website; ?></a></td>
      <td>
        <?php if($club->file_constitution != '') : ?>
        <a href="<?php echo $club->file_constitution; /* Hier /joomla abschneiden */ ?>">Statute downloaden</a>
        <?php endif; ?>
      </td>
      <td><a href="#">Details</a></td>
    </tr>
    <tr class="club-<?php echo $club->id; ?>-details club-details">
      <td colspan="2"><?php echo $club->description; ?></td>
      <td colspan="3">
        <b>E-Mail:</b><br />
        <?php echo $club->email; ?><br />
        <b>Adresse</b><br />
        <?php echo $club->address1 == '' ? '' : $club->address1 . '<br />'; ?>
        <?php echo $club->address2 == '' ? '' : $club->address2 . '<br />'; ?>
        <?php echo $club->address3 == '' ? '' : $club->address3 . '<br />'; ?>
        <?php echo $club->zip . '&nbsp;' . $club->city; ?>
      </td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php endforeach; ?>
