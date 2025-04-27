jQuery( document ).ready( function( $ ){
	// JS to submit ajax for load more button
	$(document).on('click', '#load-more-posts', function(e){
		$('.inifiniteLoader').show('fast');
		var previouspaged = $( this ).attr( 'data-paged' );
		var currentpaged = parseInt( previouspaged )+ 1;
		jQuery.ajax({
			type: 'POST',
			url: loadmore.wp_ajax_url,
			data: {
				action : 'zita_load_more_posts',
				paged: currentpaged,
				cat_slug: $( this ).attr('data-cat-slug'),
				author_id: $( this ).attr('data-author-id'),
				data_year: $( this ).attr('data-year'),
				data_month: $( this ).attr('data-month'),
				context: $(this).attr( 'data-context' ),
				query: load_more_data.query,
				nonce: $( '#load-more-posts-nonce' ).val(),
			},
			dataType: 'html'
		})
		.done( function( response ){
			if ( response ){

				$( '#main .main-content-row' ).append( response );
				if ( currentpaged == parseInt( $( '#load-more-posts' ).attr( 'data-max-pages' ) ) ){
					$( '#load-more-posts' ).hide();
					$( '#load-more-posts-error' ).css('display','block');
				} else {
					$( '#load-more-posts' ).attr( 'data-paged', currentpaged );
				}		
			} else {
				$( '#load-more-posts' ).hide();
				$( '#load-more-posts-error' ).css('display','block');
			}
			$('.inifiniteLoader').hide('1000');
		} );
		e.preventDefault();
	});
});