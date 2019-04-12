/* jslint esnext: true */
/* global wp */

/**
 * Internal dependencies
 */
import MyTermSelector from './my-term-selector';

// Based on the example here: https://github.com/WordPress/gutenberg/tree/master/packages/editor/src/components/post-taxonomies#custom-taxonomy-selector
( function() {
	const el = wp.element.createElement;

	// It's up to you on how to make this dynamic..
	const taxes = [ 'category', 'post_tag', 'etc_tax' ];

	function MyPostTaxesUI( OriginalComponent ) {
		return function( props ) {
			// props.slug is the taxonomy (slug)
			if ( taxes.indexOf( props.slug ) >= 0 ) {
				return el(
					MyTermSelector,
					props
				);
			}

			return el(
				OriginalComponent,
				props
			);
		};
	}

	wp.hooks.addFilter(
		'editor.PostTaxonomyType',
		'my-custom-plugin', // you should change this
		MyPostTaxesUI
	);
} )(); // end closure
