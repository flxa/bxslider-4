bxslider 1.0
============

A Responsive Slider plugin for Wordpress
----------------------------------------

__bxslider__ is a responsive slider plugin built using:

*	[fitvids.js](http://fitvidsjs.com/) by [Chris Coyier](http://css-tricks.com "CSS-Tricks") and [Dave Rupert](http://daverupert.com "Paravel")
*	[bxslider.js](http://bxslider.com/) by [Steven Wanderski](http://stevenwanderski.com "bxSlider")

It uses jquery to get the job done. Yeah I know, sorry, your probably using it anyway right?

* * *

Important source files
----------------------

*	`js/plugins/jquery.fitvids.js`
*	`js/jquery.bxslider.js`
*	`css/jquery.bxslider.css`
*	`css/images/bxloader.gif`
*	`css/images/controls.png`
*	`bxslider.php`

* * *

Usage
-----

1.	Create a new category for assigning posts e.g. `front-page-slider`
2.	Create a few posts and assign them to that category
3.	If you wish to hide those posts from the search and main loop I sugest you install a plugin such as [Simply Exclude](http://www.codehooligans.com/projects/wordpress/simply-exclude/) to remove them from the main loop.
4.	Install and activate the plugin
Include `<?php echo bxslider( 'front-page-slider' ); ?>` in your template by editing the template file and pasting in the code, be sure so change `front-page-slider` to your chosen category.


E.g. Go to the backend of Wordpress `Appearance / Editor` and edit your templates Header `header.php` file to include the slider on all pages that include `header.php`.

Your slide posts just need to include an image that you upload through the `Add Media` button in the post editor. 
The slider will accept and render: 
*	Images
*	Text
*	HTML
*	Video (yeah fitvids)
*	iframes

Just create a bunch of slider images that are of the same dimensions e.g. 600x400 and stick each one in a post with the category you have selected. Video will just fill the space available so just paste in the iframe from vimeo or youtube and it'll just work.

* * *

![Example Image of bxslider plugin](/img/screenshot.jpg "Example of bxslider with vimeo video")

* * *

Customization
-------------

The main plugin file `bxslider.php` uses Wordpress [get_posts](http://codex.wordpress.org/Template_Tags/get_posts) function to pull posts from the category passed through from the template hook.

	$args = array(
		'category_name'   => $cat,
		'orderby'         => 'post_date',
		'order'           => 'DESC',
		'post_type'       => 'post',
		'post_status'     => 'publish',
		'suppress_filters' => true 
	);

	$posts_array = get_posts( $args ); 

	foreach ($posts_array as $key => $post) {
		$content .= '<li>'.$post->post_content.'</li>';
	}

That $cat right there is the category name being passed through so you could actually provide a tag or post id's, whatever, and pull different content if that's what you want. Change it via the edit plugin page in WP Admin.
I'm also using the entire post, you may want to change that to just the preview.
The bxslider definition also has many more [options](http://bxslider.com/options).

	var defaults = {
		
		// GENERAL
		mode: 'horizontal',
		slideSelector: '',
		infiniteLoop: true,
		hideControlOnEnd: false,
		speed: 500,
		easing: null,
		slideMargin: 0,
		startSlide: 0,
		randomStart: false,
		captions: false,
		ticker: false,
		tickerHover: false,
		adaptiveHeight: false,
		adaptiveHeightSpeed: 500,
		touchEnabled: true,
		swipeThreshold: 50,
		video: false,
		useCSS: true,
		
		// PAGER
		pager: true,
		pagerType: 'full',
		pagerShortSeparator: ' / ',
		pagerSelector: null,
		buildPager: null,
		pagerCustom: null,
		
		// CONTROLS
		controls: true,
		nextText: 'Next',
		prevText: 'Prev',
		nextSelector: null,
		prevSelector: null,
		autoControls: false,
		startText: 'Start',
		stopText: 'Stop',
		autoControlsCombine: false,
		autoControlsSelector: null,
		
		// AUTO
		auto: false,
		pause: 4000,
		autoStart: true,
		autoDirection: 'next',
		autoHover: false,
		autoDelay: 0,
		
		// CAROUSEL
		minSlides: 1,
		maxSlides: 1,
		moveSlides: 0,
		slideWidth: 0,
		
		// CALLBACKS
		onSliderLoad: function() {},
		onSlideBefore: function() {},
		onSlideAfter: function() {},
		onSlideNext: function() {},
		onSlidePrev: function() {}
	}

* * *

Known Issue
-----------

1.	One issue I came accross is that a template that I had installed while testing also included fitvids.js, this shows up as errors in the console but generally doesn't affect the plugin. This template was [WooTheme's SMPL](http://www.woothemes.com/products/smpl/) template, version 1.1.7. I ended up commenting out fitvids from a file called *third-party.js* (just fitvids part, line 20 to 172).
2.	I'll post more issues here if I find them.

Thanks
------

Thanks for checking this out, please let me know if you find any issues and i'll do my best to fix them up quickly.
I'll be working on crreating a wp-admin page for configuration and when that happens I think it'll be ready for wordpress.org
Until then, please use the hacky methods provided :)