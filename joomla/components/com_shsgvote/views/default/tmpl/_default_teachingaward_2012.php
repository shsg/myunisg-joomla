<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$user =& JFactory::getUser();
?>
<h1>Teaching Award</h1>

</p> 
    Informationen zu den Nominierten findest du hier: <a href="http://myunisg.ch/news/studium/310-teaching-award.html" target="_blank">Teaching Award Voting</a>
</p>
<p>
    Du kannst nun anhand der vorher genannten Kriterien deine Bewertung von hervorragend (5 Punkte) bis ausreichend (1 Punkt) für jeden der nominierten Professor(inn)en bzw. Dozierenden abgeben. 
    Bitte bewerte nur die Personen, welche du aus persönlicher Erfahrung kennst (andernfalls klicke bitte auf "Ich weiss nicht").
</p>
<p>
    <strong>Bewertungsskala</strong>: 5 - hervorragend; 4 - sehr gut; 3 - gut; 2 - befriedigend; 1 - ausreichend
</p>
<br>
<form action="/vote.html?task=vote" method="post" accept-charset="utf-8">
        <?php if (ShsgvoteHelper::isInGroup("all", $user->name)) { ?> 
        <h4 style="clear: left; margin-bottom: 10px">Prof. Dr. Matthias Brauer, <em style="font-weight: normal;">Assistenzprofessor für Strategisches Management</em></h4>
        <ul style="list-style-type: none;">
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof01[]" value="PR01-5">&nbsp;&nbsp;5</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof01[]" value="PR01-4">&nbsp;&nbsp;4</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof01[]" value="PR01-3">&nbsp;&nbsp;3</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof01[]" value="PR01-2">&nbsp;&nbsp;2</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof01[]" value="PR01-1">&nbsp;&nbsp;1</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof01[]" value="PR01-NOONE" checked="checked"><em>&nbsp;&nbsp;Ich weiss nicht</em></li>
        </ul>
        <br><br>
        <h4 style="clear: left; margin-bottom: 10px">Prof. Dr. Andreas Härter, <em style="font-weight: normal;">Titularprofessor, Ständiger Dozent für Deutsche Sprache und Literatur</em></h4>
        <ul style="list-style-type: none;">
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof02[]" value="PR02-5">&nbsp;&nbsp;5</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof02[]" value="PR02-4">&nbsp;&nbsp;4</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof02[]" value="PR02-3">&nbsp;&nbsp;3</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof02[]" value="PR02-2">&nbsp;&nbsp;2</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof02[]" value="PR02-1">&nbsp;&nbsp;1</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof02[]" value="PR02-NOONE" checked="checked"><em>&nbsp;&nbsp;Ich weiss nicht</em></li>
        </ul>
        <br><br>
        <h4 style="clear: left; margin-bottom: 10px">Dr. phil. Revital Ludewig, <em style="font-weight: normal;">Lehrbeauftragte für Organisationspsychologie und Rechtspsychologie</em></h4>
        <ul style="list-style-type: none;">
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof03[]" value="PR03-5">&nbsp;&nbsp;5</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof03[]" value="PR03-4">&nbsp;&nbsp;4</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof03[]" value="PR03-3">&nbsp;&nbsp;3</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof03[]" value="PR03-2">&nbsp;&nbsp;2</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof03[]" value="PR03-1">&nbsp;&nbsp;1</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof03[]" value="PR03-NOONE" checked="checked"><em>&nbsp;&nbsp;Ich weiss nicht</em></li>
        </ul>
        <br><br>
        <h4 style="clear: left; margin-bottom: 10px">Dr. Jörg Metelmann, <em style="font-weight: normal;">Lehrbeauftragter für Philosophie, Programmleitung Handlungskompetenz im Kontextstudium</em></h4>
        <ul style="list-style-type: none;">
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof04[]" value="PR04-5">&nbsp;&nbsp;5</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof04[]" value="PR04-4">&nbsp;&nbsp;4</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof04[]" value="PR04-3">&nbsp;&nbsp;3</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof04[]" value="PR04-2">&nbsp;&nbsp;2</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof04[]" value="PR04-1">&nbsp;&nbsp;1</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof04[]" value="PR04-NOONE" checked="checked"><em>&nbsp;&nbsp;Ich weiss nicht</em></li>
        </ul>
        <br><br>
        <h4 style="clear: left; margin-bottom: 10px">Prof. Ph.D. Catherine Roux, <em style="font-weight: normal;">Assistenzprofessorin für Volkswirtschaftslehre im Profilbereich Wirtschaftspolitik</em></h4>
        <ul style="list-style-type: none;">
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof05[]" value="PR05-5">&nbsp;&nbsp;5</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof05[]" value="PR05-4">&nbsp;&nbsp;4</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof05[]" value="PR05-3">&nbsp;&nbsp;3</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof05[]" value="PR05-2">&nbsp;&nbsp;2</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof05[]" value="PR05-1">&nbsp;&nbsp;1</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof05[]" value="PR05-NOONE" checked="checked"><em>&nbsp;&nbsp;Ich weiss nicht</em></li>
        </ul>
        <br><br>
        <h4 style="clear: left; margin-bottom: 10px">Prof. Dr. Johannes Rüegg-Stürm, <em style="font-weight: normal;">Professor für Organization Studies</em></h4>
        <ul style="list-style-type: none;">
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof06[]" value="PR06-5">&nbsp;&nbsp;5</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof06[]" value="PR06-4">&nbsp;&nbsp;4</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof06[]" value="PR06-3">&nbsp;&nbsp;3</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof06[]" value="PR06-2">&nbsp;&nbsp;2</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof06[]" value="PR06-1">&nbsp;&nbsp;1</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof06[]" value="PR06-NOONE" checked="checked"><em>&nbsp;&nbsp;Ich weiss nicht</em></li>
        </ul>
        <br><br>
        <h4 style="clear: left; margin-bottom: 10px">Prof. Dr. Benjamin Schindler, <em style="font-weight: normal;">Professor für Öffentliches Recht mit besonderer Berücksichtigung des Verwaltungsrechts und des Verfahrensrechts</em></h4>
        <ul style="list-style-type: none;">
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof07[]" value="PR07-5">&nbsp;&nbsp;5</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof07[]" value="PR07-4">&nbsp;&nbsp;4</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof07[]" value="PR07-3">&nbsp;&nbsp;3</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof07[]" value="PR07-2">&nbsp;&nbsp;2</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof07[]" value="PR07-1">&nbsp;&nbsp;1</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof07[]" value="PR07-NOONE" checked="checked"><em>&nbsp;&nbsp;Ich weiss nicht</em></li>
        </ul>
        <br><br>
        <h4 style="clear: left; margin-bottom: 10px">Prof. Dr. Marcus Schögel, <em style="font-weight: normal;">Titularprofessor für Betriebswirtschaftslehre mit besonderer Berücksichtigung des Marketing</em></h4>
        <ul style="list-style-type: none;">
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof08[]" value="PR08-5">&nbsp;&nbsp;5</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof08[]" value="PR08-4">&nbsp;&nbsp;4</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof08[]" value="PR08-3">&nbsp;&nbsp;3</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof08[]" value="PR08-2">&nbsp;&nbsp;2</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof08[]" value="PR08-1">&nbsp;&nbsp;1</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof08[]" value="PR08-NOONE" checked="checked"><em>&nbsp;&nbsp;Ich weiss nicht</em></li>
        </ul>
        <br><br>
        <h4 style="clear: left; margin-bottom: 10px">Dr. Reto Schuppli, <em style="font-weight: normal;">Lehrbeauftragter für Mathematik</em></h4>
        <ul style="list-style-type: none;">
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof09[]" value="PR09-5">&nbsp;&nbsp;5</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof09[]" value="PR09-4">&nbsp;&nbsp;4</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof09[]" value="PR09-3">&nbsp;&nbsp;3</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof09[]" value="PR09-2">&nbsp;&nbsp;2</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof09[]" value="PR09-1">&nbsp;&nbsp;1</li>
            <li style="display: block; float: left; margin-right: 20px;"><input type="radio" name="vote_prof09[]" value="PR09-NOONE" checked="checked"><em>&nbsp;&nbsp;Ich weiss nicht</em></li>
        </ul>
        
        
        <br><br>
        <input type="hidden" name="form_sent" value="YES">
        <p><input type="submit" value="Abstimmen &rarr;"></p>
        <?php } ?>
        <p>
            <em>Nach <strong>erfolgreicher</strong> Stimmabgabe wirst du automatisch ausgeloggt und auf eine "Danke für deine Stimme!"-Seite weitergeleitet.</em>
        </p>
</form>
