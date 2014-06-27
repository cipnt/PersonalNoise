<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package personalnoise
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="topline"></div>

<div id="wrapper">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'personalnoise' ); ?></a>

	<?php
	$options = personalnoise_get_theme_options();
		if ( 'off' != $options['show_rss_link']
			|| ''  != $options['twitter_url']
			|| ''  != $options['facebook_url']
			|| ''  != $options['google_url']
			|| ''  != $options['vimeo_url']
			|| ''  != $options['youtube_url']
			|| ''  != $options['linkedin_url']
			|| ''  != $options['flickr_url']
		) :
	?>

	<ul id="syndicate">
		<?php if ( ''!= $options['twitter_url'] ) : ?>
			<a href="<?php echo esc_url( $options['twitter_url'] ); ?>" title="<?php esc_attr_e( 'Twitter', 'personalnoise' ); ?>" target="_blank"><li class="twitter"><?php _e( 'Twitter', 'personalnoise' ); ?></li></a>
		<?php endif; ?>

		<?php if ( ''!= $options['facebook_url'] ) : ?>
			<a href="<?php echo esc_url( $options['facebook_url'] ); ?>" title="<?php esc_attr_e( 'Facebook', 'personalnoise' ); ?>" target="_blank"><li class="facebook"><?php _e( 'Facebook', 'personalnoise' ); ?></li></a>
		<?php endif; ?>

		<?php if ( ''!= $options['google_url'] ) : ?>
			<a href="<?php echo esc_url( $options['google_url'] ); ?>" title="<?php esc_attr_e( 'Google+', 'personalnoise' ); ?>" target="_blank"><li class="googleplus"><?php _e( 'Google+', 'personalnoise' ); ?></li></a>
		<?php endif; ?>

		<?php if ( ''!= $options['vimeo_url'] ) : ?>
			<a href="<?php echo esc_url( $options['vimeo_url'] ); ?>" title="<?php esc_attr_e( 'Vimeo', 'personalnoise' ); ?>" target="_blank"><li class="vimeo"><?php _e( 'Vimeo', 'personalnoise' ); ?></li></a>
		<?php endif; ?>

		<?php if ( ''!= $options['youtube_url'] ) : ?>
			<a href="<?php echo esc_url( $options['youtube_url'] ); ?>" title="<?php esc_attr_e( 'YouTube', 'personalnoise' ); ?>" target="_blank"><li class="youtube"><?php _e( 'YouTube', 'personalnoise' ); ?></li></a>
		<?php endif; ?>

		<?php if ( ''!= $options['linkedin_url'] ) : ?>
			<a href="<?php echo esc_url( $options['linkedin_url'] ); ?>" title="<?php esc_attr_e( 'LinkedIn', 'personalnoise' ); ?>" target="_blank"><li class="linkedin"><?php _e( 'LinkedIn', 'personalnoise' ); ?></li></a>
		<?php endif; ?>

		<?php if ( ''!= $options['flickr_url'] ) : ?>
			<a href="<?php echo esc_url( $options['flickr_url'] ); ?>" title="<?php esc_attr_e( 'Flickr', 'personalnoise' ); ?>" target="_blank"><li class="flickr"><?php _e( 'Flickr', 'personalnoise' ); ?></li></a>
		<?php endif; ?>

		<?php if ( 'off' != $options['show_rss_link'] ) : ?>
			<a href="<?php echo get_feed_link( 'rss2' ); ?>" title="<?php esc_attr_e( 'RSS', 'personalnoise' ); ?>" target="_blank"><li class="rss"><?php _e( 'RSS', 'personalnoise' ); ?></li></a>
		<?php endif; ?>

	</ul><!-- .syndicate -->
	<?php endif; ?>

	<div id="page" class="hfeed site">

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</a>
			</div>
			<div class="search-header">
				<?php get_search_form(); ?>
			</div>

  			<div id="cover">
			    <div id="cover_outer">
			        <div id="cover_inner">
			            <img src="http://placehold.it/1280x300" width="1280" height="250">
			        </div>
			    </div>
			</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'Primary Menu', 'personalnoise' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">
