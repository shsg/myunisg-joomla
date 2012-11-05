$(document).ready(function() {
    // NOTE telephonebook
    var address = window.location.pathname;
    if (address == "/telefonbuch.html") {
        $.getScript("/telephonebook/ext/ext-base.js", function(data, status) {
            $.getScript("/telephonebook/ext/ext-all.js", function(data, status) {
                $.getScript("/telephonebook/phone.js", function(data, status) {
                    loadPhonebook();
                });
            });
        });
        
        addCss("/telephonebook/ext/resources/css/ext-all.css");
        addCss("/telephonebook/ext/resources/css/xtheme-gray.css");
    }
    
    // NOTE important links
    if ($("#important-links").length > 0) {
        $("a#important-links-more").click(function(event) {
            event.preventDefault();
            $(event.target).closest('ul').children().each(function() { $(this).show(); });
            $(event.target).hide();
        });
    }
});

// NOTE seen at http://topsecretproject.finitestatemachine.com/2009/09/how-to-load-javascript-and-css-dynamically-with-jquery/
function addCss(href) {
    $("head").append("<link>");
    css = $("head").children(":last");
    css.attr({
        rel:  "stylesheet",
        type: "text/css",
        href: href
    });
}