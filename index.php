<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
            include "src/php/Donnees.inc.php";
            foreach ($Recettes as &$Cocktail) {
                echo "Titre : ".$Cocktail['titre'];
                echo "<br>";
                echo "Ingrédients :<ul>";
                preg_match_all('/[^|]+/',$Cocktail['ingredients'],$resultat_ingredients);
                foreach ($resultat_ingredients[0] as &$ingre){
                    echo "<li>".$ingre."</li>";
                }
                echo "</ul>";
                echo "<br>";
                echo $Cocktail['preparation'];
                echo "<br>";
                foreach ($Cocktail['index'] as &$Index){
                    echo $Index;
                    echo "<br>";
                }
                $image = str_replace(" ", "_",'Photos/'.$Cocktail['titre'].".jpg");
                if (file_exists($image)) {
                    echo '<img src='.$image.' alt='.$Cocktail['titre'].' width="100" height="auto"/>';
                }
                echo "<br>";
                echo "<br>";
            }
        ?>
    </body>
</html>