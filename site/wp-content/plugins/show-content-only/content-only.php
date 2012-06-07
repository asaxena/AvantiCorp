<?php
/*
Plugin Name: Show Content Only
Plugin URI: http://www.seodenver.com/content-only/
Description: Display only the post's content, without a theme, scripts or stylesheets.
Author: Katz Web Services, Inc.
Author URI: http://www.katzwebservices.com
Version: 1.1.1
Text Domain: show-content-only
*/

/*  Copyright 2011  Katz Web Services, Inc.  (email : info@katzwebdesign.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

	add_action('init', 'kws_sco_only_I18n');
	
	function kws_sco_only_I18n() {
		load_plugin_textdomain( 'show-content-only', false, untrailingslashit(basename(dirname(__FILE__))).'/languages' );
	}

	function kws_sco_only_keyword_content() {
		global $post;

		if(isset($_GET['content-only']) && is_singular()) {
			the_post();
			echo '<html><head><meta name="robots" value="noindex,nofollow" /></head><body>';
			$content = kws_sco_get_the_content(); // $post->post_content;
			echo $content;
			if(isset($_GET['tags'])) {
				the_tags('<ul><li>','</li><li>','</li></ul>');
			}
			if(isset($_GET['categories'])) {
				the_category();
			}
			echo '</body></html>';
			die();
		}
	}
	add_action('wp', 'kws_sco_only_keyword_content');
	
	// Content for meta box
	function kws_sco_preview_link($post) {
		global $post;
		if(isset($post->ID) && $post->ID != 0) {
			$p = $post->post_type == 'page' ? 'page_id' : 'p';
			$url_none = htmlentities(add_query_arg(array($p => $post->ID, 'content-only' => true), get_option('home') . '/'));
			$url_all = htmlentities(add_query_arg(array($p => $post->ID, 'content-only' => true, 'tags' => true, 'categories' => true), get_option('home') . '/'));
			$url_tag = htmlentities(add_query_arg(array($p => $post->ID, 'content-only' => true, 'tags' => true), get_option('home') . '/'));
			$url_cat = htmlentities(add_query_arg(array($p => $post->ID, 'content-only' => true, 'categories' => true), get_option('home') . '/'));
			echo "<ul>
				<li>".__('Content Only:','show-content-only')."<br /><a href='$url_none'>$url_none</a></li>
				<li>".__('Content, Tags &amp; Cats:','show-content-only')."<br /><a href='$url_all'>$url_all</a></li>
				<li>".__('Content &amp; Tags:','show-content-only')."<br /><a href='$url_tag'>$url_tag</a></li>
				<li>".__('Content &amp; Cats:','show-content-only')."<br /><a href='$url_cat'>$url_cat</a></li>
			</ul>";
		} else {
			echo '<p>'.__('You must publish or save this post before Show Content Only links become available.', 'show-content-only').'</p>';
		}
	}
	
	// Register meta box
	function kws_sco_meta_box() {
		add_meta_box('contentonly', __('Show Content Only Links', 'show-content-only'), 'kws_sco_preview_link', 'post', 'side', 'high');
		add_meta_box('contentonly', __('Show Content Only Links','show-content-only'), 'kws_sco_preview_link', 'page', 'side', 'high');
	}
	add_action('admin_menu', 'kws_sco_meta_box');
		
	/**
	 * Display the post content.
	 *
	 * @since 0.71
	 *
	 * @param string $more_link_text Optional. Content for when there is more text.
	 * @param string $stripteaser Optional. Teaser content before the more text.
	 * @param string $more_file Optional. Not used.
	 */
	function kws_sco_the_content($more_link_text = null, $stripteaser = 0, $more_file = '') {
		$content = get_the_content($more_link_text, $stripteaser, $more_file);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		echo $content;
	}
	
	/**
	 * Retrieve the post content.
	 *
	 * @since 0.71
	 *
	 * @param string $more_link_text Optional. Content for when there is more text.
	 * @param string $stripteaser Optional. Teaser content before the more text.
	 * @param string $more_file Optional. Not used.
	 * @return string
	 */
	function kws_sco_get_the_content($more_link_text = null, $stripteaser = 0, $more_file = '') {
		global $id, $post, $more, $page, $pages, $multipage, $preview, $pagenow;
	
		if ( null === $more_link_text )
			$more_link_text = __( '(more...)' );
	
		$output = '';
		$hasTeaser = false;
	
		// If post password required and it doesn't match the cookie.
		if ( post_password_required($post) ) {
			$output = get_the_password_form();
			return $output;
		}
	
		if ( $more_file != '' )
			$file = $more_file;
		else
			$file = $pagenow; //$_SERVER['PHP_SELF'];
	
		if ( $page > count($pages) ) // if the requested page doesn't exist
			$page = count($pages); // give them the highest numbered page that DOES exist
	
		$content = $pages[$page-1];
		if ( preg_match('/<!--more(.*?)?-->/', $content, $matches) ) {
			$content = explode($matches[0], $content, 2);
			if ( !empty($matches[1]) && !empty($more_link_text) )
				$more_link_text = strip_tags(wp_kses_no_null(trim($matches[1])));
	
			$hasTeaser = true;
		} else {
			$content = array($content);
		}
		if ( (false !== strpos($post->post_content, '<!--noteaser-->') && ((!$multipage) || ($page==1))) )
			$stripteaser = 1;
		$teaser = $content[0];
		if ( ($more) && ($stripteaser) && ($hasTeaser) )
			$teaser = '';
		$output .= $teaser;
		if ( count($content) > 1 ) {
			if ( $more ) {
				$output .= '<span id="more-' . $id . '"></span>' . $content[1];
			} else {
				if ( ! empty($more_link_text) )
					$output .= apply_filters( 'the_content_more_link', ' <a href="' . get_permalink() . "#more-$id\" class=\"more-link\" rel=\"nofollow\">$more_link_text</a>", $more_link_text );
				$output = force_balance_tags($output);
			}
	
		}
		if ( $preview ) // preview fix for javascript bug with foreign languages
			$output =	preg_replace_callback('/\%u([0-9A-F]{4})/', create_function('$match', 'return "&#" . base_convert($match[1], 16, 10) . ";";'), $output);
		
		$output = do_shortcode($output);
		
		return $output;
	}
?>