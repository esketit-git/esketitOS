<start>

<?php

	// output RSS feed to HTML
	require_once("rss2html.php");
	
	output_rss_feed('https://www.newsbtc.com/feed', 10, true, true, 200);

	echo "<p>News by NewsBTC.com</p>";

	output_rss_feed('https://www.cryptoninjas.net/feed/', 10, true, true, 200);

	echo "<p>News by Cryptoninjas.com</p>";

?>

