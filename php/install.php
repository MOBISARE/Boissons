<!-- install.php
Fichier permettant d'installer la Base de Données.
-->

<!DOCTYPE html>
<html>
    <head>
        <title>Base de données</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
            include "Donnees.inc.php";
            define('DB_NAME', 'coming_soon');
            $username = 'root';
            $password = '';
            $db = 'Boisson';

            // Crétaion de la requête sql
            $sql = "CREATE DATABASE IF NOT EXISTS $db;
            ALTERT DATABASE $db DEFAUT CHARACTER SET utf8 COLLATE utf8 general_ci;
            USE $db;
            CREATE TABLE Utilisateur(
                nom VARCHAR(100) DEFAULT NULL,
                prenom VARCHAR(100) DEFAULT NULL,
                login VARCHAR(100) NOT NULL,
                mdp CHAR(40) NOT NULL,
                sexe VARCHAR(1) DEFAULT NULL,
                adresse VARCHAR(100) DEFAULT NULL,
                postal INT(5) DEFAULT NULL,
                ville VARCHAR(100) DEFAULT NULL,
                telephone CHAR(10) DEFAULT NULL,
                PRIMARY KEY(login)
                );

            CREATE TABLE Recettes(
                nomRecette VARCHAR(100),
                PRIMARY KEY(nomRecette)
            );

            CREATE TABLE Ingredients(
                nomIngredient VARCHAR(100),
                PRIMARY_KEY(nomIngredient)
            );

            CREATE TABLE Liaisons(
                nomIngredient VARCHAR(100),
                nomRecette VARCHAR(100),
                PRIMARY KEY(nomIngredient, nomRecette),
                CONSTRAINT FK_LiaisonIngredient, FOREIGN KEY(nomIngredient) PREFERENCES Ingredients(nomIngredient),
                CONSTRAINT FK_LiaisonRecette, FOREIGN KEY(nomRecette) PREFERENCES Recettes(nomRecette)
            );

            CREATE TABLE SuperCategorie(
                nom VARCHAR(100),
                nomSuper VARCHAR(100),
                PRIMARY KEY(nom, nomSuper),
                CONSTRAINT FK_SuperCategorieNomCategorie FOREIGN KEY(nom) REFERENCES Ingredient(nomIngredient),
                CONSTRAINT FK_SuperCategorieNomSuperCategorie FOREIGN KEY (nomSuper) REFERENCES Recettes(nomRecette)
            );

            CREATE TABLE Panier(
                utilisateur VARCHAR(100),
                nomRecette VARCHAR(100),
                PRIMARY KEY (utilisateur, nomRecette),
                CONSTRAINT FK_PanierUtilisateur FOREIGN KEY (utilisateur) REFERENCES Utilisateurs(login),
                CONSTRAINT FK_PanierRecette FOREIGN KEY (nomRecette) REFERENCES Recettes(nomRecette)
            )";

            try
            {
                $bdd = new PDO('mysql:host=localhost;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
            foreach(explode(';', $sql) as $requete)
            {
                    $bdd->exec($requete);
            }

            //AJOUT DES DONNEES DANS Recettes
            foreach ($Recettes as &$Cocktail) {
                $nomRecette = $Cocktail['titre'];
                $data = [
                    'nomRecette' => $nomRecette,
                ];
                $sql = "INSERT INTO Recettes(nomRecette) VALUES (:nomRecette)";
                $bdd->prepare($sql)->execute($data);
            }

            // Remplissage de la Table Recettes
            ///$stmt = $bdd->prepare("INSERT INTO Recettes(nomRecette, ingredients, preparation) VALUES (:nomRecette, :ingredients, :preparation);");
            //$stmt->bindParam(':nomRecette', $nomRecette);
            //$stmt->bindParam(':ingredients', $ingredients);
            //$stmt->bindParam(':preparation', $preparation);

            //foreach($Recettes as $titre)
            //{
            //   $nomRecette = array_values($titre)[0];
            //   $ingredients = array_values($titre)[1];
            //   $preparation = array_values($titre)[2];
            //   $stmt->execute($titre);
            //}
        ?>
    </body>
</html>