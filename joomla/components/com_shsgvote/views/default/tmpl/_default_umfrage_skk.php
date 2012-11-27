<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$user =& JFactory::getUser();
?>
<h1>Neue Dienstleistungen der SKK</h1>

<p>
    Die SKK (Skriptenkommission) möchte ihr Angebot erweitern - und startet nun eine Umfrage, um die Nachfrage feststellen zu können.
</p>
<form action="/vote.html?task=vote" method="post" accept-charset="utf-8">
        <h2>Frage 1: Möchtest Du über die SKK zukünftig gerne auch Papeterieartikel beziehen?</h2>
        <ul style="list-style-type: none;">
            <li><input type="radio" name="vote_skk1[]" value="SKK1-1">&nbsp;&nbsp;Ja</li>
            <li><input type="radio" name="vote_skk1[]" value="SKK1-2">&nbsp;&nbsp;Nein</li>
        </ul>
        <br>
        <h2>Frage 2: Wäre es für Dich von Nutzen wenn Du die Unterlagen, welche Du für die Lernphase benötigst, bei der SKK drucken lassen könntest?</h2>
        <ul style="list-style-type: none;">
            <li><input type="radio" name="vote_skk2[]" value="SKK2-1">&nbsp;&nbsp;Ja</li>
            <li><input type="radio" name="vote_skk2[]" value="SKK2-2">&nbsp;&nbsp;Nein</li>
        </ul>
        <br>
        <h2>Frage 3: Würdest Du hierbei Farbkopien bevorzugen?</h2>
        <ul style="list-style-type: none;">
            <li><input type="radio" name="vote_skk3[]" value="SKK3-1">&nbsp;&nbsp;Ja</li>
            <li><input type="radio" name="vote_skk3[]" value="SKK3-2">&nbsp;&nbsp;Nur wenn sie nicht teurer sind als schwarz-weiss Kopien</li>
            <li><input type="radio" name="vote_skk3[]" value="SKK3-3">&nbsp;&nbsp;Nein</li>
        </ul>
        <br>
        <input type="hidden" name="form_sent" value="YES">
        <p><input type="submit" value="Abstimmen &rarr;"></p>
        <p>
            <em>Nach erfolgreicher Stimmabgabe wirst du automatisch ausgeloggt und zur Startseite weitergeleitet.</em>
        </p>
</form>
