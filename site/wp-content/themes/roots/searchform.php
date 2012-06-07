<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
  <label class="visuallyhidden" for="s"><?php _e('Search for:', 'roots'); ?></label>
  <a href="http://www.facebook.com/avantifellows" target="_blank"><img src="/assets/icon_facebook.png" alt="facebook" style="margin-top: -3px;
    width: 28px;"/></a> <a href="https://twitter.com/#!/AvantiFellows" target="_blank"><img src="/assets/icon_twitter.png" alt="twitter" style="margin-top: -3px;
    width: 28px;" /></a> <input type="text" value="" name="s" id="s" placeholder="<?php _e('Search', 'roots'); ?> <?php bloginfo('name'); ?>">
  <input type="submit" id="searchsubmit" value="<?php _e('Search', 'roots'); ?>" class="button">
</form>
