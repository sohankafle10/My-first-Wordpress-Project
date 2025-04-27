<?php
/**
 * Zita: Block Patterns
 *
 * @since Zita
 */

/**
 * Registers block patterns and categories.
 *
 * @since Zita
 *
 * @return void
 */
  function zita_register_block_patterns() {
	$block_pattern_categories = array(
		'featured' => array( 'label' => __( 'Featured', 'zita' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'zita' ) ),
		'header'   => array( 'label' => __( 'Headers', 'zita' ) ),
		'query'    => array( 'label' => __( 'Query', 'zita' ) ),
		'pages'    => array( 'label' => __( 'Pages', 'zita' ) ),
		'zita'    => array( 'label' => __( 'Zita', 'zita' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Zita
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'zita_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'ribbon',
		'pricing',
		'service',
		'about',
		'testimonials',
		'brand'
	);

	if (class_exists('WooCommerce')) {
		// $block_patterns [] = 'all-products';

		array_push($block_patterns, 'all-products','new-products');
	}

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Zita
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'zita_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'zita/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'zita_register_block_patterns', 9 );