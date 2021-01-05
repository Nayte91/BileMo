Comment installer et vérifier ?

1. Avoir docker (et docker-compose) sur son poste,
2. Télécharger les dépendances avec `composer install`
3. Lancer les containers en tapant `docker-compose up --build -d` à la racine du projet,
4. générer les clefs de signature avec `./jwt-create.sh` à la racine,
5. Créer la base de données avec `bin/console doctrine:database:create`
6. Fabriquer la structure avec `bin/console doctrine:schema:create` 
7. charger les data avec `bin/console doctrine:fixtures:load`
8. Accéder à l'application par http://localhost/docs ou http://localhost/ (qui redirigera si vous utilisez docker)
