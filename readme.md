##bxslider plugin for Wordpress

#A Responsive Slider plugin for Wordpress

forked from [wandoledzep/bxslider-4](http://github.com/wandoledzep/bxslider-4)

__bxslider__ is a responsive slider plugin built using:

*	[fitvids.js](http://fitvidsjs.com/) by [Chris Coyier](http://css-tricks.com "CSS-Tricks") and [Dave Rupert](http://daverupert.com "Paravel")
*	[bxslider.js](http://bxslider.com/) by [Steven Wanderski](http://stevenwanderski.com "bxSlider")

It uses jquery to get the job done. Yeah I know, sorry, your probably using it anyway right?

* * *

##Important source files

*	`js/plugins/jquery.fitvids.js`
*	`js/jquery.bxslider.js`
*	`css/jquery.bxslider.css`
*	`css/images/bxloader.gif`
*	`css/images/controls.png`
*	`bxslider.php`

* * *

##Usage

1.	Create a new category for assigning posts e.g. `front-page-slider`
2.	Create a few posts and assign them to that category
3.	If you wish to hide those posts from the search and main loop I sugest you install a plugin such as [Simply Exclude](http://www.codehooligans.com/projects/wordpress/simply-exclude/) to remove them from the main loop.
4.	Install and activate the plugin
5.	Include `<?php echo bxslider( 'front-page-slider' ); ?>` in your template by editing the template file and pasting in the code, be sure to change `front-page-slider` to your chosen category, if you leave it as `bxslider( 'front-page-slider' )` it will retrieve all posts.


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

![Example Image of bxslider plugin](http://flxa.github.com/bxslider-4/img/screenshot.jpg "Example of bxslider with vimeo video")

* * *

##Customization

The main plugin file `bxslider.php` uses Wordpress [get_posts](http://codex.wordpress.org/Template_Tags/get_posts) function to pull posts from the category passed through from the template hook.

    $bx_args = array(
        'category_name'   => $cat,
        'orderby'         => $orderby,
        'order'           => $order,
        'post_type'       => $post_type,
        'post_status'     => $post_status,
        'suppress_filters' => true 
    );

bxslider does not require any arguments passed through but you can pass in the above variables, comma separated in that order.

bxslider has many more [options](http://bxslider.com/options).

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