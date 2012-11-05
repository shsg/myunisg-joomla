<?php defined('_JEXEC') or die;

/* The following line loads the MooTools JavaScript Library */
JHTML::_('behavior.framework', false);

/* The following line gets the application object for things like displaying the site name */
$app = JFactory::getApplication();
$menu = & JSite::getMenu();

$isFrontpage = $menu->getActive() == $menu->getDefault();
$sidebar = trim($this->getBuffer('modules', 'shsg-page-sidebar', array('style'=>'none'))); // Content of the Sidebar on subpages

if (JURI::current() == "http://myunisg.ch/vote.html" || JURI::current() == "http://myunisg.ch/vote") {
    $cred = $_GET;
    
    if ($cred['param1'] != null) {
        $cred['username'] = $cred['param1'];
        $app = &JFactory::getApplication();
        $app->login($cred);
    }
    
    $user =& JFactory::getUser();
    if ($user->guest) { // If user is not logged in, redirect him to HSG login page
        header( 'Location: http://serviceportal.unisg.ch/shsg' ) ;
    } else { // If user got redirected back from HSG login page, he got authenticated already, so we need to reload the current page (eg /vote.html) without parameters (because component is rendered *before* he gets authenticated and therefore in the component he is not logged in) => redirecton to current page (eg /vote.html) without parameters re-renders the component
        // echo "You are logged in as " . $user->name;
        if ($cred['param1'] != null) {
            header( 'Location: http://myunisg.ch/vote.html' ) ;
        }
    }
}

unset($this->_scripts["/media/system/js/core.js"]);
unset($this->_scripts["/media/system/js/mootools-core.js"]);
unset($this->_scripts["/media/system/js/caption.js"]);
?>
<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset ?>"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
    <!--[if IE 7.0]><link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template_ie7.css" type="text/css" /><![endif]-->
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/template.js"></script>
</head>
<body>
    <div id="wrapper" class="<?php if (!empty($isFrontpage)) { ?>frontpage<?php } else { ?>page<?php if (empty($sidebar)) { ?> page-wide<?php } ?><?php } ?>">
        <div id="wrapper-header" class="box">
            <div id="header">
                <a id="hsg-logo" href="<?php echo $this->baseurl ?>" title="Startseite"><span>Universti&auml;t St. Gallen</span></a>
                <a id="shsg-logo" href="<?php echo $this->baseurl ?>" title="Startseite"><span>Studentenschaft der Universti&auml;t St. Gallen</span></a>
                <jdoc:include type="modules" name="shsg-search" style="none" />
            </div>
            <jdoc:include type="modules" name="shsg-topmenu" style="mainmenu" />
        </div>
<?php if ($isFrontpage) { /* NOTE if it's the frontpage… */ ?>
    <jdoc:include type="message" />
    <jdoc:include type="modules" name="shsg-front-votebanner" style="none" />

        <div id="main">
            <div id="content">
                <jdoc:include type="modules" name="shsg-front-content" style="frontpage" />
                <div id="newsevents-wrapper" class="box">
                    <div id="newsevents">
                        <div id="news">
                            <h1><a href="/news.html" title="">News</a></h1>
                            <jdoc:include type="modules" name="shsg-front-news" style="frontpage" />
                        </div>
                        <hr id="news-events-divider" />
                        <div id="events">
                            <h1><a href="/events.html" title="">Events</a></h1>
                            <jdoc:include type="modules" name="shsg-front-events" style="frontpage" />
                        </div>
                        <div id="news-all">
                            <a href="/news.html" title="">Alle Neuigkeiten&hellip;</a>
                        </div>
                        <div id="events-all">
                            <a href="/events.html" title="">Alle Events&hellip;</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div id="initiatives">
                    <div class="initiative box" id="meetingpoint">
                        <span></span>
                        <a href="/initiativen/meetingpoint-a-adhoc.html" title="MeetingPoint" target="_self">MeetingPoint & <em>[</em>ad<em>]</em>hoc</a>
                    </div>
                    <div class="initiative box" id="prisma">
                        <span></span>
                        <a href="http://www.prisma-hsg.ch/" title="Prisma" target="_blank">Prisma</a>
                    </div>
                    <div class="initiative box" id="skk">
                        <span></span>
                        <a href="http://www.myskk.ch/" title="Skriptenkommision (SKK)" target="_blank">SKK</a>
                    </div>
                    <div class="initiative box" id="ressortinternational">
                        <span></span>
                        <a href="http://international.myunisg.ch/" title="Ressort International" target="_blank">Ressort International</a>
                    </div>
                    <div class="initiative box" id="challengethebest">
                        <span></span>
                        <a href="http://www.challengethebest.org/" title="ChallengeTheBest (CtB)" target="_blank">ChallengeTheBest</a>
                    </div>
                </div>
            </div>
            <div id="sidebar">
                <jdoc:include type="modules" name="shsg-front-sidebar" style="none" />
                
                <?php /*<div id="other-links">
                    <ul>
                        <li><a href="#" title="#">&raquo; Kontakt</a></li>
                        <li><a href="#" title="#">&raquo; Sitemap</a></li>
                        <li><a href="#" title="#">&raquo; Suche</a></li>
                        <li><a href="#" title="#">&raquo; Login</a></li>
                    </ul>
                </div>*/ ?>
            </div>
        </div>
   <?php } else { /* NOTE … then it's a normal subpage */ ?>
        <jdoc:include type="message" />
        <div id="main">
            <div id="page-content" class="box<?php if(empty($sidebar)) : ?> page-content-wide<?php endif; ?>"><?php if($this->countModules('shsg-topquote')) : ?><jdoc:include type="modules" name="shsg-topquote" style="none" /><?php endif; ?><jdoc:include type="modules" name="shsg-precomponent" style="none" /><jdoc:include type="component" /><jdoc:include type="modules" name="shsg-postcomponent" style="none" />
            </div>
            <?php if(!empty($sidebar)) : ?>
            <div id="page-sidebar" class="box">
                <div id="submenu">
                    <?php echo $sidebar; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    <?php } /* NOTE end frontpage-/subpage-switch */ ?>
        <div id="footer">
            <jdoc:include type="modules" name="shsg-footer" style="none" />
        </div>
    </div>
    <!-- Piwik --> 
    <script type="text/javascript">
    var pkBaseURL = (("https:" == document.location.protocol) ? "https://myunisg.ch/analytics/" : "http://myunisg.ch/analytics/");
    document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
    </script><script type="text/javascript">
    try {
    var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
    piwikTracker.trackPageView();
    piwikTracker.enableLinkTracking();
    } catch( err ) {}
    </script><noscript><p><img src="http://myunisg.ch/analytics/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
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
