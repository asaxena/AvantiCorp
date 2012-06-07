<div class="clear"></div>
<?php roots_footer_before(); ?>
<footer>
    <div id="footer-chapters">
        <div class="<?php global $roots_options; echo $roots_options['container_class']; ?>">
            <div class="grid_24">
                <div class="chapter-title">
                    <span>Our Chapters</span>
                </div>
            </div>
            <div class="clear"></div>
            <div class="grid_4" style="margin-right: 37px;">
                <div class="container">
                    <div class="chapter"><a href="/chapters/iit-bombay/" title="IIT Bombay"><img src="/assets/iit-bombay-logo.jpg"></a></div>
                </div>
            </div>
            <div class="grid_4" style="margin-right: 37px;">
                <div class="container">
                    <div class="chapter"><a href="/chapters/iit-delhi/" title="IIT Delhi"><img src="/assets/iit-delhi-logo.jpg"></a></div>

                </div>
            </div>
            <div class="grid_4" style="margin-right: 37px;">
                <div class="container">
                    <div class="chapter"><a href="/chapters/iit-madras/" title="IIT Madras"><img src="/assets/iit-madras-logo.jpg"></a></div>
                </div>
            </div>
            <div class="grid_4" style="margin-right: 37px;">
                <div class="container">
                    <div class="chapter"><a href="/chapters/iit-kanpur/" title="IIT Kanpur"><img src="/assets/iit-kanpur-logo.jpg"></a></div>
                </div>
            </div>
            <div class="grid_4" style="margin-right: 37px;">
                <div class="container">
                    <div class="chapter"><a href="/chapters/iit-roorkee/" title="IIT Roorkee"><img src="/assets/iit-roorkee-logo.jpg"></a></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>

    </div>
    <div class="clear"></div>
    <div id="footer-menus">
        <div class="<?php global $roots_options; echo $roots_options['container_class']; ?>">
            <div class="grid_6">
                <div class="container">
                    <?php dynamic_sidebar('Footer-1'); ?>
                </div>
            </div>
            <div class="grid_6">
                <div class="container">
                    <?php dynamic_sidebar('Footer-2'); ?>
                </div>
            </div>
            <div class="grid_6">
                <div class="container">
                    <?php dynamic_sidebar('Footer-3'); ?>
                </div>
            </div>
            <div class="grid_6">
                <div class="container">
                    <?php dynamic_sidebar('Footer-4'); ?>
                </div>
            </div>
            <div class="clear"></div>
            <div class="grid_24">
                <div class="copyright">
                    Copyright 2009-2010. All Rights Reserved.
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</footer>
<?php roots_footer_after(); ?>
</div><!-- /#wrap -->

<?php wp_footer(); ?>
<?php roots_footer(); ?>

<!--[if lt IE 7]>
  <script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  <script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->

</body>
</html>
