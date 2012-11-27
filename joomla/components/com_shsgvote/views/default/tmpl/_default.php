<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$user =& JFactory::getUser();
?>
<h1>Nachwahlen der Programmvertreter im Studentenparlament (StuPa) HS2011</h1>

<p>
    W&auml;hle einen Kandidaten und klicke auf "Abstimmen". Informationen zu den Kandidaten findest du hier: <a href="http://myunisg.ch/news/engagement-a-entrepreneurship/124-nachwahl-der-programmvertreter.html" target="_blank">Kandidaten Nachwahlen Programmvertreter 2011/12</a>
</p>
<form action="/vote.html?task=vote" method="post" accept-charset="utf-8">
    <?php if (false) { //}(!ShsgvoteHelper::isInGroup("maccfin", $user->name) && !ShsgvoteHelper::isInGroup("sim", $user->name)) { ?>
        <strong>F&uuml;r dein Programm steht leider kein Kandidat zur Auswahl bzw. es wurde schon ein Kandidat w&auml;hrend der Programmvertreter-Wahlen gew&auml;hlt.</strong>
    <?php } else {?>
    
        <?php if (true) { // }(ShsgvoteHelper::isInGroup("maccfin", $user->name)) { ?>
        <h2>MAccFin</h2>
        <ul style="list-style-type: none;">
            <li><input type="radio" name="vote_maccfin[]" value="MACCFIN1">&nbsp;&nbsp;Blumenthal, Martin</li>
            <li><input type="radio" name="vote_maccfin[]" value="MACCFIN2">&nbsp;&nbsp;Wroschn, Tanja</li>
            <li><input type="radio" name="vote_maccfin[]" value="MACCFIN3" checked="checked"><em>&nbsp;&nbsp;Enthaltung</em></li>
        </ul>
        <br>
        <?php } ?>
        
        <?php if (true) { // } (ShsgvoteHelper::isInGroup("sim", $user->name)) { ?>
        <h2>SIM</h2>
        <ul style="list-style-type: none;">
            <li><input type="radio" name="vote_sim[]" value="SIM1">&nbsp;&nbsp;Christoph v. Bieberstein</li>
            <li><input type="radio" name="vote_sim[]" value="SIM2">&nbsp;&nbsp;Dennis Kamprad</li>
            <li><input type="radio" name="vote_sim[]" value="SIM3" checked="checked"><em>&nbsp;&nbsp;Enthaltung</em></li>
        </ul>
        <br>
        <?php } ?>
    
        <input type="hidden" name="form_sent" value="YES">
        <p><input type="submit" value="Abstimmen &rarr;"></p>
        <p>
            <em>Nach erfolgreicher Stimmabgabe wirst du automatisch ausgeloggt und zur Startseite weitergeleitet.</em>
        </p>
    <?php } ?>
</form>
