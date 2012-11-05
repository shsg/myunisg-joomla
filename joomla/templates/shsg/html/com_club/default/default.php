<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$document->addScript( 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js' );

?>
<div id="club">
    <h1>Vereine</h1>
    <p>Allgemeine Infos zur Vereinslandschaft an der HSG findest du in der <a href="/images/shsg/studentenschaft/vereine/vereinsbroschuere_2011.pdf"> Vereinsbrosch&uuml;re (PDF, 1,4 MB)</a></p>
    <?php foreach($this->items as $category => $clubs) : ?>
    <h2><?php echo $category; ?></h2>
      <table class="clubs" style="width: 100%;">
      <thead>
       <!--   <tr>
              <th colspan="4"><h2><?php echo $category; ?></h2></th>
              <th><a href="#" class="categorydetails" title="">Show Clubs</th>
        </tr> -->
          <tr class="category-heading">
            <th style="width: 220px;">Name</th>
            <th style="width: 90px;">Gr&uuml;ndung</th>
            <th style="width: 200px;">Webseite</th>
            <th style="width: 250px;">E-Mail</th>
            <th>Infos</th>
          </tr>
        </thead>
      <?php foreach($clubs as $club) : ?>
        <tr class="club-<?php echo $club->id; ?> club-title">
          <td><?php echo $club->name; ?></td>
          <td><?php echo $club->year_founded; ?></td>
          <td><a target="_blank" href="<?php echo $club->website; ?>" title=""><?php echo str_replace("http://", "", $club->website); ?></a></td> 
          <td><a href="mailto:<?php echo $club->email; ?>" title=""><?php echo $club->email; ?></a></td>
          <td><a href="#" class="clubdetails" title="Show/Hide Details">Details</a></td>
        </tr>
        <tr class="club-<?php echo $club->id; ?>-details club-details" style="display: none">
             <td colspan="<?php echo ($club->file_logo == '' ? '3' : '2');?>"><?php echo $club->description; ?></td>
             <?php if ($club->file_logo != '') { ?><td><strong>Logo</strong><img src="<?php echo $club->file_logo; ?>" alt="" style="width: 200px;" /></td><?php } ?>
             <td colspan="2">
               <strong>Adresse</strong><br />
               <?php echo $club->address1 == '' ? '' : $club->address1 . '<br />'; ?>
               <?php echo $club->address2 == '' ? '' : $club->address2 . '<br />'; ?>
               <?php echo $club->address3 == '' ? '' : $club->address3 . '<br />'; ?>
               <?php echo $club->zip . '&nbsp;' . $club->city; ?>
               <?php if($club->file_constitution != '') : ?>
            <br/><strong>Statuten:</strong>
               <a href="<?php echo $club->file_constitution; ?>" title="" target="_blank">als PDF downloaden</a>
               <?php endif; ?>
             </td>      
           </tr>
      <?php endforeach; ?>
      </table>
    <?php endforeach; ?>

<script type="text/javascript" charset="utf-8">

$(document).ready(function() {
    $('#club .clubdetails').bind('click', function(event) {
        event.preventDefault();
        var details = $(event.target).closest('tr').next();
        details.css("display", details.css("display") == "none" ? "table-row" : "none");
    });
});

</script>
</div>