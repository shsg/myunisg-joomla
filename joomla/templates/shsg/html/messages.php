<?php defined('_JEXEC') or die;

# NOTE unused!

$messages = JFactory::getApplication()->getMessageQueue();
$errors = false;
$errorMessages = array();
$messages = false;
$messageMessages = array();

if (is_array($messages) && count($messages)) {
    foreach ($messages as $message) {
       if ($message[type] == 'error') {
          $errors = true;
          $errorMessages[] = $message[message];
       } else if ($message[type] == 'message') {
           $messages = true;
           $messageMessages[] = $message[message];
       }
    }

}

if ($errors || $messages) {
    ?>
    <div id="system-messages">
    <?php
        if ($errors) {
            ?><ul id="system-error-messages"><?php
            foreach ($errorMessages as $errorMessage) {
                ?><li><?php echo $errorMessage; ?></li><?php
            }
            ?></ul><?php
        }
    ?>
    <?php
        if ($messages) {
            ?><ul id="system-message-messages"><?php
            foreach ($messageMessages as $messageMessage) {
                ?><li><?php echo $messageMessage; ?></li><?php
            }
            ?></ul><?php
        }
    ?>
    </div>
    <?php
}
?>