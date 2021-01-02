Comment installer et vérifier ?

1. Avoir docker et docker-compose d'installé sur son poste,
2. Lancer les containers en tapant `docker-compose up --build -d` à la racine du projet,
3. générer les clefs de signature avec `./jwt-create.sh` à la racine,
4. charger les data avec `docker-compose exec php bin/console doctrine:fixtures:load`
5. Accéder à l'application par https://localhost/
6. La documentation d'API se trouve sur https://localhost/docs 
