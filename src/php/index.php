<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
            //include "Donnees.inc.php";
            include "install.php";

            $dsn = 'mysql:host=localhost;dbname=Boisson;charset=utf8';
            $user = 'root';
            $password = '';

            /*$connection = mysql_connect($dsn, $user, $password);
            //Check if we are connected.
            if($connection === false){
                echo 'Failed to connect!';
            } else{
                echo 'We are connected!';
            }*/

            $dbh = new PDO($dsn, $user, $password);

            $sql = "SHOW TABLES";

            //Prepare our SQL statement,
            $statement = $dbh->prepare($sql);

            //Execute the statement.
            $statement->execute();

            //Fetch the rows from our statement.
            $tables = $statement->fetchAll(PDO::FETCH_NUM);

            //Loop through our table names.
            foreach($tables as $table){
                //Print the table name out onto the page.
                echo $table[0], '<br>';
            }

            $sth = $dbh->prepare("SELECT * FROM Recettes");
            $sth->execute();
            $result = $sth->fetchAll();
            foreach($result as $res){
                echo "Titre : ".$res[0]."<br>";
            }

            /*
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
            */
        ?>
    </body>
</html>