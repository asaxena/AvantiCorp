<?php get_header(); ?>
<?php roots_content_before(); ?>
<div id="banner-area" class="<?php echo $roots_options['container_class'] ?>">
    <div class="grid_24">
        <?php roots_sidebar_before(); ?>
        <?php roots_sidebar_inside_before(); ?>
        <div class="container">
            <?php get_sidebar('banner'); ?>
            <div class="clear"></div>
        </div>
        <?php roots_sidebar_inside_after(); ?>
        <!-- /#Banner -->
        <?php roots_sidebar_after(); ?>

    </div>
    <div class="clear"></div>
</div>
<div id="content" class="<?php echo $roots_options['container_class']; ?>">
    <?php roots_main_before(); ?>
    <div id="main" class="grid_17 push_1" role="main">
        <div class="container">
            <h1><?php _e('Blogs', 'roots');?></h1>
            <?php get_template_part('loop', 'index'); ?>
        </div>
    </div>
    <!-- /#main -->
    <?php roots_main_after(); ?>
    <?php roots_sidebar_before(); ?>
    <aside id="sidebar" class="grid_5 push_1" role="complementary">
        <?php roots_sidebar_inside_before(); ?>
        <div class="container">
            <?php get_sidebar(); ?>
        </div>
        <?php roots_sidebar_inside_after(); ?>
    </aside>
    <!-- /#sidebar -->
    <?php roots_sidebar_after(); ?>
</div><!-- /#content -->
<?php roots_content_after(); ?>
<?php get_footer(); ?>
