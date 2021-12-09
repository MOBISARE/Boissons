Quelques notes de mises en formes du projet :

Répertoire src
// Mise en forme d'une architecture MVC
    - Model
        . Entity
            -> Food.php
            -> Ingredient.php
            -> Recipe.php

        .Repository
            // DAO = Data Access Objects
            // Classes qui gèrent les requêtes SQL
            -> FoodDAO.php
            -> IngredientDAO.php
            -> RecipeDAO.php
    
    - View
        . Page
            -> food.php
            -> home.php
            -> notFound.php

        . Template
            -> footer.php
            -> header.php
            -> navigation.php

    - Controller
        -> FoodController.php
        -> Router.php

    - Util
        -> Autoloader.php
        -> Database.php
        -> Donnees.inc.php
        -> Populate.php

Répertoire public

    -images
    -scripts
    -styles
    -webfonts
    -favicon.ico
    -index.php

Répertoire resources
    - data
        . drink.db
    - sql
        . create-table-drink.sql
        . drop-table-drink.sql

Main.php