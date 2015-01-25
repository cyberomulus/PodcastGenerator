# PodcastGenerator

## Qu'est-ce que PodcastGenerator ?  
PodcastGenerator est une librairie PHP qui permet de générer facilement un feed RSS compatible Podcast (dont les tags spécifiques à Itunes).

## Comment installer PodcastGenerator
Il existe 2 manières d'installer PodcastGenerator.

Si vous utiliser [Composer](https://getcomposer.org/), PodcastGenerator est disponible via [Packagist](https://packagist.org).  
Il suffit d'ajouter la dépendances à votre fichier composer.json:  
	
	{
		"require": {
            "cyberomulus/podcast-generator": "1.0"
        }
    }
	
Sinon, rendez-vous sur la page [github de PodcastGenerator](https://github.com/cyberomulus/PodcastGenerator) et choisissez le release de votre choix.  
Vous pourrez ensuite télécharger le code source via le lien 'Download ZIP'.  
Placez le dossier contenu dans le ZIP dans un dossier lib (par exemple) de votre projet.

## De quoi ai-je besoin pour utiliser PodcastGenerator

Il faut la version 5.2.0 minimum de PHP avec l'extension Dom activée (elle est activée par défaut).

## Comment utiliser PodcastGenerator ?

L'utilisation est simple, Il suffit de :

1. Configurer le flux via le constructeur de l'objet `Podcast`.
2. Configurer chaques éléments du podcast via le constructeur de l'objet `Media`.
3. Transmettre la liste des éléments au Podcast via la fonction `Podcast::addMedia()`
4. Récupérer le flux généré via la fonction `Podcast::toString()` ou `Podcast::toDom()`

### 1. Le constructeur de l'objet `Podcast`.

Voici la documentation du constructeur :

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

### 2. Le constructeur de l'objet `Media`.

Voici la documentation du constructeur :

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
	 * 				Sous titre du media.
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

### 3. Le mode injection

Le mode injection permet au podcast d'envoyer ses propres informations à tous ses éléments afin qu'ils prennent les même valeurs.  
Voici les informations qui peuvent être héritées par les éléments d'un podcast:

1. La description
2. Le sous-titre
3. Le lien vers le site web
4. L'autheur
5. L'image

Ces valeurs seront héritées du podcast dans le cas où ces 2 conditions sont requises :

- L'attribut `$modeInjection` du constructeur de `Podcast` est à `true`
- La valeur dans l'élément est définie à `null`

## Exemple d'utilisation

	<?php
	// ne pas oubliez d'importer les classes
	require 'lib/Podcast.php';
	require 'lib/Media.php';
	use Cyberomulus\PodcastGenerator\Podcast;
	use Cyberomulus\PodcastGenerator\Media;
	
	// creation du podcast
	$podcast = new Podcast(
			"Un titre pour mon Podcast",
			"Une description pour mon Podcast",
			"http://www.monsite.com",
			"http://www.monsite.com/img/podcast.jpg",
			"Mon nom",
			"music",
			"Un sous-titre pour mon Podcast",
			null, // je ne souhaite pas spécifier de langue
			null, // je ne souhaite pas spécifier d'adresse mail
			null, // je ne souhaite pas spécifier de copyright
			null, // je n'ai pas encore de média à y ajouter 
			true  // j'active le mode injection
			);
	
	// nous allons mettre les médias dans un tableau
	// ce n'est pas obligatoire mais utile lorsque l'on transmet les média au podcast
	$medias = array();
	
	// création du 1er media
	$medias[] = new Media(
			"Emission du 23/01/15", 
			new DateTime("2015-01-23"), 
			"http://www.monsite.com/media/fichier1.mp3", 
			"audio/mpeg", 
			"un_guid_unique_sur_tout_internet", 
			"15:05",
			"Une description spécifique pour ce média",
			null, // je ne souhaite pas spécifier de sous-titre spécifique au média
			null, // je ne souhaite pas spécifier de lien spécifique au média
			null, // je ne souhaite pas spécifier d'autheur spécifique au média
			null // je ne souhaite pas spécifier d'image spécifique au média
			);
	
	// creation du 2eme media
	$medias[] = new Media(
			"Emission du 24/01/15",
			new DateTime("2015-01-24"),
			"http://www.monsite.com/media/fichier2.mp3",
			"audio/mpeg",
			"un_autre_guid_unique_sur_tout_internet",
			"1:01:48",
			null, // je ne souhaite pas spécifier de description spécifique au média
			"Un ami vient me rendre visite au studio d'enregistrement",
			null, // je ne souhaite pas spécifier de lien spécifique au média
			"Mon nom + Nom de mon ami",
			null // je ne souhaite pas spécifier d'image spécifique au média
			);
	
	// transmet les médias au podcast
	// je peut transmetre un tableau de media (un merge sera fait) 
	// mlais egalement un objet Media uniquement (sera ajouté à la liste)
	$podcast->addMedia($medias);
	
	// pour afficher le document XML
	header ("Content-Type:text/xml");
	echo $podcast->toString();
	
	// mais il est possible de récupérer le document DOM pour le modifier
	$dom = $podcast->toDom();
	?>

Voici le résultat :

	<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0">
		<channel>
			<title>Un titre pour mon Podcast</title>
			<itunes:subtitle>Un sous-titre pour mon Podcast</itunes:subtitle>
			<link>http://www.monsite.com</link>
			<description>
			<![CDATA[ Une description pour mon Podcast ]]>
			</description>
			<itunes:summary>Une description pour mon Podcast</itunes:summary>
			<image>
			<title>Un titre pour mon Podcast</title>
			<link>http://www.monsite.com</link>
			<url>http://www.monsite.com/img/podcast.jpg</url>
			</image>
			<itunes:image href="http://www.monsite.com/img/podcast.jpg"/>
			<itunes:author>Mon nom</itunes:author>
			<itunes:owner>
			<itunes:name>Mon nom</itunes:name>
			</itunes:owner>
			<itunes:category>music</itunes:category>
			<item>
				<title>Emission du 23/01/15</title>
				<itunes:subtitle>Un sous-titre pour mon Podcast</itunes:subtitle>
				<description>
				<![CDATA[ Une description spécifique pour ce média ]]>
				</description>
				<itunes:summary>Une description spécifique pour ce média</itunes:summary>
				<link>http://www.monsite.com</link>
				<pubDate>Fri, 23 Jan 2015 00:00:00 +0100</pubDate>
				<enclosure url="http://www.monsite.com/media/fichier1.mp3" type="audio/mpeg"/>
				<author>Mon nom</author>
				<itunes:author>Mon nom</itunes:author>
				<itunes:duration>15:05</itunes:duration>
				<guid>un_guid_unique_sur_tout_internet</guid>
				<itunes:image href="http://www.monsite.com/img/podcast.jpg"/>
			</item>
			<item>
				<title>Emission du 24/01/15</title>
				<itunes:subtitle>
				Un ami vient me rendre visite au studio d'enregistrement
				</itunes:subtitle>
				<description>
				<![CDATA[ Une description pour mon Podcast ]]>
				</description>
				<itunes:summary>Une description pour mon Podcast</itunes:summary>
				<link>http://www.monsite.com</link>
				<pubDate>Sat, 24 Jan 2015 00:00:00 +0100</pubDate>
				<enclosure url="http://www.monsite.com/media/fichier2.mp3" type="audio/mpeg"/>
				<author>Mon nom + Nom de mon ami</author>
				<itunes:author>Mon nom + Nom de mon ami</itunes:author>
				<itunes:duration>1:01:48</itunes:duration>
				<guid>un_autre_guid_unique_sur_tout_internet</guid>
				<itunes:image href="http://www.monsite.com/img/podcast.jpg"/>
			</item>
			<pubDate>Sat, 24 Jan 2015 00:00:00 +0100</pubDate>
		</channel>
	</rss>

## Sous quelle licence est PodcastGEnerator
PodcastGenerator est sous licence MIT (licence libre).  
Vous trouverez le texte de la licence dans le fichier LICENSE.