# Table of Contents

- [About](#about)
- [Usage in WordPress (production)](#usage-in-wordpress--production)
- [Technical Details](#technical-details)
- [Make Your Own](#make-your-own)
- [Resources](#resources)
- [Notes](#notes)
- [Changelog](#changelog)

## About

`MyTermSelector` is a customized version of the `HierarchicalTermSelector` used by the [`PostTaxonomies`](https://github.com/WordPress/gutenberg/tree/master/packages/editor/src/components/post-taxonomies) component for the [Gutenberg](https://github.com/WordPress/gutenberg) editor in [WordPress](https://wordpress.org/). Unlike `HierarchicalTermSelector`, `MyTermSelector` basically uses `radio` buttons instead of `checkbox` buttons, allowing you to select only one term in the taxonomy &mdash; e.g. post categories (taxonomy: `category`).

*This project is inspired by [this (helpful) question](https://wordpress.stackexchange.com/q/333143) on WordPress Stack Exchange. :-)*

## Usage in WordPress (production)

1. Download [`build/index.js`](build/index.js), rename it to `my-term-selector.js` and upload/save it in your theme/plugin folder.

2. Link to the saved script; this example uses the [`admin_enqueue_scripts`](https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/) hook:

    ``` php
    add_action( 'admin_enqueue_scripts', function(){
    	if ( ! $screen = get_current_screen() ) {
    		return;
    	}
    
    	$post_types = [ 'post', 'my_cpt' ];
    	if ( in_array( $screen->id, $post_types ) ) {
    		// Make certain `wp-editor` is added as a dependency.
    		wp_enqueue_script( 'my-terms-selector', 'url/to/my-term-selector.js', [ 'wp-editor' ] );
    	}
    } );
	```

## Technical Details

The main component is inside [`src/my-term-selector.js`](src/my-term-selector.js) and it's based on [`hierarchical-term-selector.js`](https://github.com/WordPress/gutenberg/blob/master/packages/editor/src/components/post-taxonomies/hierarchical-term-selector.js) for Gutenberg version `5.4.0-rc.1`. When making changes to the component, make sure to check the latest version of the `hierarchical-term-selector.js` file in the Gutenberg (GitHub) repository. You should also check [`src/utils/terms.js`](https://github.com/WordPress/gutenberg/blob/master/packages/editor/src/utils/terms.js) which is *required* by the component.

**Tried and tested working on WordPress 5.1.1.**

## Make Your Own

**HEADS UP!!** The `npm install` command below will install ***many, many*** Node packages/stuff; so if you don't want to go through that process, just edit the [`build/index.js`](build/index.js) file, just as you would with any "standard" JavaScript scripts. ;-)

1. Clone this repository. E.g. Into a directory named `my-guten`.

2. Change to the directory (e.g. `cd my-guten`) and run `npm install`.

3. Edit `src/my-term-selector.js` and/or `src/index.js` as your heart may desire.. :)

4. Once ready, run `npm run build` to re-build the `build/index.js` for production.

*Note that (for now) it's up to you to make (unit) tests and run the tests.*

Also note that `build/index.js` was generated from the `npm run start` command so that you could easily "just change what necessary". But if you've run `npm install`, then you should run `npm run build` to build the production script.

## Resources

* [JavaScript Build Setup](https://wordpress.org/gutenberg/handbook/designers-developers/developers/tutorials/javascript/js-build-setup/)

* [@wordpress/scripts](https://wordpress.org/gutenberg/handbook/designers-developers/developers/packages/packages-scripts/)

## Notes

1. If you're developing/testing in an **actual React environment**, make certain that all the external and WordPress dependencies are installed. E.g. `npm install --save-dev lodash` (external dependency) and `npm install --save @wordpress/element` (WordPress dependency).

2. This project *may or may not* be maintained, so please consider it as an *example* or a learning resource &mdash; only. =)

## Changelog

* Apr 12<sup>th</sup> 2019: Initial release on GitHub.
