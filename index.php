<!DOCTYPE html>
<html lang="pl" dir="ltr">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <meta name="author" content=""/>
        <meta name="description" content="MojeOsiedle pozwala komunikować się z sąsiadami z twojego osiedla, organizować zbiórki oraz inicjatywy społeczne.">
        
        <!-- Title -->
        <title>MojeOsiedle</title>

        <!-- Icon -->
        <link rel="icon" type="image/png" href="favico.png">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/normalize.css"/>

        <!-- Scripts -->
        <script src="./js/district.js"></script>
    </head>
    <body>
        <button onclick="changeDistrict(1)">Dzielnica 1</button>
        <button onclick="changeDistrict(2)">Dzielnica 2</button>
        <form action="php/createPost.php" method="post" id="postCreator">
            <label for="postUsername">Nazwa użytkownika</label>
            <input type="text" id="postUsername" name="postUsername"/> <br/>
            <label for="postContent">Tresc</label>
            <input type="text" id="postContent" name="postContent"/> <br/>
            <input type="submit" value="Wyślij"/>
        </form>
        <a href="https://www.flaticon.com/free-icons/neighbourhood-watch" title="neighbourhood watch icons" id="iconAttribution">Neighbourhood watch icons created by AmazingDesign - Flaticon</a>
        <div id="postsContainer">
            <!--
                PHP
            -->
            <?php
                // Including file with functions and variables
                include('php/config.php');
                
                // Using function to connect to the database and handling errors
                $connection = connectToDB($servername, $username, $password, $database);

                $district = $_COOKIE['district'];
                // Making SQL query to read posts from the database
                $sqlQuery = "SELECT username, postContent FROM posts WHERE districtID = $district";
                $result = $connection -> query($sqlQuery);

                // Reading database content
                if($result -> num_rows > 0) {
                    while($row = $result -> fetch_assoc()) {
                        echo "<p class='post'>" .
                        "Autor: " . $row["username"] . "<br/>" .
                        $row["postContent"] .
                        "</p>";
                    }
                    consoleLog("[i] Pomyślnie odczytano posty");
                } else {
                    consoleLog("[!] Nie ma żadnych postów do odczytania");
                }

                // Closing connection to the database
                $connection -> close();
            ?>
        </div>
    </body>
</html>

