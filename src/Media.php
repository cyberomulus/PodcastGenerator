<?php
namespace Cyberomulus\PodcastGenerator;

/*
 * This file is part of the PodcastGenerator package.
 *
 * (c) Brack Romain <cyberomulus.me@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * This class represents a medià to inject in a Podacst
 *
 * @author cyberomulus - Brack Romain <cyberomulus.me@gmail.com>
 */
class Media
	{
	/**
	 * Title of the media.
     * It's used for this XML tags :
	 * <item>
	 * 		<title>THE TITLE</title>
	 * </item>
	 *
	 * @var string
	 */
	private $title;

	/**
	 * Subtitle of the media.
	 * It's used for this XML tags :
	 * <item>
	 * 		<itunes:subtitle>THE SUBTITLE</itunes:subtitle>
	 * </item>
	 *
	 * @var string|null
	 */
	private $subtitle;

	/**
	 * Link to the media website.
	 * It's used for this XML tags :
	 * <item>
	 * 		<link>LINK</link>
	 * </item>
	 *
	 * @var string
	 */
	private $link;

	/**
	 * Publication date of the media.
	 * It's used for this XML tags :
	 * <item>
	 * 		<pubDate>PUBLICATION DATE</pubDate>
	 * </item>
	 *
	 * @var \DateTime
	 */
	private $pubDate;

	/**
	 * Description OF THE media.
	 * It's used for this XML tags :
	 * <item>
	 * 		<description>THE DESCRIPTION</description>
	 * 		<itunes:summary>THE DESCRIPTION</itunes:summary>
	 * </item>
	 *
	 * @var string
	 */
	private $description;

	/**
	 * URL of the media
	 * It's used for this XML tags :
	 * <item>
	 * 		<enclosure url="URL" />
	 * </item>
	 *
	 * @var string
	 */
	private $url;

	/**
	 * Type of media (audio/mpeg or other)
	 * It's used for this XML tags :
	 * <item>
	 * 		<enclosure type="TYPE" />
	 * </item>
	 *
	 * @var string
	 */
	private $type;

	/**
	 * Authorr of the media.
	 * It's used for this XML tags :
	 * <item>
	 * 		<author>THE AUTOHOR</author>
	 * 		<itunes:author>THE AUTHOR</itunes:author>
	 * </item>
	 *
	 * @var string
	 */
	private $author;

	/**
	 * GUID of the media.
	 * It's used for this XML tags :
	 * <item>
	 * 		<guid>GUID</guid>
	 * </item>
	 *
	 * @var string
	 */
	private $guid;

	/**
	 * Media Duration in this formats Only : HH:MM:SS, H:MM:SS, MM:SS or M:SS
	 * It's used for this XML tags :
	 * <item>
	 * 		<itunes:duration>DURATION</itunes:duration>
	 * </item>
	 *
	 * @var string
	 */
	private $duration;

	/**
	 * URL of the image representing the media.
	 * It's used for this XML tags :
	 * <item>
	 * 		<itunes:image href="IMAGE" />
	 * </item>
	 *
	 * @var string
	 */
	private $image;

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
		{
		$this->title = $title;
		$this->pubDate = $pubDate;
		$this->url = $url;
		$this->type = $type;
		$this->guid = $guid;
		$this->duration = $duration;
		$this->description = $descripton;
		$this->subtitle = $subtitle;
		$this->link = $link;
		$this->author = $author;
		$this->image = $image;
		}

	/**
	 * @return	\DateTime
	 * 				the publication date of du media
	 */
	public function getPubDate()
		{
		return $this->pubDate;
		}
		
	/**
	 * This method is called by the Podcast class if it is set to injection mode (on true)
	 *
	 * @param	string|null		$subtitle
     * 				Subtitle of the media.
     * 				It's used for this XML tags :
     * 				<item>
     * 					<itunes:subtitle>THE SUBTITLE</itunes:subtitle>
     * 				</item>
     * @param	string|null		$link
     * 				Link to the media website.
     * 				It's used for this XML tags :
     * 				<item>
     * 					<link>LINK</link>
     * 				</item>
	 * @param	string|null		$descripton
     * 				Description of the media.
     * 				It's used for this XML tags :
     * 				<item>
     * 					<description>THE DESCRIPTION</description>
     * 					<itunes:summary>THE DESCRIPTION</itunes:summary>
     * 				</item>
	 * @param	string|null		$author
     * 				Author of the media.
     * 				It's used for this XML tags :
     * 				<item>
     * 					<author>AUTHOR</author>
     * 					<itunes:author>AUTHOR</itunes:author>
     * 				</item>
     * @param	string|null		$image
     * 				URL of the image representing the media.
     * 				It's used for this XML tags :
     * 				<item>
     * 					<itunes:image href="IMAGE" />
     * 				</item>
	 */
	public function inject($subtitle, $link, $description, $author, $image)
		{
		if ($this->subtitle == null)
			$this->subtitle = $subtitle;

		if ($this->link == null)
			$this->link = $link;

		if ($this->description == null)
			$this->description = $description;

		if ($this->author == null)
			$this->author = $author;

		if ($this->image == null)
			$this->image = $image;
		}

    /**
     * @deprecated  2.0
     *                  Deprecated since 2.0, see UPGRADE-2.0 for information
     *                  It will be removed at version 3.0
     * @see         Media::inject()
     */
    public function injecter($subtitle, $link, $description, $author, $image)
        {
        $this->inject($subtitle, $link, $description, $author, $image);
        }

	/**
	 * Adds the media in the Dom document as a parameter
	 *
	 * @param	\DOMDocument		$dom
	 * 				Dom document in which the media will be added
	 */
	public function addToDom($dom)
		{
		$channels = $dom->getElementsByTagName("channel");
		$channel = $channels->item(0);

		$item = $dom->createElement("item");
		$channel->appendChild($item);

		$title = $dom->createElement("title", $this->title);
		$item->appendChild($title);

		if ($this->subtitle != null)
			{
			$itune_subtitle = $dom->createElement("itunes:subtitle", $this->subtitle);
			$item->appendChild($itune_subtitle);
			}

		$description = $dom->createElement("description");
		$description->appendChild($dom->createCDATASection($this->description));
		$item->appendChild($description);

		$itune_summary = $dom->createElement("itunes:summary", $this->description);
		$item->appendChild($itune_summary);

		$link = $dom->createElement("link", $this->link);
		$item->appendChild($link);

		$pubDate = $dom->createElement("pubDate", $this->pubDate->format(DATE_RFC2822));
		$item->appendChild($pubDate);

		$enclosure = $dom->createElement("enclosure");
		$enclosure->setAttribute("url", $this->url);
		$enclosure->setAttribute("type", $this->type);
		$item->appendChild($enclosure);

		$author = $dom->createElement("author", $this->author);
		$item->appendChild($author);

		$itune_author = $dom->createElement("itunes:author", $this->author);
		$item->appendChild($itune_author);

		$itune_duration = $dom->createElement("itunes:duration", $this->duration);
		$item->appendChild($itune_duration);

		$guid = $dom->createElement("guid", $this->guid);
		$item->appendChild($guid);

		$itune_image = $dom->createElement("itunes:image");
		$itune_image->setAttribute("href", $this->image);
		$item->appendChild($itune_image);
		}
	}