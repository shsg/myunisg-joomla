<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$user =& JFactory::getUser();
?>
<h1>Wahl der Pr&auml;sidententeams der Studentenschaft 2012/13</h1>

<p>
    W&auml;hle ein Pr&auml;sidententeam aus und klicke auf "Abstimmen". Informationen zu den Pr&auml;sidententeams findest du hier: <a href="http://myunisg.ch/news/engagement-a-entrepreneurship/291-kandidaten-praesidenten-wahl.html" target="_blank">Kandidaten Präsidententeam der Studentenschaft 2012/13</a>
</p>
<form action="/vote.html?task=vote" method="post" accept-charset="utf-8">
        <h2>Präsidententeams</h2>
        <?php if (true) {//(ShsgvoteHelper::isInGroup("all", $user->name)) { ?>
        
        <ul style="list-style-type: none;">
            <li><input type="radio" name="vote_praes[]" value="GOETZ">&nbsp;&nbsp;G&ouml;tz, Zumtaugwald</li>
            <li><input type="radio" name="vote_praes[]" value="KNAUT">&nbsp;&nbsp;Knaut, Geissler</li>
            <li><input type="radio" name="vote_praes[]" value="NOONE" checked="checked"><em>&nbsp;&nbsp;Enthaltung</em></li>
        </ul>
        <br>
        <input type="hidden" name="form_sent" value="YES">
        <p><input type="submit" value="Abstimmen &rarr;"></p>
        <?php } ?>
        <p>
            <em>Nach erfolgreicher Stimmabgabe wirst du automatisch ausgeloggt und zur Startseite weitergeleitet.</em>
        </p>
</form>
