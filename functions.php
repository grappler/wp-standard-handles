<?php
/**
 * Enqueue Google Web Fonts.
 */
function prefix_enqueue_google_web_fonts() {
	wp_enqueue_style( 'google-fonts', prefix_google_web_fonts_url(), array(), null, 'all' );
}
add_action( 'wp_enqueue_scripts', 'prefix_enqueue_google_web_fonts' );

/**
 * Return url with Google Fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function prefix_google_web_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	$fonts = apply_filters( 'pre_google_web_fonts', $fonts );

	foreach ( $fonts as $key => $value ) {
		$fonts[ $key ] = $key . ':' . implode( ',', $value );
	}

	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'text-domain' );
	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg(
			array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			),
			'//fonts.googleapis.com/css'
		);
	}

	return apply_filters( 'google_web_fonts_url', $fonts_url );
}


/**
 * Return Google fonts and sizes
 *
 * @return array Google fonts and sizes.
 */
function prefix_additional_fonts( $fonts ) {

	/* translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'text-domain' ) ) {
		$fonts['Noto Serif'] = array(
			'400italic' => '400italic',
			'700italic' => '700italic',
			'400'       => '400',
			'700'       => '700',
		);
	}

	return $fonts;
}
add_filter( 'pre_google_web_fonts', 'prefix_additional_fonts' );
