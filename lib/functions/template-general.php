<?php
/**
 * General template functions. These functions are for use throughout the theme's various template files.
 * Their main purpose is to handle many of the template tags that are currently lacking in core WordPress.
 *
 * @package    Cherry_Framework
 * @subpackage Functions
 * @author     Cherry Team <support@cherryframework.com>
 * @copyright  Copyright (c) 2012 - 2014, Cherry Team
 * @link       http://www.cherryframework.com/
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Outputs the link back to the site.
 *
 * @since  4.0.0
 *
 * @return void
 */
function cherry_site_link() {
	echo cherry_get_site_link();
}

/**
 * Returns a link back to the site.
 *
 * @since  4.0.0
 *
 * @return string
 */
function cherry_get_site_link() {
	if ( $title = get_bloginfo( 'name' ) ) {
		$url = apply_filters( 'cherry_change_logo_url', esc_url( home_url('/') ) );
		return sprintf( '<a class="site-link" href="%s" rel="home">%s</a>', $url, $title );
	} else {
		return false;
	}
}

/**
 * Displays a link to WordPress.org.
 *
 * @since  4.0.0
 *
 * @return void
 */
function cherry_wp_link() {
	echo cherry_get_wp_link();
}

/**
 * Returns a link to WordPress.org.
 *
 * @since  4.0.0
 *
 * @return string
 */
function cherry_get_wp_link() {
	return sprintf( '<a class="wp-link" href="http://wordpress.org/">%s</a>', 'WordPress' );
}

/**
 * Displays a link to the parent theme URI.
 *
 * @since  4.0.0
 *
 * @return void
 */
function cherry_theme_link() {
	echo cherry_get_theme_link();
}

/**
 * Returns a link to the parent theme URI.
 *
 * @since  4.0.0
 *
 * @return string
 */
function cherry_get_theme_link() {
	$theme = wp_get_theme( get_template() );
	$uri   = $theme->get( 'ThemeURI' );
	$name  = $theme->display( 'Name', false, true );
	$title = sprintf( __( '%s WordPress Theme', 'cherry' ), $name );

	return sprintf( '<a class="theme-link" href="%s" title="%s">%s</a>', esc_url( $uri ), esc_attr( $title ), $name );
}

/**
 * Outputs the site title.
 *
 * @since  4.0.0
 *
 * @return void
 */
function cherry_site_title() {
	echo cherry_get_site_title();
}

/**
 * Returns the linked site title wrapped in an '<h1>' tag.
 *
 * @since  4.0.0
 *
 * @return string
 */
function cherry_get_site_title() {
	if ( !cherry_get_site_link() ) {
		return false;
	}
	$title = sprintf( '<h1 class="%s">%s</h1>', 'site-title', cherry_get_site_link() );

	return apply_filters( 'cherry_site_title', $title );
}

/**
 * Outputs the site description.
 *
 * @since  4.0.0
 * @return void
 */
function cherry_site_description() {
	echo cherry_get_site_description();
}

/**
 * Returns the site description wrapped in an '<h2>' tag.
 *
 * @since  4.0.0
 *
 * @return string
 */
function cherry_get_site_description() {
	if ( $desc = get_bloginfo( 'description' ) ) {
		$desc = sprintf( '<h2 class="%s">%s</h2>', 'site-description', $desc );
	}

	return apply_filters( 'cherry_site_description', $desc );
}