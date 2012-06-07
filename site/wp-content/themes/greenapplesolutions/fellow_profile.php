<?php
/*
Template Name: Fellow profile (2 Cols)
*/
get_header(); ?>

<div class="clear"></div>
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
    <hr/>
    <?php roots_sidebar_before(); ?>
    <aside id="left-sidebar" class="grid_5 push_1" role="complementary">
        <?php roots_sidebar_inside_before(); ?>
        <div class="container">
            <?php get_sidebar('left'); ?>
        </div>
        <?php roots_sidebar_inside_after(); ?>
    </aside>
    <!-- /#left sidebar -->
    <?php roots_sidebar_after(); ?>

     <?php roots_sidebar_before(); ?>
    <aside id="top-sidebar" class="grid_17 push_1" role="complementary">
        <?php roots_sidebar_inside_before(); ?>
        <div class="container">
            <?php get_sidebar('top'); ?>
            <hr/>
        </div>
        <?php roots_sidebar_inside_after(); ?>
    </aside>
    <!-- /#top sidebar -->
    <?php roots_sidebar_after(); ?>

    <?php roots_main_before(); ?>
    <div id="main" class="grid_17 push_1" role="main">
        <div class="container">
            <?php roots_loop_before(); ?>
            <?php get_template_part('loop', 'page'); ?>
            <?php roots_loop_after(); ?>
        </div>
    </div>
    <!-- /#main -->
    <?php roots_main_after(); ?>
   <!-- <?php /*roots_sidebar_before(); */?>
    <aside id="sidebar" class="grid_3 push_1" role="complementary">
        <?php /*roots_sidebar_inside_before(); */?>
        <div class="container">
            <?php /*get_sidebar(); */?>
        </div>
        <?php /*roots_sidebar_inside_after(); */?>
    </aside>
    <!-- /#sidebar -->
    <?php /*roots_sidebar_after(); */?>
    <div class="clear"></div>
</div><!-- /#content -->
<?php roots_content_after(); ?>
<?php get_footer(); ?>
