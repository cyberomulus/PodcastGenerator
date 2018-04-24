<?php
namespace Cyberomulus\PodcastGenerator;

/*
 * This file is part of the PodcastGenerator package.
 *
 * (c) Brack Romain <http://www.cyberomulus.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * This class represents a podcast
 * 
 * @author cyberomulus - Brack Romain <me@cyberomulus.me>
 */
class Podcast
	{
	/**
	 * Defines whether information will be injected into the media
	 * 
	 * @var boolean
	 */
	private $injectionMode;
	
	/**
	 * General title of podcast.
	 * It's used for this XML tags :
	 * <rss>
	 * 		<channel>
	 * 			<title>THE TITLE</title>
	 * 			<image>
	 * 				<title>THE TITLE</title>
	 * 			</image>
	 * 		<channel>
	 * </rss>
	 * 
	 * @var string
	 */
	private $titLe;
	
	/**
	 * General subtitle of the podcast.
	 * It's used for this XML tags :
	 * <rss>
	 * 		<channel>
	 * 			<itunes:subtitle>THE SUBTITLE</itunes:subtitle>
	 * 		<channel>
	 * </rss>
	 *
	 * @var string|null
	 */
	private $subtitle;
	
	/**
	 * Description of the podcast.
	 * It's used for this XML tags :
	 * <rss>
	 * 		<channel>
	 * 			<description>THE DESCRIPTION</description>
	 * 			<itunes:summary>THE DESCRIPTION</itunes:summary>
	 * 		<channel>
	 * </rss>
	 * 
	 * @var string
	 */
	private $description;
	
	/**
	 * Link to the PODCAST website
	 * It's used for this XML tags :
	 * <rss>
	 * 		<channel>
	 * 			<link>LINK</link>
	 * 			<image>
	 * 				<link>LINK</link>
	 * 			</image>
	 * 		<channel>
	 * </rss>
	 *
	 * @var string
	 */
	private $link;
	
	/**
	 * URL of the image representing the podcast.
     * It's used for this XML tags :
	 * <rss>
	 * 		<channel>
	 * 			<image>
	 * 				<url>IMAGE</url>
	 * 			</image>
	 * 			<itunes:image href="IMAGE" />
	 * 		<channel>
	 * </rss>
	 * 
	 * @var string
	 */
	private $image;
	
	/**
	 * Author of the podcast.
	 * It's used for this XML tags :
	 * <rss>
	 * 		<channel>
	 * 			<itunes:author>AUTHOR</itunes:author>
	 * 			<itunes:owner>
	 * 				<itunes:name>AUTHOR</itunes:name>
	 * 			</itunes:owner>
	 * 		<channel>
	 * </rss>
	 *
	 * @var string
	 */
	private $author;
	
	/**
	 * Category of the podcast.
	 * It's used for this XML tags :
	 * <rss>
	 * 		<channel>
	 * 			<itunes:category>CATEGORY</itunes:category>
	 * 		<channel>
	 * </rss>
	 *
	 * @var string|null
	 */
	private $category;
	
	/**
	 * Language of the podcast.
	 * It's used for this XML tags :
	 * <rss>
	 * 		<channel>
	 * 			<language>LANGUAGE</language>
	 * 		<channel>
	 * </rss>
	 *
	 * @var string|null
	 */
	private $language;
	
	/**
	 * Date of the last podcast publication.
	 * It is defined by the last media on the list.
	 * It's used for this XML tags :
	 * <rss>
	 * 		<channel>
	 * 			<pubDate>PUBLICATION DATE</pubDate>
	 * 		<channel>
	 * </rss>
	 *
	 * @var \DateTime
	 */
	private $pubDate;
	
	/**
	 * Email address of the podcast owner.
	 * It's used for this XML tags :
	 * <rss>
	 * 		<channel>
	 * 			<itunes:owner>
	 * 				<itunes:email>EMAIL</itunes:email>
	 * 			</itunes:owner>
	 * 		<channel>
	 * </rss>
	 *
	 * @var string|null
	 */
	private $email;
	
	/**
	 * Copyright of podcast.
	 * It's used for this XML tags :
	 * <rss>
	 * 		<channel>
	 * 			<copyright>COPYRIGHT</copyright>
	 * 		<channel>
	 * </rss>
	 *
	 * @var string|null
	 */
	private $copyright;
	
	/**
	 * Medias list of the podcast
	 * 
	 * @var array
	 */
	private $medias;
	
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
		{
		$this->injectionMode = $injectionMode;
		$this->titLe = $title;
		$this->description = $description;
		$this->link = $link;
		$this->image = $image;
		$this->author = $author;
		$this->category = $category;
		$this->subtitle = $subtitle;
		$this->language = $language;
		$this->email = $email;
		$this->copyright = $copyright;
		
		if ($medias == null)
			$this->medias = array();
		else
			$this->medias = $medias;
		}
	
	/**
	 * Add one or more media to the podcast
	 * 
	 * @param	Media|Media[]	$media
	 * 				Media(s) to add to the podcast
	 */
	public function addMedia($media)
		{
		if ($media == null)
			return;
		
		if (is_array($media))
			{
			$merge = array_merge($media, $this->medias);
			$this->medias = $merge;
			}
		
		else
			$this->medias[] = $media;
		}
	
	/**
	 * Same as toXML()
	 * 
	 * @return	string
	 * 				The generated podcast in XML format
	 */
	public function toString()
		{		
		return $this->toXML();
		}

    /**
     * Returns the generated podcast in XML format
     *
     * @return	string
     * 				The generated podcast in XML format
     */
    public function toXML()
        {
        return $this->generate()->saveXML();
        }
	
	/**
	 * Returns the generated podcast as a DOM document
	 * 
	 * @return	\DOMDocument
     *              The generated podcast in DOM document
	 */
	public function toDom()
		{
		return $this->generate();
		}
	
	/**
	 * Generate the DOM document
	 * 
	 * @return \DOMDocument
	 */
	private function generate()
		{
		$dom = new \DOMDocument("1.0", "utf-8");

		$rss = $dom->createElement("rss");
		$rss->setAttribute("xmlns:itunes", "http://www.itunes.com/dtds/podcast-1.0.dtd");
		$rss->setAttribute("version", "2.0");
		$dom->appendChild($rss);
		
		$channel = $dom->createElement("channel");
		$rss->appendChild($channel);
		
		$title = $dom->createElement("title", $this->titLe);
		$channel->appendChild($title);
		
		if ($this->subtitle != null)
			{
			$itune_subtitle = $dom->createElement("itunes:subtitle", $this->subtitle);
			$channel->appendChild($itune_subtitle);
			}
		
		$link = $dom->createElement("link", $this->link);
		$channel->appendChild($link);
		
		$description = $dom->createElement("description");
		$description->appendChild($dom->createCDATASection($this->description));
		$channel->appendChild($description);
		
		$itune_summary = $dom->createElement("itunes:summary", $this->description);
		$channel->appendChild($itune_summary);
		
		$image = $dom->createElement("image");
		$image->appendChild($title->cloneNode(true));
		$image->appendChild($link->cloneNode(true));
		$channel->appendChild($image);
		$image_url = $dom->createElement("url", $this->image);
		$image->appendChild($image_url);
		
		$itune_image = $dom->createElement("itunes:image");
		$itune_image->setAttribute("href", $this->image);
		$channel->appendChild($itune_image);
		
		$itune_author = $dom->createElement("itunes:author", $this->author);
		$channel->appendChild($itune_author);
		
		$itune_owner = $dom->createElement("itunes:owner");
		$itune_owner_name = $dom->createElement("itunes:name", $this->author);
		$itune_owner->appendChild($itune_owner_name);
		if ($this->email != null)
			{
			$itune_owner_email = $dom->createElement("itunes:email", $this->email);
			$itune_owner->appendChild($itune_owner_email);
			}
		$channel->appendChild($itune_owner);
		
		if ($this->category != null)
			{
			$category = $dom->createElement("itunes:category", $this->category);
			$channel->appendChild($category);
			}
		
		if ($this->language != null)
			{
			$language = $dom->createElement("language", $this->language);
			$channel->appendChild($language);
			}
		
		if ($this->copyright != null)
			{
			$copyright = $dom->createElement("copyright", $this->copyright);
			$channel->appendChild($copyright);
			}
		
		foreach ($this->medias as $media)
			{
			if ($this->injectionMode == true)
				$media->inject($this->subtitle, $this->link, $this->description, $this->author, $this->image);

			$media->addToDom($dom);
			
			if ($this->pubDate == null)
				$this->pubDate = $media->getPubDate();
			else if ($this->pubDate < $media->getPubDate())
				$this->pubDate = $media->getPubDate();
			}
		
		if ($this->pubDate == null)
			$this->pubDate = new \DateTime();
		$pubDate = $dom->createElement("pubDate", $this->pubDate->format(DATE_RFC2822));
		$channel->appendChild($pubDate);
		
		// retourne le document Dom
		return $dom;
		}
	}