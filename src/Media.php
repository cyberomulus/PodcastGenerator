<?php
namespace Cyberomulus\PodcastGenerator;

/*
 * This file is part of the PodcastGenerator package.
 *
 * (c) Brack Romain <https://github.com/cyberomulus>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Cette classe représente un médià à injecter dans un Podacst
 *
 * @author cyberomulus - Brack Romain <romuluslepunk@gmail.com>
 */
class Media
	{
	/**
	 * Titre du media.
	 * Il se stock dans les balises XML :
	 * <item>
	 * 		<title>LE TITRE</title>
	 * </item>
	 *
	 * @var string
	 */
	private $titre;

	/**
	 * Sous titre général du podcast.
	 * Il se stock dans la balise XML :
	 * <item>
	 * 		<itunes:subtitle>LE SOUS TITRE</itunes:subtitle>
	 * </item>
	 *
	 * @var string|null
	 */
	private $sousTitre;

	/**
	 * URL vers le site web du media.
	 * Elle se stock dans les balises XML :
	 * <item>
	 * 		<link>URL</link>
	 * </item>
	 *
	 * @var string
	 */
	private $lien;

	/**
	 * Date de la publication du media.
	 * Elle se stock dans la balise XML :
	 * <item>
	 * 		<pubDate>LA DATE</pubDate>
	 * </item>
	 *
	 * @var DateTime
	 */
	private $pubDate;

	/**
	 * Description du media.
	 * Elle se stock dans la balise XML :
	 * <item>
	 * 		<description>LA DESCRIPTION</description>
	 * 		<itunes:summary>LA DESCRIPTION</itunes:summary>
	 * </item>
	 *
	 * @var string
	 */
	private $description;

	/**
	 * URL du media
	 * Elle se stock dans la balise XML :
	 * <item>
	 * 		<enclosure url="URL" />
	 * </item>
	 *
	 * @var string
	 */
	private $url;

	/**
	 * Type du media (audio/mpeg par exemple)
	 * Elle se stock dans la balise XML :
	 * <item>
	 * 		<enclosure type="TYPE" />
	 * </item>
	 *
	 * @var string
	 */
	private $type;

	/**
	 * Auteur du media.
	 * Il se stock dans la balise XML :
	 * <item>
	 * 		<author>L'AUTEUR</author>
	 * 		<itunes:author>L'AUTEUR</itunes:author>
	 * </item>
	 *
	 * @var string
	 */
	private $auteur;

	/**
	 * GUID du media.
	 * Il se stock dans la balise XML :
	 * <item>
	 * 		<guid>GUID</guid>
	 * </item>
	 *
	 * @var string
	 */
	private $guid;

	/**
	 * Durée du média sous forme uniquement : HH:MM:SS, H:MM:SS, MM:SS ou M:SS
	 * Elle se stock dans la balise XML :
	 * <item>
	 * 		<itunes:duration>DUREE</itunes:duration>
	 * </item>
	 *
	 * @var string
	 */
	private $duree;

	/**
	 * URL vers l'image représentant le media.
	 * Elle se stock dans les balises et attributs XML :
	 * <item>
	 * 		<itunes:image href="URL" />
	 * </item>
	 *
	 * @var string
	 */
	private $image;

	/**
	 * Création d'un média
	 *
	 * @param	string	$titre
	 * 				Titre du media.
	 * 				Il se stock dans les balises XML :
	 * 				<item>
	 * 					<title>LE TITRE</title>
	 * 				</item>
	 * @param	DateTime	$pubDate
	 * 				Date de la publication du media.
	 * 				Elle se stock dans la balise XML :
	 * 				<item>
	 * 					<pubDate>LA DATE</pubDate>
	 * 				</item>
	 * @param	string	$url
	 * 				URL du media
	 * 				Elle se stock dans la balise XML :
	 * 				<item>
	 * 					<enclosure url="URL" />
	 * 				</item>
	 * @param	string	$type
	 * 				Type du media (audio/mpeg par exemple)
	 * 				Elle se stock dans la balise XML :
	 * 				<item>
	 * 					<enclosure type="TYPE" />
	 * 				</item>
	 * @param	string	$guid
	 * 				GUID du media.
	 * 				Attention, le GUID doit être unique sur tout l'internet
	 * 				Il se stock dans la balise XML :
	 * 				<item>
	 * 					<guid>GUID</guid>
	 * 				</item>
	 * @param	string	$duree
	 * 				Durée du média sous forme uniquement : HH:MM:SS, H:MM:SS, MM:SS ou M:SS
	 * 				Elle se stock dans la balise XML :
	 * 				<item>
	 * 					<itunes:duration>DUREE</itunes:duration>
	 * 				</item>
	 * @param	string|null		$descripton
	 * 				Description du media.
	 * 				Elle se stock dans la balise XML :
	 * 				<item>
	 * 					<description>LA DESCRIPTION</description>
	 * 					<itunes:summary>LA DESCRIPTION</itunes:summary>
	 * 				</item>
	 * 				Si elle est null et que le podcast est en modeInjection à true, la description sera la même
	 * 				que celle du podcast
	 * @param	string|null		$sousTitre
	 * 				Sous titre général du podcast.
	 * 				Il se stock dans la balise XML :
	 * 				<item>
	 * 					<itunes:subtitle>LE SOUS TITRE</itunes:subtitle>
	 * 				</item>
	 * 				Si il est null et que le podcast est en modeInjection à true, le sous titre sera le même
	 * 				que celui du podcast
	 * @param	string|null		$lien
	 * 				URL vers le site web du media.
	 * 				Elle se stock dans les balises XML :
	 * 				<item>
	 * 					<link>URL</link>
	 * 				</item>
	 * 				Si elle est null et que le podcast est en modeInjection à true, l'url sera la même
	 * 				que celle du podcast
	 * @param	string|null		$auteur
	 * 				Auteur du media.
	 * 				Il se stock dans la balise XML :
	 * 				<item>
	 * 					<author>L'AUTEUR</author>
	 * 					<itunes:author>L'AUTEUR</itunes:author>
	 * 				</item>
	 * 				Si il est null et que le podcast est en modeInjection à true, l'auteur sera le même
	 * 				que celui du podcast
	 * @param	string|null		$image
	 * 				URL vers l'image représentant le media.
	 * 				Elle se stock dans les balises et attributs XML :
	 * 				<item>
	 * 					<itunes:image href="URL" />
	 * 				</item>
	 * 				Si elle est null et que le podcast est en modeInjection à true, l'url sera la même
	 * 				que celle du podcast
	 */
	public function __construct($titre, $pubDate, $url, $type, $guid, $duree, $descripton=null, $sousTitre=null, $lien=null, $auteur=null, $image=null)
		{
		$this->titre = $titre;
		$this->pubDate = $pubDate;
		$this->url = $url;
		$this->type = $type;
		$this->guid = $guid;
		$this->duree = $duree;
		$this->description = $descripton;
		$this->sousTitre = $sousTitre;
		$this->lien = $lien;
		$this->auteur = $auteur;
		$this->image = $image;
		}

	/**
	 * @return	DateTime
	 * 				La date de publication du media
	 */
	public function getPubDate()
		{
		return $this->pubDate;
		}
		
	/**
	 * Cette méthode est appelée par la classe Podcast si elle est définie en mode injection
	 *
	 * @param	string|null		$sousTitre
	 * 				Le sous titre du podacst
	 * @param	string|null		$lien
	 * 				L'adresse du site du podcast
	 * @param	string|null		$description
	 * 				Description du podcast
	 * @param	string|null		$auteur
	 * 				Auteur du Podcast
	 * @param	string|null		$image
	 * 				URl de l'image du Podcast
	 */
	public function injecter($sousTitre, $lien, $description, $auteur, $image)
		{
		if ($this->sousTitre == null)
			$this->sousTitre = $sousTitre;

		if ($this->lien == null)
			$this->lien = $lien;

		if ($this->description == null)
			$this->description = $description;

		if ($this->auteur == null)
			$this->auteur = $auteur;

		if ($this->image == null)
			$this->image = $image;
		}

	/**
	 * Ajoute le media dans le document Dom en paramètre
	 *
	 * @param	DOMDocument		$dom
	 * 				Document dom dans lequel il faut ajouter le media
	 */
	public function addToDom($dom)
		{
		// recuperation de <channel>
		$channels = $dom->getElementsByTagName("channel");
		$channel = $channels->item(0);

		// creation de <item>
		$item = $dom->createElement("item");
		$channel->appendChild($item);

		// creation de <title>
		$titre = $dom->createElement("title", $this->titre);//$dom->createElement("title", $this->titre);
		$item->appendChild($titre);

		// creation de <itunes:subtitle>
		if ($this->sousTitre != null)
			{
			$itune_sousTitre = $dom->createElement("itunes:subtitle", $this->sousTitre);
			$item->appendChild($itune_sousTitre);
			}

		// creation de <description>
		$description = $dom->createElement("description");
		$description->appendChild($dom->createCDATASection($this->description));
		$item->appendChild($description);

		// creation de <itunes:summary>
		$itune_summary = $dom->createElement("itunes:summary", $this->description);
		$item->appendChild($itune_summary);

		// creation de <link>
		$lien = $dom->createElement("link", $this->lien);
		$item->appendChild($lien);

		// creation de <pubDate>
		$pubDate = $dom->createElement("pubDate", $this->pubDate->format(DATE_RFC2822));
		$item->appendChild($pubDate);

		// creation de <enclosure>
		$enclosure = $dom->createElement("enclosure");
		$enclosure->setAttribute("url", $this->url);
		$enclosure->setAttribute("type", $this->type);
		$item->appendChild($enclosure);

		// creation de <author>
		$auteur = $dom->createElement("author", $this->auteur);
		$item->appendChild($auteur);

		// creation de <itunes:author>
		$itune_auteur = $dom->createElement("itunes:author", $this->auteur);
		$item->appendChild($itune_auteur);

		// creation de <itunes:duration>
		$itune_duree = $dom->createElement("itunes:duration", $this->duree);
		$item->appendChild($itune_duree);

		// creation de <guid>
		$guid = $dom->createElement("guid", $this->guid);
		$item->appendChild($guid);

		// creation de <itunes:image>
		$itune_image = $dom->createElement("itunes:image");
		$itune_image->setAttribute("href", $this->image);
		$item->appendChild($itune_image);
		}
	}