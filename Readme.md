# mouloud karrab

Site pour clinique dentaire permettant à un patient de choisir une intervention et envoyer un devis en ligne 

## Environnement de développement

### Pré-requis
 . PHP 7.3
 . Composer
 . Symfony CLI
 . Docker
 . Docker-compose

 vous pouvez vérifier les pré-requis (sauf Docker et Docker compose) avec la commande suivante( de la CLI Symfony) :
 ---
 bash
 symfony check:requirements
 ----

 ### Lancer l'environnement de développement 

 ---
 bash
 docker-compose up -d
 symfony serve -d
 ---
 