<?php
/**
 * Created by Green Apple Solutions Pvt. Ltd.
 * User: admin
 * Date: 11/24/11
 * Time: 5:43 PM
 *
 */

//Overriding default functionality
if (!defined('HEADER_IMAGE_WIDTH')) {
    define('HEADER_IMAGE_WIDTH', 216);
}

// create widget areas: sidebar, footer
$sidebars = array('Left Sidebar', 'Header', 'Banner', 'Footer-1', 'Footer-2', 'Footer-3', 'Footer-4','Top');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name' => $sidebar,
                          'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="container">',
                          'after_widget' => '</div></article>',
                          'before_title' => '<h3>',
                          'after_title' => '</h3>'
                     ));
}

// The function return formatted recent posts as required for the design
function get_formatted_recent_posts($post_count)
{
    $html = "<ul class='recent-posts'>";
    $args = array('numberposts' => $post_count,
                  'post_status' => 'publish');
    $recent_posts = wp_get_recent_posts($args);
    foreach ($recent_posts as $recent) {
        //        $html .= '<li><span class="post-title">' . $recent["post_title"] . '</span>
        //                      <span class="post-date">' . date('M d, Y', strtotime($recent['post_date'])) . '</span>
        //                      <span class="post-teaser">' . substr($recent['post_content'], 0, 100) . '</span>
        //                    <a class="read-more" href="' . get_permalink($recent["ID"]) . '" title="Look ' . $recent["post_title"] . '" >Read Post &raquo;</a> </li> ';

        $html .= '<li><span class="post-title">' . $recent["post_title"] . '</span>
                      <span class="post-date">' . date('M d, Y', strtotime($recent['post_date'])) . '</span>
                      <span class="post-teaser">'. substr(strip_tags($recent['post_content']), 0, 100).'...</span>
                    <a class="read-more" href="' . get_permalink($recent["ID"]) . '" title="Look ' . $recent["post_title"] . '" >Read Post &raquo;</a> </li> ';


    }
    $html .= "</ul>";
    return $html;
}

/*// The function return formatted recent news posts as required for the design
function get_formatted_recent_posts_by_categories($post_count,$category,$skip_count)
{
    $html = "";
    $args = array('numberposts' => $post_count + $skip_count,
                  'post_status' => 'publish',
                  'category_name' => $category);
    $recent_posts = wp_get_recent_posts($args);
    for($i=$skip_count;$i<$skip_count+$post_count;++$i)  {
        $recent=$recent_posts[$i];

        $html .= '<li><a  href="' . get_permalink($recent["ID"]) . '" title="Look ' . $recent["post_title"] . '"><span class="post-title">' . $recent["post_title"] . '</span></a>
                      <span class="post-date">' . date('M d, Y', strtotime($recent['post_date'])) . '</span>
                      <span class="post-teaser"></span></li>
                     ';


    }
    $html .= "";
    return $html;
}*/

//
function get_formatted_recent_posts_by_categories($post_count,$category,$skip_count)
{
    $html = "";
    $args = array('numberposts' => $post_count + $skip_count,
                  'post_status' => 'publish',
                  'category_name' => $category);
    $recent_posts = wp_get_recent_posts($args);
    for($i=$skip_count;$i<$skip_count+$post_count;++$i)  {
        $recent=$recent_posts[$i];

        $html .= '<span class="post-title">' . $recent["post_title"] . '</span>
                      <span class="post-date">' . date('M d, Y', strtotime($recent['post_date'])) . '</span>
                      <span class="post-teaser">'. substr(strip_tags($recent['post_content']), 0, 100).'...</span>
                      <a class="read-more" href="' . get_permalink($recent["ID"]) . '" title="Look ' . $recent["post_title"] . '" >Read Post &raquo;</a>
                     ';


    }
    $html .= "";
    return $html;
}


//custom post type
add_action( 'init', 'codex_custom_init' );
function codex_custom_init() {
  $labels = array(
    'name' => _x('Latest Update', 'post type general name'),
    'singular_name' => _x('Latest Update', 'post type singular name'),
    'add_new' => _x('Add New', 'Latest Update'),
    'add_new_item' => __('Add New Latest Update'),
    'edit_item' => __('Edit Latest Update'),
    'new_item' => __('New Latest Update'),
    'all_items' => __('All Latest Update'),
    'view_item' => __('View Latest Update'),
    'search_items' => __('Search Latest Update'),
    'not_found' =>  __('No Latest Update found'),
    'parent_item_colon' => '',
    'menu_name' => 'Latest Update'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
  );
  register_post_type('Latest Update',$args);
}

function get_formatted_recent_latest_update($post_count)
{
    $html = "";
    $args = array('numberposts' => $post_count,
                  'post_status' => 'publish',
                  'post_type' => 'Latest Update');
    $recent_posts = wp_get_recent_posts($args);
    foreach ($recent_posts as $recent) {

        $html .= '<span style="margin-right: 50px;font-size: 16px; color: #333; font-family: kulturista-semi-bold, georgia, serif;">' . $recent["post_title"] . '</span>
                       ';


    }
    $html .= "";
    return $html;
}
// return post entry meta information
function roots_entry_meta() {
  echo '<time style="display:inline-block;" class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s', 'roots'), get_the_time(' F j, Y')) .'</time>,  ';
  echo  comments_number( "no comment", "1 comment", "% comment" );
  echo '<p class="byline author vcard">'. __('Written by', 'roots') .' <a href="'. get_author_posts_url(get_the_author_meta('id')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';

}