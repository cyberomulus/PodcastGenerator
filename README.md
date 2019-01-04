# PodcastGenerator

## What is PodcastGenerator ?  
PodcastGenerator is a PHP library that makes it easy to generate a feed RSS for Podcast (including iTunes specific tags).

## How to install PodcastGenerator
There are 2 ways to install PodcastGenerator.

If you use [Composer](https://getcomposer.org/), PodcastGenerator is available by [Packagist](https://packagist.org).  
Just add the dependencies to your composer.json:  
	
	{
		"require": {
            "cyberomulus/podcast-generator": "2.*"
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
3. Transmit the list of Media to the podcast with the function `Podcast::addMedia()`
4. Retrieve the generate feed with the function `Podcast::toString()` or `Podcast::toDom()`

### 1. the constructor of object `Podcast`.

Here the phpdoc of constructor :

	/**
     * Podcast creation.
     *
     * @param	string	$title
     * 				General title of the podcast.
     * 				It's used for this XML tags :
     * 				<rss>
     * 					<channel>
     * 						<title>THE TITLE</title>
     * 						<image>
     * 							<title>THE TITLE</title>
     * 						</image>
     * 					<channel>
     * 				</rss>
     * @param	string	$description
     * 				Description of the podcast.
     * 				It's used for this XML tags :
     * 				<rss>
     * 					<channel>
     * 						<description>THE DESCRIPTION</description>
     * 						<itunes:summary>THE DESCRIPTION</itunes:summary>
     * 					<channel>
     * 				</rss>
     * @param	string	$link
     * 				Link to the PODCAST website
     *              It's used for this XML tags :
     * 				<rss>
     * 					<channel>
     * 						<link>LINK</link>
     * 						<image>
     * 							<link>LINK</link>
     * 						</image>
     * 					<channel>
     * 				</rss>
     * @param	string	$image
     * 				URL of the image representing the podcast.
     *              It's used for this XML tags :
     * 				<rss>
     * 					<channel>
     * 						<image>
     * 							<url>IMAGE</url>
     * 						</image>
     * 						<itunes:image href="IMAGE" />
     * 					<channel>
     * 				</rss>
     * @param	string	$author
     * 				Author of the podcast.
     * 				It's used for this XML tags :
     * 				<rss>
     * 					<channel>
     * 						<itunes:author>AUTHOR</itunes:author>
     * 						<itunes:owner>
     * 							<itunes:name>AUTHOR</itunes:name>
     * 						</itunes:owner>
     * 					<channel>
     * 				</rss>
     * @param 	string|null		$category
     * 				Category of the podcast.
     * 				It's used for this XML tags :
     * 				<rss>
     * 					<channel>
     * 						<itunes:category>CATEGORY</itunes:category>
     * 					<channel>
     * 				</rss>
     * 				To not display this tag, set null (default value)
     * @param 	string|null		$subtitle
     * 				General subtitle of the podcast.
     * 				It's used for this XML tags :
     * 				<rss>
     * 					<channel>
     * 						<itunes:subtitle>THE SUBTITLE</itunes:subtitle>
     * 					<channel>
     * 				</rss>
     * 				To not display this tag, set null (default value)
     * @param 	string|null		$language
     * 				Language of the podcast.
     * 				It's used for this XML tags :
     * 				<rss>
     * 					<channel>
     * 						<language>LA LANGUE</language>
     * 					<channel>
     * 				</rss>
     * 				To not display this tag, set null (default value)
     * @param 	string|null		$email
     * 				Email address of the podcast owner.
     *              It's used for this XML tags :
     * 				<rss>
     * 					<channel>
     * 						<itunes:owner>
     * 							<itunes:email>EMAIL</itunes:email>
     * 						</itunes:owner>
     * 					<channel>
     * 				</rss>
     * 				To not display this tag, set null (default value)
     * @param	string|null		$copyright
     * 				Copyright of the podcast.
     * 				It's used for this XML tags :
     * 				<rss>
     * 					<channel>
     * 						<copyright>COPYRIGHT</copyright>
     * 					<channel>
     * 				</rss>
     * 				To not display this tag, set null (default value)
     * @param 	array 	$medias
     * 				Medias list of the podcast.
     * 				null to add the media afterwards
     * @param 	boolean	$injectionMode
     * 				if true, the following elements will be transmitted to all media so that they take the same
     *              values ​​as the podcast(only works if the element is null in the media):
     * 					- the subtitle
     * 					- Link to the website
     * 					- the description
     * 					- the author
     * 					- theimage
     */
	public function __construct($title, $description, $link, $image, $author, $category=null, $subtitle=null, $language=null, $email=null, $copyright=null, $medias=null, $injectionMode=true)

### 2. the constructor of object `Media`.

Here the phpdoc of constructor :

	/**
   	 * Media creation
   	 *
   	 * @param	string	$title
   	 * 				Title of the media.
   	 * 				It's used for this XML tags :
   	 * 				<item>
   	 * 					<title>THE TITLE</title>
   	 * 				</item>
   	 * @param	\DateTime	$pubDate
   	 * 				Publication date of the media.
     *              It's used for this XML tags :
     *              <item>
     *           		<pubDate>PUBLICATION DATE</pubDate>
     *              </item>
   	 * @param	string	$url
   	 * 				URL of the media
   	 * 				It's used for this XML tags :
   	 * 				<item>
   	 * 					<enclosure url="URL" />
   	 * 				</item>
   	 * @param	string	$type
   	 * 				Type of the media (audio/mpeg other)
   	 * 				It's used for this XML tags :
   	 * 				<item>
   	 * 					<enclosure type="TYPE" />
   	 * 				</item>
   	 * @param	string	$guid
   	 * 				GUID of the media.
   	 *              Warning, the GUID must be unique on all the internet (use the url is good way).
   	 * 				It's used for this XML tags :
   	 * 				<item>
   	 * 					<guid>GUID</guid>
   	 * 				</item>
   	 * @param	string	$duration
   	 * 				Media Duration in this formats Only : HH:MM:SS, H:MM:SS, MM:SS or M:SS
   	 * 				It's used for this XML tags :
   	 * 				<item>
   	 * 					<itunes:duration>DURATION</itunes:duration>
   	 * 				</item>
   	 * @param	string|null		$descripton
   	 * 				Description of the media.
   	 * 				It's used for this XML tags :
   	 * 				<item>
   	 * 					<description>THE DESCRIPTION</description>
   	 * 					<itunes:summary>THE DESCRIPTION</itunes:summary>
   	 * 				</item>
   	 * 				if it's null and the podcast is in injectionMod (on true), the description will be the same as
     *              that of the podcast
   	 * @param	string|null		$subtitle
   	 * 				Subtitle of the media.
   	 * 				It's used for this XML tags :
   	 * 				<item>
   	 * 					<itunes:subtitle>THE SUBTITLE</itunes:subtitle>
   	 * 				</item>
   	 * 				if it's null and the podcast is in injectionMod (on true), the subtitle will be the same as
     *              that of the podcast
   	 * @param	string|null		$link
   	 * 				Link to the media website.
   	 * 				It's used for this XML tags :
   	 * 				<item>
   	 * 					<link>LINK</link>
   	 * 				</item>
   	 * 				if it's null and the podcast is in injectionMod (on true), the link will be the same as
     *              that of the podcast
   	 * @param	string|null		$author
   	 * 				Author of the media.
   	 * 				It's used for this XML tags :
   	 * 				<item>
   	 * 					<author>AUTHOR</author>
   	 * 					<itunes:author>AUTHOR</itunes:author>
   	 * 				</item>
   	 * 				if it's null and the podcast is in injectionMod (on true), the author will be the same as
     *              that of the podcast
   	 * @param	string|null		$image
   	 * 				URL of the image representing the media.
   	 * 				It's used for this XML tags :
   	 * 				<item>
   	 * 					<itunes:image href="IMAGE" />
   	 * 				</item>
   	 * 				if it's null and the podcast is in injectionMod (on true), the image url will be the same as
     *              that of the podcast
   	 */
   	public function __construct($title, $pubDate, $url, $type, $guid, $duration, $descripton=null, $subtitle=null, $link=null, $author=null, $image=null)

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
	echo $podcast->toXML();
	// same as :
	// echo $podcast->toString();
	
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