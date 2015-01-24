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
 * Cette classe représente un podcast
 * 
 * @author cyberomulus - Brack Romain <romuluslepunk@gmail.com>
 */
class Podcast
	{
	/**
	 * Définit si il faut injecter des infos aux média
	 * 
	 * @var boolean
	 */
	private $modeInjection;
	
	/**
	 * Titre général du podcast.
	 * Il se stock dans les balises XML :
	 * <rss>
	 * 		<channel>
	 * 			<title>LE TITRE</title>
	 * 			<image>
	 * 				<title>LE TITRE</title>
	 * 			</image>
	 * 		<channel>
	 * </rss>
	 * 
	 * @var string
	 */
	private $titre;
	
	/**
	 * Sous titre général du podcast.
	 * Il se stock dans la balise XML :
	 * <rss>
	 * 		<channel>
	 * 			<itunes:subtitle>LE SOUS TITRE</itunes:subtitle>
	 * 		<channel>
	 * </rss>
	 *
	 * @var string|null
	 */
	private $sousTitre;
	
	/**
	 * Description du podcast.
	 * Elle se stock dans les balises XML :
	 * <rss>
	 * 		<channel>
	 * 			<description>LA DESCRIPTION</description>
	 * 			<itunes:summary>LA DESCRIPTION</itunes:summary>
	 * 		<channel>
	 * </rss>
	 * 
	 * @var string
	 */
	private $description;
	
	/**
	 * URL vers le site web du podcast.
	 * Elle se stock dans les balises XML :
	 * <rss>
	 * 		<channel>
	 * 			<link>URL</link>
	 * 			<image>
	 * 				<link>URL</link>
	 * 			</image>
	 * 		<channel>
	 * </rss>
	 *
	 * @var string
	 */
	private $lien;
	
	/**
	 * URL vers l'image représentant le podcast.
	 * Elle se stock dans les balises et attributs XML :
	 * <rss>
	 * 		<channel>
	 * 			<image>
	 * 				<url>URL</url>
	 * 			</image>
	 * 			<itunes:image href="URL" />
	 * 		<channel>
	 * </rss>
	 * 
	 * @var string
	 */
	private $image;
	
	/**
	 * Auteur du podcast.
	 * Il se stock dans la balise XML :
	 * <rss>
	 * 		<channel>
	 * 			<itunes:author>L'AUTEUR</itunes:author>
	 * 			<itunes:owner>
	 * 				<itunes:name>L'AUTEUR</itunes:name>
	 * 			</itunes:owner>
	 * 		<channel>
	 * </rss>
	 *
	 * @var string
	 */
	private $auteur;
	
	/**
	 * Catégorie du podcast.
	 * Il se stock dans la balise XML :
	 * <rss>
	 * 		<channel>
	 * 			<itunes:category>LA CATEGORIE</itunes:category>
	 * 		<channel>
	 * </rss>
	 *
	 * @var string|null
	 */
	private $categorie;
	
	/**
	 * Langue du podcast.
	 * Elle se stock dans la balise XML :
	 * <rss>
	 * 		<channel>
	 * 			<language>LA LANGUE</language>
	 * 		<channel>
	 * </rss>
	 *
	 * @var string|null
	 */
	private $langue;
	
	/**
	 * Date de la dernière publication du podcast.
	 * Elle est définie juste avant la génération en parcourant la liste d'item.
	 * Elle se stock dans la balise XML :
	 * <rss>
	 * 		<channel>
	 * 			<pubDate>LA DATE</pubDate>
	 * 		<channel>
	 * </rss>
	 *
	 * @var DateTime
	 */
	private $pubDate;
	
	/**
	 * Adresse email du propriétaire du podcast.
	 * Elle se stock dans la balise XML :
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
	 * Copyright du podcast.
	 * Elle se stock dans la balise XML :
	 * <rss>
	 * 		<channel>
	 * 			<copyright>LA COPYRIGHT</copyright>
	 * 		<channel>
	 * </rss>
	 *
	 * @var string|null
	 */
	private $copyright;
	
	/**
	 * Liste des medias du podcast 
	 * 
	 * @var array
	 */
	private $medias;
	
	/**
	 * Création d'un podcast.
	 * 
	 * @param	string	$titre
	 * 				Titre général du podcast.
	 * 				Il se stock dans les balises XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<title>LE TITRE</title>
	 * 						<image>
	 * 							<title>LE TITRE</title>
	 * 						</image>
	 * 					<channel>
	 * 				</rss>
	 * @param	string	$description
	 * 				Description du podcast.
	 * 				Elle se stock dans les balises XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<description>LA DESCRIPTION</description>
	 * 						<itunes:summary>LA DESCRIPTION</itunes:summary>
	 * 					<channel>
	 * 				</rss>
	 * @param	string	$lien
	 * 				URL vers le site web du podcast.
	 * 				Elle se stock dans les balises XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<link>URL</link>
	 * 						<image>
	 * 							<link>URL</link>
	 * 						</image>
	 * 					<channel>
	 * 				</rss>
	 * @param	string	$image
	 * 				URL vers l'image représentant le podcast.
	 * 				Elle se stock dans les balises et attributs XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<image>
	 * 							<url>URL</url>
	 * 						</image>
	 * 						<itunes:image href="URL" />
	 * 					<channel>
	 * 				</rss>
	 * @param	string	$auteur
	 * 				Auteur du podcast.
	 * 				Il se stock dans la balise XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<itunes:author>L'AUTEUR</itunes:author>
	 * 						<itunes:owner>
	 * 							<itunes:name>L'AUTEUR</itunes:name>
	 * 						</itunes:owner>
	 * 					<channel>
	 * 				</rss>
	 * @param 	string|null		$categorie
	 * 				Catégorie du podcast.
	 * 				Il se stock dans la balise XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<itunes:category>LA CATEGORIE</itunes:category>
	 * 					<channel>
	 * 				</rss>
	 * 				Pour ne pas afficher cette balise, mettre null (valeur par défaut)
	 * @param 	string|null		$sousTitre
	 * 				Sous titre général du podcast.
	 * 				Il se stock dans la balise XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<itunes:subtitle>LE SOUS TITRE</itunes:subtitle>
	 * 					<channel>
	 * 				</rss>
	 * 				Pour ne pas afficher cette balise, mettre null  (valeur par défaut)
	 * @param 	string|null		$langue
	 * 				Langue du podcast.
	 * 				Elle se stock dans la balise XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<language>LA LANGUE</language>
	 * 					<channel>
	 * 				</rss>
	 * 				Pour ne pas afficher cette balise, mettre null  (valeur par défaut)
	 * @param 	string|null		$email
	 * 				Adresse email du propriétaire du podcast.
	 * 				Elle se stock dans la balise XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<itunes:owner>
	 * 							<itunes:email>EMAIL</itunes:email>
	 * 						</itunes:owner>
	 * 					<channel>
	 * 				</rss>
	 * 				Pour ne pas afficher cette balise, mettre null  (valeur par défaut)
	 * @param	string|null		$copyright
	 * 				Copyright du podcast.
	 * 				Elle se stock dans la balise XML :
	 * 				<rss>
	 * 					<channel>
	 * 						<copyright>LA COPYRIGHT</copyright>
	 * 					<channel>
	 * 				</rss>
	 * 				Pour ne pas afficher cette balise, mettre null  (valeur par défaut)
	 * @param 	array 	$medias
	 * 				Liste des medias du podcast.
	 * 				Mettre null pour ajouter les médias par la suite
	 * @param 	boolean	$modeInjection
	 * 				Si true, les éléments suivant seront transmis à tous les médias afin qu'il prennent les 
	 * 				même valeurs que le podcast (ne fait effet que si l'élément est null dans le media:
	 * 					- le sous titre
	 * 					- URL vers le site web
	 * 					- la description
	 * 					- l'auteur
	 * 					- l'image
	 */
	public function __construct($titre, $description, $lien, $image, $auteur, $categorie=null, $sousTitre=null, $langue=null, $email=null, $copyright=null, $medias=null, $modeInjection=true)
		{
		$this->modeInjection = $modeInjection;
		$this->titre = $titre;
		$this->description = $description;
		$this->lien = $lien;
		$this->image = $image;
		$this->auteur = $auteur;
		$this->categorie = $categorie;
		$this->sousTitre = $sousTitre;
		$this->langue = $langue;
		$this->email = $email;
		$this->copyright = $copyright;
		
		if ($medias == null)
			$this->medias = array();
		else
			$this->medias = $medias;
		}
	
	/**
	 * Ajoute un ou plusieurs Media au podcast
	 * 
	 * @param	Media|Media[]	$media
	 * 				Medié(s) à ajouter au podcast
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
	 * Retourne le podcast généré sous forme de chaines de caractère
	 * 
	 * @return	string
	 * 				Le podcast généré
	 */
	public function toString()
		{		
		return $this->genere()->saveXML();
		}
	
	/**
	 * Retourne le podcast généré sous forme de document DOM
	 * 
	 * @return	DOMDocument
	 */
	public function toDom()
		{
		return $this->genere();
		}
	
	/**
	 * Génère le document DOM
	 * 
	 * @return DOMDocument
	 */
	private function genere()
		{
		// creation du dom
		$dom = new \DOMDocument("1.0", "utf-8");

		// creation de <rss>
		$rss = $dom->createElement("rss");
		$rss->setAttribute("xmlns:itunes", "http://www.itunes.com/dtds/podcast-1.0.dtd");
		$rss->setAttribute("version", "2.0");
		$dom->appendChild($rss);
		
		// creation de <channel>
		$channel = $dom->createElement("channel");
		$rss->appendChild($channel);
		
		// creation de <title>
		$titre = $dom->createElement("title", $this->titre);
		$channel->appendChild($titre);
		
		// creation de <itunes:subtitle>
		if ($this->sousTitre != null)
			{
			$itune_sousTitre = $dom->createElement("itunes:subtitle", $this->sousTitre);
			$channel->appendChild($itune_sousTitre);
			}
		
		// creation de <link>
		$lien = $dom->createElement("link", $this->lien);
		$channel->appendChild($lien);
		
		// creation de <description>
		$description = $dom->createElement("description");
		$description->appendChild($dom->createCDATASection($this->description));
		$channel->appendChild($description);
		
		// creation de <itunes:summary>
		$itune_summary = $dom->createElement("itunes:summary", $this->description);
		$channel->appendChild($itune_summary);
		
		// creation de <image>
		$image = $dom->createElement("image");
		$image->appendChild($titre->cloneNode(true));
		$image->appendChild($lien->cloneNode(true));
		$channel->appendChild($image);
		$image_url = $dom->createElement("url", $this->image);
		$image->appendChild($image_url);
		
		// creation de <itunes:image>
		$itune_image = $dom->createElement("itunes:image");
		$itune_image->setAttribute("href", $this->image);
		$channel->appendChild($itune_image);
		
		// creation de <itunes:author>
		$itune_auteur = $dom->createElement("itunes:author", $this->auteur);
		$channel->appendChild($itune_auteur);
		
		// creation de <itunes:owner>
		$itune_owner = $dom->createElement("itunes:owner");
		$itune_owner_name = $dom->createElement("itunes:name", $this->auteur);
		$itune_owner->appendChild($itune_owner_name);
		if ($this->email != null)
			{
			$itune_owner_email = $dom->createElement("itunes:email", $this->email);
			$itune_owner->appendChild($itune_owner_email);
			}
		$channel->appendChild($itune_owner);
		
		// creation de <itunes:category>
		if ($this->categorie != null)
			{
			$categorie = $dom->createElement("itunes:category", $this->categorie);
			$channel->appendChild($categorie);
			}
		
		// creation de <language>
		if ($this->langue != null)
			{
			$langue = $dom->createElement("language", $this->langue);
			$channel->appendChild($langue);
			}
		
		// creation de <copyright>
		if ($this->copyright != null)
			{
			$copyright = $dom->createElement("copyright", $this->copyright);
			$channel->appendChild($copyright);
			}
		
		// creation des <items>
		foreach ($this->medias as $media)
			{
			if ($this->modeInjection == true)
				$media->injecter($this->sousTitre, $this->lien, $this->description, $this->auteur, $this->image);

			// ajout du media dans le dom
			$media->addToDom($dom);
			
			// récupère la date la plus récente des media pour <pubDate>
			if ($this->pubDate == null)
				$this->pubDate = $media->getPubDate();
			else if ($this->pubDate < $media->getPubDate())
				$this->pubDate = $media->getPubDate();
			}
		
		// creation de <pubDate>
		if ($this->pubDate == null)
			$this->pubDate = new \DateTime();
		$pubDate = $dom->createElement("pubDate", $this->pubDate->format(DATE_RFC2822));
		$channel->appendChild($pubDate);
		
		// retourne le document Dom
		return $dom;
		}
	}