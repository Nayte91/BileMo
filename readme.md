#Project n°7 : BileMo

##Lancement du projet avec Docker

1. Lancer les containers en tapant `docker-compose up --build -d` à la racine du projet
2. Télécharger les dépendances avec `docker-compose exec backend composer install`
3. Créer la base de données avec `docker-compose exec backend bin/console doctrine:database:create`
4. Fabriquer la structure avec `docker-compose exec backend bin/console doctrine:schema:create` 
5. charger les data avec `docker-compose exec backend bin/console doctrine:fixtures:load`
6. Accéder à l'application par http://localhost/ (qui redirige vers /docs)

##Lancement du project sans Docker

1. Télécharger les dépendances avec `composer install`
2. Lancer le serveur PHP avec `php -S 127.0.0.1 -t public/` ou `symfony serve -d`
3. Créer la base de données avec `bin/console doctrine:database:create`
4. Fabriquer la structure avec `bin/console doctrine:schema:create`
5. charger les data avec `bin/console doctrine:fixtures:load`
6. Accéder à l'application par http://localhost/docs