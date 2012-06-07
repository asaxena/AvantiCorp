$(function () {
    var fb_timeout = null;
    var fb_opts = {
        'overlayShow': true,
        'centerOnScroll': true,
        'showCloseButton': true,
        'showNavArrows': true,
        'onCleanup': function () {
            if (fb_timeout) {
                window.clearTimeout(fb_timeout);
                fb_timeout = null;
            }
        }
    }; /* YouTube */
    //$('a[href*="youtube.com/"]:not(.nofancybox)').addClass('fancybox-youtube');
    //$('a[href*="youtu.be/"]:not(.nofancybox)').addClass('fancybox-youtube');
    $('a.fancybox-youtube, area.fancybox-youtube').live('mouseenter',function(){ 
      console.log('coming');
      $(this).fancybox($.extend({}, fb_opts, {
        'type': 'iframe',
        'width': 640,
        'height': 390,
        'padding': 10,
        'autoScale': false,
        'titleShow': false,
        'titlePosition': 'float',
        'titleFromAlt': true,
        'onStart': function (selectedArray, selectedIndex, selectedOpts) {
            selectedOpts.href = selectedArray[selectedIndex].href.replace(new RegExp('youtu.be', 'i'), 'www.youtube.com/embed').replace(new RegExp('watch\\?v=([a-z0-9\_\-]+)(&|\\?)?(.*)', 'i'), 'embed/$1?version=3&$3')
        }}));
	});

    $('a.fancybox-youtube').click(function (e) {
        e.preventDefault();
    }); 

    /* Auto-click */
    $('#fancybox-auto').trigger('click');
    $('#fancybox-auto').live('click', function () {
        $(this).fancybox();
    });
});