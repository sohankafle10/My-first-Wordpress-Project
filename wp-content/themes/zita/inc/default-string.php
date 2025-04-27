<?php
/**
 * Zita Theme Strings
 *
 * @package     Zita
 * @author      Zita
 * @copyright   Copyright (c) 2018, Zit
 * @since       Zita 1.0.0
 */
/**
 * Default Strings
 */
if ( ! function_exists( 'zita_default_strings' ) ) {

	/**
	 * Default Strings
	 *
	 * @since 1.0.0
	 * @param  string  $key  String key.
	 * @param  boolean $echo Print string.
	 * @return mixed        Return string or nothing.
	 */
	function zita_default_strings( $key, $echo = true ) {

		$defaults = apply_filters(
			'zita_default_strings', array(

				// Header.
				'string-header-skip-link'                => __( 'Skip to content', 'zita' ),

				// 404 Page Strings.
				'string-404-sub-title'                   => __( 'It looks like the link pointing here was faulty. Maybe try searching?', 'zita' ),

				// Search Page Strings.
				'string-search-nothing-found'            => __( 'Nothing Found', 'zita' ),
				'string-search-nothing-found-message'    => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'zita' ),
				'string-full-width-search-message'       => __( 'Start typing and press enter to search', 'zita' ),
				'string-full-width-search-placeholder'   => __( 'Start Typing&hellip;', 'zita' ),
				'string-header-cover-search-placeholder' => __( 'Start Typing&hellip;', 'zita' ),
				'string-search-input-placeholder'        => __( 'Search &hellip;', 'zita' ),

				// Comment Template Strings.
				'string-comment-reply-link'              => __( 'Reply', 'zita' ),
				'string-comment-edit-link'               => __( 'Edit', 'zita' ),
				'string-comment-awaiting-moderation'     => __( 'Your comment is awaiting moderation.', 'zita' ),
				'string-comment-title-reply'             => __( 'Leave a Comment', 'zita' ),
				'string-comment-cancel-reply-link'       => __( 'Cancel Reply', 'zita' ),
				'string-comment-label-submit'            => __( 'Post Comment &raquo;', 'zita' ),
				'string-comment-label-message'           => __( 'Type here..', 'zita' ),
				'string-comment-label-name'              => __( 'Name*', 'zita' ),
				'string-comment-label-email'             => __( 'Email*', 'zita' ),
				'string-comment-label-website'           => __( 'Website', 'zita' ),
				'string-comment-closed'                  => __( 'Comments are closed.', 'zita' ),
				'string-comment-navigation-title'        => __( 'Comment navigation', 'zita' ),
				'string-comment-navigation-next'         => __( 'Newer Comments', 'zita' ),
				'string-comment-navigation-previous'     => __( 'Older Comments', 'zita' ),

				// Blog Default Strings.
				'string-blog-page-links-before'          => __( 'Pages:', 'zita' ),
				'string-blog-meta-author-by'             => __( 'By ', 'zita' ),
				'string-blog-meta-leave-a-comment'       => __( 'Leave a Comment', 'zita' ),
				'string-blog-meta-one-comment'           => __( '1 Comment', 'zita' ),
				'string-blog-meta-multiple-comment'      => __( '% Comments', 'zita' ),
				'string-blog-navigation-next'            => __( 'Next Page', 'zita' ) . ' <span class="ast-right-arrow">&rarr;</span>',
				'string-blog-navigation-previous'        => '<span class="ast-left-arrow">&larr;</span> ' . __( 'Previous Page', 'zita' ),

				// Single Post Default Strings.
				'string-single-page-links-before'        => __( 'Pages:', 'zita' ),
				/* translators: 1: Post type label */
				'string-single-navigation-next'          => __( 'Next %s', 'zita' ) . ' <span class="ast-right-arrow">&rarr;</span>',
				/* translators: 1: Post type label */
				'string-single-navigation-previous'      => '<span class="ast-left-arrow">&larr;</span> ' . __( 'Previous %s', 'zita' ),

				// Content None.
				'string-content-nothing-found-message'   => __( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'zita' ),

			)
		);
		$output = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';

		/**
		 * Print or return
		 */
		if ( $echo ) {
			echo esc_attr($output);
		} else {
			return $output;
		}
	}
}
