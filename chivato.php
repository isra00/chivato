<?php

/*
Plugin Name: Chivato
Description: SRM Tz custom plugin for detecting the current environment, whether Development or Production, and set it in the HTML to be used by CSS
Version: 1.0
Author: Israel Viana
Author URI: http://srmtanzania.org
*/

function chivar()
{
	if (!is_user_logged_in())
	{
		return;
	}

	$env = (false !== strpos(gethostname(), '.secureserver.net'))
			? 'dev' : 'prod';

	add_filter('language_attributes', function($attr) use ($env)
	{
	    return "{$attr} data-env=\"{$env}\"";
	});
}

add_action('init', 'chivar');