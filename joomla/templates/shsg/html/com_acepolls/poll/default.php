<?php defined('_JEXEC') or die('Restricted access'); ?>
<h1 class="componentheading<?php echo $this->params->get('pageclass_sfx') ?>">
    <?php echo $this->escape($this->params->get('page_title')); ?>
</h1>

<div class="contentpane<?php echo $this->params->get('pageclass_sfx') ?>">

<?php if ($this->allowToVote) { ?>
<div id="poll_comp_form">
    <form action="<?php echo JRoute::_('index.php'); ?>" method="post" name="poll_form2">
        <div id="poll_comp_options">
            <?php 
                $k=0; $i=0; $tabcnt = 0;
                $tabclass = array ('sectiontableentry2', 'sectiontableentry1');
                foreach ($this->options as $poll_option) { 
                    ?>
                    <label for="voteid<?php echo $poll_option->id;?>" class="poll<?php echo $tabclass[$tabcnt]; ?>" style="display:block; padding:2px;">
                        <input type="radio" name="voteid" id="voteid<?php echo $poll_option->id;?>" value="<?php echo $poll_option->id;?>" alt="<?php echo $poll_option->id;?>" />
                        <?php echo $poll_option->text; ?>
                    </label>
                    <?php $tabcnt = 1 - $tabcnt; 
                }
                ?>
        </div>
        
        <input type="submit" name="task_button" class="button clear" value="<?php echo JText::_('COM_ACEPOLLS_VOTE'); ?>" />
        <input type="hidden" name="option" value="com_acepolls" />
        <input type="hidden" name="task" value="vote" />
        <input type="hidden" name="id" value="<?php echo $this->poll->id;?>" />
        <?php echo JHTML::_('form.token'); ?>
    </form>
</div>
<br />

<?php 
    //if users are not allowed to vote for some reason (voted or not registered) show warning    
    } else { 
        if (false) { //($this->params->get('show_component_msg')) { 
            echo "<p>".JText::_($this->msg)."</p>"; 
        }
        $user =& JFactory::getUser();
        
        if ($user->get('guest')):
            // The user is not logged in.
            ?>
            <form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post">
                <fieldset>
                    <div class="login-fields">
                        <label id="username-lbl" for="username" class=" required">User Name<span class="star">&nbsp;*</span></label>
                        <input type="text" name="username" id="username" value="" class="validate-username required" size="25">
                    </div>
                    <div class="login-fields">
                        <label id="password-lbl" for="password" class=" required">Password<span class="star">&nbsp;*</span></label>
                        <input type="password" name="password" id="password" value="" class="validate-password required" size="25">
                    </div>
                    <button type="submit" class="button"><?php echo JText::_('JLOGIN'); ?></button>
                    <input type="hidden" name="return" value="<?php echo base64_encode(JURI::current()); ?>" />
                    <?php echo JHtml::_('form.token'); ?>
                </fieldset>
            </form>
            <?php
        else:
            // The user is already logged in.
            ?>
            <form action="<?php echo JRoute::_('index.php?option=com_users&task=user.logout'); ?>" method="post">
                <div>
                    <button type="submit" class="button"><?php echo JText::_('JLOGOUT'); ?></button>
                    <input type="hidden" name="return" value="<?php echo base64_encode("/"); ?>" />
                    <?php echo JHtml::_('form.token'); ?>
                </div>
            </form>
            <?php
        endif;

    } ?>
</div>