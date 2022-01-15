<?PHP 

$user     = 'username'; 
$key      = 'Last.fm API KEY';
	
// Get information about the last played albums.
$endpoint = 'https://ws.audioscrobbler.com/2.0/?method=user.gettopalbums&user=' . $user . '&api_key=' . $key . '&period=7day&limit=12&format=json';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); // 0 for indefinite
curl_setopt($ch, CURLOPT_TIMEOUT, 10); // 10 second attempt before timing out
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
$response = curl_exec($ch);
$albumcharts[] = json_decode($response, true);
curl_close($ch);

// Get the top 9 albums and their artwork.	
$album_1 = $albumcharts[0]['topalbums']['album'][0]['image'][3]['#text'];
$album_2 = $albumcharts[0]['topalbums']['album'][1]['image'][3]['#text'];
$album_3 = $albumcharts[0]['topalbums']['album'][2]['image'][3]['#text'];
$album_4 = $albumcharts[0]['topalbums']['album'][3]['image'][3]['#text'];
$album_5 = $albumcharts[0]['topalbums']['album'][4]['image'][3]['#text'];
$album_6 = $albumcharts[0]['topalbums']['album'][5]['image'][3]['#text'];
$album_7 = $albumcharts[0]['topalbums']['album'][6]['image'][3]['#text'];
$album_8 = $albumcharts[0]['topalbums']['album'][7]['image'][3]['#text'];
$album_9 = $albumcharts[0]['topalbums']['album'][8]['image'][3]['#text'];

header( "Content-type: text/xml");	
?>
<rss xmlns:media="http://search.yahoo.com/mrss/" version="2.0">
	<channel>
	<title>Last.fm Top 9 Widget</title>
	<description>An RSS feed to pull the most played albums from Last.fm</description>
	<link>http://chorus.fm</link>

	<item>
		<title>Album One</title>
		<description>
		<![CDATA[ <img src="<?PHP echo $album_1 ; ?>"/><br /> ]]>
		</description>
		<link>http://chorus.fm</link>
		<pubDate>Sun, 09 Jan 2021 00:03:16 EDT</pubDate>
		<guid isPermaLink="true">http://chorus.fm</guid>
	</item>

	<item>
		<title>Album Two</title>
		<description>
		<![CDATA[ <img src="<?PHP echo $album_2 ; ?>"/><br /> ]]>
		</description>
		<link>http://chorus.fm</link>
		<pubDate>Sun, 09 Jan 2021 00:03:16 EDT</pubDate>
		<guid isPermaLink="true">http://chorus.fm</guid>
	</item>
	
	<item>
		<title>Album Three</title>
		<description>
		<![CDATA[ <img src="<?PHP echo $album_3 ; ?>"/><br /> ]]>
		</description>
		<link>http://chorus.fm</link>
		<pubDate>Sun, 09 Jan 2021 00:03:16 EDT</pubDate>
		<guid isPermaLink="true">http://chorus.fm</guid>
	</item>
	
	<item>
		<title>Album Four</title>
		<description>
		<![CDATA[ <img src="<?PHP echo $album_4 ; ?>"/><br /> ]]>
		</description>
		<link>http://chorus.fm</link>
		<pubDate>Sun, 09 Jan 2021 00:03:16 EDT</pubDate>
		<guid isPermaLink="true">http://chorus.fm</guid>
	</item>
	
	<item>
		<title>Album Five</title>
		<description>
		<![CDATA[ <img src="<?PHP echo $album_5 ; ?>"/><br /> ]]>
		</description>
		<link>http://chorus.fm</link>
		<pubDate>Sun, 09 Jan 2021 00:03:16 EDT</pubDate>
		<guid isPermaLink="true">http://chorus.fm</guid>
	</item>
	
	<item>
		<title>Album Six</title>
		<description>
		<![CDATA[ <img src="<?PHP echo $album_6 ; ?>"/><br /> ]]>
		</description>
		<link>http://chorus.fm</link>
		<pubDate>Sun, 09 Jan 2021 00:03:16 EDT</pubDate>
		<guid isPermaLink="true">http://chorus.fm</guid>
	</item>
	
	<item>
		<title>Album Seven</title>
		<description>
		<![CDATA[ <img src="<?PHP echo $album_7 ; ?>"/><br /> ]]>
		</description>
		<link>http://chorus.fm</link>
		<pubDate>Sun, 09 Jan 2021 00:03:16 EDT</pubDate>
		<guid isPermaLink="true">http://chorus.fm</guid>
	</item>
	
	<item>
		<title>Album Eight</title>
		<description>
		<![CDATA[ <img src="<?PHP echo $album_8 ; ?>"/><br /> ]]>
		</description>
		<link>http://chorus.fm</link>
		<pubDate>Sun, 09 Jan 2021 00:03:16 EDT</pubDate>
		<guid isPermaLink="true">http://chorus.fm</guid>
	</item>
	
	<item>
		<title>Album Nine</title>
		<description>
		<![CDATA[ <img src="<?PHP echo $album_9 ; ?>"/><br /> ]]>
		</description>
		<link>http://chorus.fm</link>
		<pubDate>Sun, 09 Jan 2021 00:03:16 EDT</pubDate>
		<guid isPermaLink="true">http://chorus.fm</guid>
	</item>

</channel>
</rss>