<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$user =& JFactory::getUser();
?>
<h1>Wahlen im Herbstsemester 2012</h1>

<p>
    W&auml;hle einen Kandidaten und klicke auf "Abstimmen". Informationen zu den Kandidaten findest du hier: <a href="http://myunisg.ch/studentenschaft/parlament/wahlen.html" target="_blank">Kandidaten Wahlen HS 2012/13</a>
</p>
<form action="/vote.html?task=vote" method="post" accept-charset="utf-8">
    <?php if (false) { //}(!ShsgvoteHelper::isInGroup("maccfin", $user->name) && !ShsgvoteHelper::isInGroup("sim", $user->name)) { ?>
        <strong>F&uuml;r dein Programm steht leider kein Kandidat zur Auswahl bzw. es wurde schon ein Kandidat w&auml;hrend der Programmvertreter-Wahlen gew&auml;hlt.</strong>

    <?php } else {?>
    
        <?php if (ShsgvoteHelper::isInGroup("asswiwi", $user->name)) { ?>
        <h2>Assessment Wirtschaftswissenschaften</h2>
        <p>Wähle maximal drei Kandidaten aus.</p>
        <ul style="list-style-type: none;">
            <li><input type="checkbox" name="vote_asswiwi[]" value="ASS1">&nbsp;&nbsp;Bote, Paulo</li>
            <li><input type="checkbox" name="vote_asswiwi[]" value="ASS2">&nbsp;&nbsp;Kirschner, Marvin</li>
            <li><input type="checkbox" name="vote_asswiwi[]" value="ASS3">&nbsp;&nbsp;Locca, Maximilian</li>
            <li><input type="checkbox" name="vote_asswiwi[]" value="ASS4">&nbsp;&nbsp;Wigand, Tobias</li>
            <li><input type="checkbox" name="vote_asswiwi[]" value="ASS5">&nbsp;&nbsp;Ziemke, Zeno</li>
            <li><input type="checkbox" name="vote_asswiwi[]" value="ASS6" checked="checked"><em>&nbsp;&nbsp;Enthaltung</em></li>
        </ul>
        <br>
        <?php } ?>
        
        <?php if (ShsgvoteHelper::isInGroup("assnoch", $user->name)) { ?>
        <h2>Assessment Wirtschaftswissenschaften</h2>
        <p>Wähle maximal drei Kandidaten aus. Deine bereits abgegebene Stimme ist ungültig und wird neu gezählt.</p>
        <ul style="list-style-type: none;">
            <li><input type="checkbox" name="vote_assnoch[]" value="ASSNOCH1">&nbsp;&nbsp;Bote, Paulo</li>
            <li><input type="checkbox" name="vote_assnoch[]" value="ASSNOCH2">&nbsp;&nbsp;Kirschner, Marvin</li>
            <li><input type="checkbox" name="vote_assnoch[]" value="ASSNOCH3">&nbsp;&nbsp;Locca, Maximilian</li>
            <li><input type="checkbox" name="vote_assnoch[]" value="ASSNOCH4">&nbsp;&nbsp;Wigand, Tobias</li>
            <li><input type="checkbox" name="vote_assnoch[]" value="ASSNOCH5">&nbsp;&nbsp;Ziemke, Zeno</li>
            <li><input type="checkbox" name="vote_assnoch[]" value="ASSNOCH6" checked="checked"><em>&nbsp;&nbsp;Enthaltung</em></li>
        </ul>
        <br>
        <?php } ?>

        <?php if (ShsgvoteHelper::isInGroup("bvwl", $user->name)) { ?>
        <h2>Bachelor VWL</h2>
        <ul style="list-style-type: none;">
            <li><input type="radio" name="vote_bvwl[]" value="BVWL1">&nbsp;&nbsp;Meiske, Dano</li>
            <li><input type="radio" name="vote_bvwl[]" value="BVWL2">&nbsp;&nbsp;Neuwirth, Vinzenz</li>
            <li><input type="radio" name="vote_bvwl[]" value="BVWL3">&nbsp;&nbsp;Hurni, Kerry</li>
            <li><input type="radio" name="vote_bvwl[]" value="BVWL4" checked="checked"><em>&nbsp;&nbsp;Enthaltung</em></li>
        </ul>
        <br>
        <?php } ?>
        
        <?php if  (ShsgvoteHelper::isInGroup("ble", $user->name)) { ?>
        <h2>Bachelor Law &amp; Economics</h2>
        <ul style="list-style-type: none;">
            <li><input type="radio" name="vote_ble[]" value="BLE1">&nbsp;&nbsp;Curchod, Nicolas</li>
            <li><input type="radio" name="vote_ble[]" value="BLE2">&nbsp;&nbsp;Gauch, Sandro</li>
            <li><input type="radio" name="vote_ble[]" value="BLE3">&nbsp;&nbsp;Peng, Gian Luca</li>
            <li><input type="radio" name="vote_ble[]" value="BLE4" checked="checked"><em>&nbsp;&nbsp;Enthaltung</em></li>
        </ul>
        <br>
        <?php } ?>

        <?php if (ShsgvoteHelper::isInGroup("msc", $user->name)) { ?>
        <h2>MSC</h2>
        <ul style="list-style-type: none;">
            <li><input type="radio" name="vote_msc[]" value="MSC1">&nbsp;&nbsp;Francesio, Fabrizio</li>
            <li><input type="radio" name="vote_msc[]" value="MSC2">&nbsp;&nbsp;K&ouml;nig, Linda</li>
            <li><input type="radio" name="vote_msc[]" value="MSC3" checked="checked"><em>&nbsp;&nbsp;Enthaltung</em></li>
        </ul>
        <br>
        <?php } ?>

        <?php if (ShsgvoteHelper::isInGroup("miqef", $user->name)) { ?>
        <h2>MiQE/F</h2>
        <ul style="list-style-type: none;">
            <li><input type="radio" name="vote_miqef[]" value="MIQEF1">&nbsp;&nbsp;Gamarra Echenique, Carlos</li>
            <li><input type="radio" name="vote_miqef[]" value="MIQEF2">&nbsp;&nbsp;Widmer, Raffael</li>
            <li><input type="radio" name="vote_miqef[]" value="MIQEF3" checked="checked"><em>&nbsp;&nbsp;Enthaltung</em></li>
        </ul>
        <br>
        <?php } ?>
        
        <?php if  (ShsgvoteHelper::isInGroup("mug", $user->name)) { ?>
        <h2>MUG</h2>
        <ul style="list-style-type: none;">
            <li><input type="radio" name="vote_mug[]" value="MUG1">&nbsp;&nbsp;Bold, Dominik</li>
            <li><input type="radio" name="vote_mug[]" value="MUG2">&nbsp;&nbsp;Müdespacher, Alexander</li>
            <li><input type="radio" name="vote_mug[]" value="MUG3">&nbsp;&nbsp;Widmer, Anna</li>
            <li><input type="radio" name="vote_mug[]" value="MUG4" checked="checked"><em>&nbsp;&nbsp;Enthaltung</em></li>
        </ul>
        <br>
        <?php } ?>

        <?php if  (ShsgvoteHelper::isInGroup("som", $user->name)) { ?>
        <p>Falls kein Programm angezeigt wird, ist der Kandidat in stiller Wahl gew&auml;hlt worden, oder es gab keine Kandidatur. Alle Studenten sind aber für die Nachwahl der School of Management wahlberechtigt.</p>
        <h2>Nachwahl School of Management</h2>
        <ul style="list-style-type: none;">
            <li><input type="radio" name="vote_som[]" value="SOM1">&nbsp;&nbsp;Meiske, Dano</li>
            <li><input type="radio" name="vote_som[]" value="SOM2">&nbsp;&nbsp;Rampa, Roman</li>
            <li><input type="radio" name="vote_som[]" value="SOM3">&nbsp;&nbsp;Wildhaber, Victor</li>
            <li><input type="radio" name="vote_som[]" value="SOM4" checked="checked"><em>&nbsp;&nbsp;Enthaltung</em></li>
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
