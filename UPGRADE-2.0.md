# Upgrade from v1.x to v2.0

## Methods renamed

All methods are renamed, here is the list of public methods renamed :

| v1.x                                                                | v2.0
| ------------------------------------------------------------------- | ----------------------------------------------------------------
| `Media::injecter($sousTitre, $lien, $description, $auteur, $image)` | `Media::inject($subtitle, $link, $description, $author, $image)`

Old methods will be removed on version 3.0