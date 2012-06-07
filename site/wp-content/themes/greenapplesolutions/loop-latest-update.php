<?php
$args = array( 'post_type' => 'latest Update', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
echo '<ol class="latest-update" >';
while ( $loop->have_posts() ) : $loop->the_post();
	echo '<li class=latest-update-title><a href="' . get_permalink() . '"> ';the_title();echo'</a>';
    echo '<div class="latest-update-date">';the_date('F j, Y');echo '</div>';
    echo'</li>';
	/*echo '<div class="entry-content">';
	the_content();
	echo '</div>';*/
endwhile;
echo'</ol>';
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ($WP_query->max_num_pages > 1) : ?>
  <nav id="post-nav">
    <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'roots' ) ); ?></div>
    <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'roots' ) ); ?></div>
  </nav>
<?php endif; ?>


