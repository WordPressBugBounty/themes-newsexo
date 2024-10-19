/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function ( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function ( value ) {
		value.bind( function ( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function ( value ) {
		value.bind( function ( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	// Service title
	wp.customize(
		'newsexo_social_icon_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.custom-social-icons .followus' ).text( newval );
				}
			);
		}
	);
	
	// Service title
	wp.customize(
		'newsexo_trending_news_area_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.trending-news-area .heading h5' ).text( newval );
				}
			);
		}
	);
	
	// Service title
	wp.customize(
		'newsexo_popular_tags_area_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.theme-tags-area .tags-item b' ).text( newval );
				}
			);
		}
	);
	
	// Service title
	wp.customize(
		'newsexo_featured_news_area_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.featured-news-section .news-section-title h5' ).text( newval );
				}
			);
		}
	);
	
	// Service title
	wp.customize(
		'newsexo_featured_news_viewall_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.featured-news-section .news-section-title a' ).text( newval );
				}
			);
		}
	);
	
	// Service title
	wp.customize(
		'newsexo_you_have_missed_section_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.sponsored-news-section .news-section-title h5' ).text( newval );
				}
			);
		}
	);
	
	// Service title
	wp.customize(
		'newsexo_related_post_section_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.related-posts .news-section-title h5' ).text( newval );
				}
			);
		}
	);
	
	// footer copyright text
	wp.customize(
		'newsexo_footer_copright_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.site-footer .site-info' ).text( newval );
				}
			);
		}
	);
	
	
} )( jQuery );
