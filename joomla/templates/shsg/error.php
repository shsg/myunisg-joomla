<?php defined('_JEXEC') or die;

/* The following line loads the MooTools JavaScript Library */
JHTML::_('behavior.framework', false);

/* The following line gets the application object for things like displaying the site name */
$app = JFactory::getApplication();
$menu = & JSite::getMenu();

if (!isset($this->error)) {
    $this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
    $this->debug = false; 
}

jimport( 'joomla.application.module.helper' );
?>
<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset ?>"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
    <title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>
</head>
<body>
    <div id="wrapper">
        <div id="wrapper-header" class="box">
            <div id="header">
                <a id="hsg-logo" href="/" title="Startseite"><span>Universti&auml;t St. Gallen</span></a>
                <a id="shsg-logo" href="/" title="Startseite"><span>Studentenschaft der Universti&auml;t St. Gallen</span></a>
                <?php
                    $modules = JModuleHelper::getModules( 'shsg-search' );
                    foreach ($modules as $module) { echo JModuleHelper::renderModule( $module); }
                ?>
            </div>
        </div>
        <div id="main">
            <div id="page-content" class="box page-content-wide">
                <div id="errorboxoutline">
                    <h1 id="errorboxheader"><?php echo $this->error->getCode(); ?> - <?php echo $this->error->getMessage(); ?></h1>
                    <div id="errorboxbody">
                        <p><strong><?php echo JText::_('YOU_MAY_NOT_BE_ABLE_TO_VISIT_THIS_PAGE_BECAUSE_OF'); ?>:</strong></p>
                        <ol>
                            <li><?php echo JText::_('AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
                            <li><?php echo JText::_('A_SEARCH_ENGINE_THAT_HAS_AN_OUT_OF_DATE_LISTING_FOR_THIS_SITE'); ?></li>
                            <li><?php echo JText::_('A_MIS_TYPED_ADDRESS'); ?></li>
                            <li><?php echo JText::_('YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
                            <li><?php echo JText::_('THE_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
                            <li><?php echo JText::_('AN_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
                        </ol>
                        <br/>
                        <p><strong><?php echo JText::_('PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?>:</strong></p>
                        <ul>
                            <li><a href="<?php echo $this->baseurl; ?>/" title="<?php echo JText::_('GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('HOME_PAGE'); ?></a></li>
                            <li><a href="<?php echo $this->baseurl; ?>/suche.html" title="<?php echo JText::_('GO_TO_THE_SEARCH_PAGE'); ?>"><?php echo JText::_('SEARCH_PAGE'); ?></a></li>
                        </ul>
                        <br/>
                        <p><?php echo JText::_('IF_DIFFICULTIES_PERSIST__PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR_OF_THIS_SITE'); ?> <a href="mailto:it@myunisg.ch" title="">it@myunisg.ch</a></p>
                        <br/>
                        <p><strong><?php echo JText::_('TECHNICAL_INFO'); ?>:</strong></p>
                        <div id="techinfo">
                            <p><?php echo $this->error->getMessage(); ?></p>
                            <p>
                                <?php if ($this->debug) :
                                echo $this->renderBacktrace();
                            endif; ?>
                        </p>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div id="footer">
            <?php
                $modules = JModuleHelper::getModules( 'shsg-footer' );
                foreach ($modules as $module) { echo JModuleHelper::renderModule( $module); }
            ?>
        </div>
    </div>
    <!-- Piwik --> 
    <script type="text/javascript">
    var pkBaseURL = (("https:" == document.location.protocol) ? "https://shsg.unisg.ch/analytics/" : "http://shsg.unisg.ch/analytics/");
    document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
    </script><script type="text/javascript">
    try {
    var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
    piwikTracker.trackPageView();
    piwikTracker.enableLinkTracking();
    } catch( err ) {}
    </script><noscript><p><img src="http://shsg.unisg.ch/analytics/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
    <!-- End Piwik Tracking Code -->
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-8766561-1']);
      _gaq.push(['_setDomainName', 'myunisg.ch']);
      _gaq.push(['_setAllowHash', 'false']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
</body>
</html>
