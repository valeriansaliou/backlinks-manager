<?php

/*

	Backlinks.com v1.0 ads manager
	Provides an easy to use function to call ads
	Makes your website faster by caching every ad
	
	2011, Vanaryon
	http://codingteam.net/project/backlinks-manager
	
*/

?>

<?php $backlinks = getBacklinks($page, 'content').getBacklinks($page, 'standard'); ?>

<div class="links">
	<?php
	
		if(strpos(strtolower($backlinks), '</a>'))
			echo($backlinks);
		else
			echo($backlinks.'<div class="none">No links, but you can buy one!</div>');
	
	?>
	
	<!-- Add your own affiliate ID in the link below! (replace the XXXXX) -->
	<a class="refer" href="http://www.whylink.com?aff=XXXXX" target="_blank">Advertise here »</a>
</div>
