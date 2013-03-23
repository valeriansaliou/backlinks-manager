<?php

/*

	Backlinks.com v1.0 ads manager
	Provides an easy to use function to call ads
	Makes your website faster by caching every ad
	
	2011, Vanaryon
	http://codingteam.net/project/backlinks-manager
	
*/

// Get the Backlinks for the page
function getBacklinks($page, $type) {
	// Available pages
	// Add your own pages + IDs here (replace the page_X and the XXXX-XXXX-XXXX)!
	if($type == 'content') {
		$script = 'enginec.php';
		$available = array(
			'page_1' => 'XXXX-XXXX-XXXX',
			'page_2' => 'XXXX-XXXX-XXXX',
			'page_3' => 'XXXX-XXXX-XXXX'
		);
	}
	
	else {
		$script = 'engine.php';
		$available = array(
			'page_1' => 'XXXX-XXXX-XXXX',
			'page_2' => 'XXXX-XXXX-XXXX',
			'page_3' => 'XXXX-XXXX-XXXX'
		);
	}
	
	// Not available?
	if(!isset($available[$page]))
		return '';
	
	$key = $available[$page];
	$cache_file = './ads/'.$key.'.cache';
	
	// Must get from server?
	if(!file_exists($cache_file) || (isset($_SERVER['HTTP_USER_AGENT']) && ($_SERVER['HTTP_USER_AGENT'] == 'BackLinks.com'))) {
		// Get the cache data
		if(strlen($_SERVER['SCRIPT_URI']))
			$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_URI'].((strlen($_SERVER['QUERY_STRING'])) ? '?'.$_SERVER['QUERY_STRING'] : '');
		if(!strlen($_SERVER['REQUEST_URI']))
			$_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'].((strlen($_SERVER['QUERY_STRING'])) ? '?'.$_SERVER['QUERY_STRING'] : '');
		
		$query = 'LinkUrl='.urlencode((($_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		$query .= '&Key=' .urlencode($key);
		$query .= '&OpenInNewWindow=1';
		$code = @file_get_contents('http://www.backlinks.com/'.$script.'?'.$query);
		
		// Write code to cache
		@file_put_contents($cache_file, $code);
	}
	
	// Get from cache
	else
		$code = @file_get_contents($cache_file);
	
	if(!$code)
		$code = '';
	
	return $code;
}

?>
