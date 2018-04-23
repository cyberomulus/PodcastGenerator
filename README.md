# PodcastGenerator

## What is PodcastGenerator ?  
PodcastGenerator is a PHP library that makes it easy to generate a feed RSS for Podcast (including iTunes specific tags).

## How to install PodcastGenerator
There are 2 ways to install PodcastGenerator.

If you use [Composer](https://getcomposer.org/), PodcastGenerator is available by [Packagist](https://packagist.org).  
Just add the dependencies to your composer.json:  
	
	{
		"require": {
            "cyberomulus/podcast-generator": "1.0"
        }
    }
	
Else, got to the page [github of PodcastGenerator](https://github.com/cyberomulus/PodcastGenerator) and choose the release of your choice.  
You can download the source code with the link 'Download ZIP'.  
Place the directory in the ZIP in a lib folder (for example) of your project.

## What I need to use PodcastGenerator

It takes minimum PHP version 5.2.0 with Dom extension enabled (it is enabled by default).

## How to use PodcastGenerator ?

For use, just :

1. Configure the feed with the constructor of object `Podcast`.
2. Configure all elements of podcast with the constructor of object `Media`.
3. Transmit the list of Element to the podcast with the function `Podcast::addMedia()`
4. Retrieve the generate feed with the function `Podcast::toString()` or `Podcast::toDom()`

### 1. the constructor of object `Podcast`.

Here is the translate documentation of constructor :

	/**
	 * Create a podcast.
	 * 
	 * @param	string	$titre
	 * 				General title of podcast.
	 * 				He's placed in tags XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<title>THE TITLE</title>
	 * 						<image>
	 * 							<title>THE TILE</title>
	 * 						</image>
	 * 					<channel>
	 * 				</rss>
	 * @param	string	$description
	 * 				Description of podcast.
	 * 				He's placed in tags XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<description>THE DESCRIPTION</description>
	 * 						<itunes:summary>THE DESCRIPTION</itunes:summary>
	 * 					<channel>
	 * 				</rss>
	 * @param	string	$lien
	 * 				URL the the website ofs podcast.
	 * 				He's placed in tags XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<link>URL</link>
	 * 						<image>
	 * 							<link>URL</link>
	 * 						</image>
	 * 					<channel>
	 * 				</rss>
	 * @param	string	$image
	 * 				URL to the image of podcast.
	 * 				He's placed in tags and attributes XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<image>
	 * 							<url>URL</url>
	 * 						</image>
	 * 						<itunes:image href="URL" />
	 * 					<channel>
	 * 				</rss>
	 * @param	string	$auteur
	 * 				Author of podcast.
	 * 				He's placed in tags XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<itunes:author>AUTHOR</itunes:author>
	 * 						<itunes:owner>
	 * 							<itunes:name>AUTHOR</itunes:name>
	 * 						</itunes:owner>
	 * 					<channel>
	 * 				</rss>
	 * @param 	string|null		$categorie
	 * 				Category of podcast.
	 * 				He's placed in tag XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<itunes:category>CATEGORY</itunes:category>
	 * 					<channel>
	 * 				</rss>
	 * 				For not display this tag, put null (default)
	 * @param 	string|null		$sousTitre
	 * 				General subtitle of podcast.
	 * 				He's placed in tag XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<itunes:subtitle>SUBTITLE</itunes:subtitle>
	 * 					<channel>
	 * 				</rss>
	 * 				For not display this tag, put null (default)
	 * @param 	string|null		$langue
	 * 				Language of podcast.
	 * 				He's placed in tag XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<language>LANGUAGE</language>
	 * 					<channel>
	 * 				</rss>
	 * 				For not display this tag, put null (default)
	 * @param 	string|null		$email
	 * 				Email address of the owner of the podcast.
	 * 				He's placed in tag XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<itunes:owner>
	 * 							<itunes:email>EMAIL</itunes:email>
	 * 						</itunes:owner>
	 * 					<channel>
	 * 				</rss>
	 * 				For not display this tag, put null (default)
	 * @param	string|null		$copyright
	 * 				Copyright of podcast.
	 * 				He's placed in tag XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<copyright>COPYRIGHT</copyright>
	 * 					<channel>
	 * 				</rss>
	 * 				For not display this tag, put null (default)
	 * @param 	array 	$medias
	 * 				Media list of podcast.
	 * 				Put null for add the list after
	 * @param 	boolean	$modeInjection
	 * 				If true, the following items will be sent to all media so that it takes the same values as the podcast (does
	 *				effect if the element is null in the media:
	 * 					- the subtitle
	 * 					- URL to the website
	 * 					- the description
	 * 					- the author
	 * 					- the image
	 */
	public function __construct($titre, $description, $lien, $image, $auteur, $categorie=null, $sousTitre=null, $langue=null, $email=null, $copyright=null, $medias=null, $modeInjection=true)

### 2. the constructor of object `Media`.

Here is the translate documentation of constructor :

	/**
	 * Create a media
	 *
	 * @param	string	$titre
	 * 				Title of media.
	 * 				He's placed in tag XML :
	 * 				<item>
	 * 					<title>TITLE</title>
	 * 				</item>
	 * @param	DateTime	$pubDate
	 * 				Publication date of media.
	 * 				He's placed in tag XML :
	 * 				<item>
	 * 					<pubDate>DATE</pubDate>
	 * 				</item>
	 * @param	string	$url
	 * 				URL of media
	 * 				He's placed in tag XML :
	 * 				<item>
	 * 					<enclosure url="URL" />
	 * 				</item>
	 * @param	string	$type
	 * 				Type of media (exemple : audio/mpeg)
	 * 				He's placed in tag XML :
	 * 				<item>
	 * 					<enclosure type="TYPE" />
	 * 				</item>
	 * @param	string	$guid
	 * 				GUID of media.
	 * 				Attention, the GUID must be unique across the Internet
	 * 				He's placed in tag XML :
	 * 				<item>
	 * 					<guid>GUID</guid>
	 * 				</item>
	 * @param	string	$duree
	 * 				Duration of media, in format : HH:MM:SS, H:MM:SS, MM:SS ou M:SS
	 * 				He's placed in tag XML :
	 * 				<item>
	 * 					<itunes:duration>DURATION</itunes:duration>
	 * 				</item>
	 * @param	string|null		$descripton
	 * 				Description of media.
	 * 				He's placed in tags XML :
	 * 				<item>
	 * 					<description>DESCRIPTION</description>
	 * 					<itunes:summary>DESCRIPTION</itunes:summary>
	 * 				</item>
	 * 				If it is null and the podcast is modeInjection to true, the description will be 
	 *				the same as that of the podcast
	 * @param	string|null		$sousTitre
	 * 				Subtitle of media
	 * 				He's placed in tag XML :
	 * 				<item>
	 * 					<itunes:subtitle>SUBTITLE</itunes:subtitle>
	 * 				</item>
	 * 				If it is null and the podcast is modeInjection to true, the description will be 
	 *				the same as that of the podcast
	 * @param	string|null		$lien
	 * 				URL to the website of media.
	 * 				He's placed in tag XML :
	 * 				<item>
	 * 					<link>URL</link>
	 * 				</item>
	 * 				If it is null and the podcast is modeInjection to true, the description will be 
	 *				the same as that of the podcast
	 * @param	string|null		$auteur
	 * 				Author of media.
	 * 				He's placed in tag XML :
	 * 				<item>
	 * 					<author>AUTHOR</author>
	 * 					<itunes:author>AUTHOR</itunes:author>
	 * 				</item>
	 * 				If it is null and the podcast is modeInjection to true, the description will be 
	 *				the same as that of the podcast
	 * @param	string|null		$image
	 * 				URL to the image of media.
	 * 				He's placed in tag and atribute XML :
	 * 				<item>
	 * 					<itunes:image href="URL" />
	 * 				</item>
	 * 				If it is null and the podcast is modeInjection to true, the description will be 
	 *				the same as that of the podcast
	 */
	public function __construct($titre, $pubDate, $url, $type, $guid, $duree, $descripton=null, $sousTitre=null, $lien=null, $auteur=null, $image=null)

### 3. The injection mode

The injection mode allows the podcast to send its own information in all medias so that they take the same values.  
Here is the information that can be inherited by the elements of a podcast:

1. The description
2. The subtitle
3. URL to the website
4. The author
5. The image

These values will be inherited from the podcast where these two conditions are required :

- The attribute `$modeInjection` of constructor `Podcast` is `true`
- The value in the element is set to `null`

## Example of use

	<?php
	// do not forget to import the classes
	require 'lib/Podcast.php';
	require 'lib/Media.php';
	use Cyberomulus\PodcastGenerator\Podcast;
	use Cyberomulus\PodcastGenerator\Media;
	
	// create a podcast
	$podcast = new Podcast(
			"A Title for my Podcast",
			"A description for my Podcast",
			"http://www.mysite.com",
			"http://www.mysite.com/img/podcast.jpg",
			"My Name",
			"music",
			"A subtitle for my Podcast",
			null, // I do not wish to specify language
			null, // I do not wish to specify email
			null, // I do not wish to specify copyright
			null, // I've yet to add media
			true  // I activate the injection mode
			);
	
	// we will put the media in a array
	// This is not mandatory but useful when transmitting them to the podcast media
	$medias = array();
	
	// create a first media
	$medias[] = new Media(
			"Broadcast of 23/01/15", 
			new DateTime("2015-01-23"), 
			"http://www.mysite.com/media/fichier1.mp3", 
			"audio/mpeg", 
			"a_unique_guid_in_all_internet", 
			"15:05",
			"A specific description for this media",
			null, // I do not want to specify a specific subtitle for this media
			null, // I do not want to specify a specific link for this media
			null, // I do not want to specify a specific author for this media
			null // I do not want to specify a specific image for this media
			);
	
	// create a second media
	$medias[] = new Media(
			"Broadcast of 24/01/15",
			new DateTime("2015-01-24"),
			"http://www.mysite.com/media/fichier2.mp3",
			"audio/mpeg",
			"a_another_unique_guid_in_all_internet",
			"1:01:48",
			null, // I do not want to specify a specific description for this media
			"A friend visit me in studio",
			null, // I do not want to specify a specific link for this media
			"My name + Name of my friend",
			null // I do not want to specify a specific image for this media
			);
	
	// transmit all medias in podcast
	// I can send a array (a merging will do) 
	// but also a Media object only (will be added to the list)
	$podcast->addMedia($medias);
	
	// to display the XML document
	header ("Content-Type:text/xml");
	echo $podcast->toString();
	
	// but it is possible to recover the DOM document for editing
	$dom = $podcast->toDom();
	?>

The result :

	<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0">
		<channel>
			<title>A Title for my Podcast</title>
			<itunes:subtitle>A subtitle for my Podcast</itunes:subtitle>
			<link>http://www.mysite.com</link>
			<description>
			<![CDATA[ A description for my Podcast ]]>
			</description>
			<itunes:summary>A description for my Podcast</itunes:summary>
			<image>
			<title>A Title for my Podcast</title>
			<link>http://www.mysite.com</link>
			<url>http://www.mysite.com/img/podcast.jpg</url>
			</image>
			<itunes:image href="http://www.mysite.com/img/podcast.jpg"/>
			<itunes:author>My Name</itunes:author>
			<itunes:owner>
			<itunes:name>My Name</itunes:name>
			</itunes:owner>
			<itunes:category>music</itunes:category>
			<item>
				<title>Broadcast of 23/01/15</title>
				<itunes:subtitle>A subtitle for my Podcast</itunes:subtitle>
				<description>
				<![CDATA[ A specific description for this media ]]>
				</description>
				<itunes:summary>A specific description for this media</itunes:summary>
				<link>http://www.mysite.com</link>
				<pubDate>Fri, 23 Jan 2015 00:00:00 +0100</pubDate>
				<enclosure url="http://www.mysite.com/media/fichier1.mp3" type="audio/mpeg"/>
				<author>My Name</author>
				<itunes:author>My Name</itunes:author>
				<itunes:duration>15:05</itunes:duration>
				<guid>a_unique_guid_in_all_internet</guid>
				<itunes:image href="http://www.mysite.com/img/podcast.jpg"/>
			</item>
			<item>
				<title>Broadcast of 24/01/15</title>
				<itunes:subtitle>A friend visit me in studio</itunes:subtitle>
				<description>
				<![CDATA[ A description for my Podcast ]]>
				</description>
				<itunes:summary>A description for my Podcast</itunes:summary>
				<link>http://www.mysite.com</link>
				<pubDate>Sat, 24 Jan 2015 00:00:00 +0100</pubDate>
				<enclosure url="http://www.mysite.com/media/fichier2.mp3" type="audio/mpeg"/>
				<author>My name + Name of my friend</author>
				<itunes:author>My name + Name of my friend</itunes:author>
				<itunes:duration>1:01:48</itunes:duration>
				<guid>a_another_unique_guid_in_all_internet</guid>
				<itunes:image href="http://www.mysite.com/img/podcast.jpg"/>
			</item>
			<pubDate>Sat, 24 Jan 2015 00:00:00 +0100</pubDate>
		</channel>
	</rss>

## What license is PodcastGEnerator
PodcastGenerator is under MIT license (license free).  
You will find the license text in the file LICENSE.