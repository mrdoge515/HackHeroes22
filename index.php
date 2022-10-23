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
        <!--<link rel="stylesheet" href="css/normalize.css"/>-->
        <link rel="stylesheet" href="css/test.css"/>
        <link rel="stylesheet" href="css/modal.css"/>

        <!-- Scripts -->
        <script src="./js/district.js"></script>
        
    </head>
    <body>
        <!--
            Connecting to the database with PHP
        -->
        <?php
            // Including file with functions and variables
            include('./php/config.php');

            // Using function to connect to the database and handling errors
            $connection = connectToDB($servername, $username, $password, $database);

            checkCookies("district");
        ?>

        <!--
            Main navbar
        -->
        <header>
            <div id="plus-button">
                <a data-modal-target="#modal"><img src="./img/black_plus_mini.png"></a>
            </div>
        </header>



            <div class="dropdown">
                <button onclick="showDropdown()" class="dropbtn">Wybierz dzielnicę</button>
                <div id="myDropdown" class="dropdown-content">
                    <input type="text" placeholder="Wyszukaj.." id="myInput" onkeyup="searchDropdown()">
                    <!-- 
                        Retreving districts from the database to use them as buttons in dropdown menu
                    -->
                    <?php
                        // Making SQL query to read districts from the database
                        $dropdownQuery = "SELECT * FROM districts";
                        $dropdownResult = $connection -> query($dropdownQuery);

                        // Reading database content
                        if($dropdownResult -> num_rows > 0) {
                            while($dropRow = $dropdownResult -> fetch_assoc()) {
                                echo "<a href='' onclick='changeDistrict(".
                                $dropRow["districtID"] .
                                ")'>" .
                                $dropRow["districtName"] .
                                "</a>";
                            }
                            consoleLog("[i] Pomyślnie odczytano dzielnice");
                        } else {
                            consoleLog("[!] Nie ma żadnych dzielnic do odczytania");
                        }
                    ?>
                </div>
                Wybrana dzielnica : 
                <?php
                    echo $_COOKIE["district"];
                ?>
            </div>



        <!--Tworzenie przycisku wyświetlającego małe okienko z formularzem-->
        <div class="modal" id="modal">
            <div id="modal-header">
                <div id="title">Napisz tu swój post!</div>
                <button data-close-button id="close-button">&times;</button>
            </div>

            <div id="modal-body">
                
                <form action="./php/createPost.php" method="post" id="postCreator">
                    <label for="postUsername">Nazwa użytkownika</label>
                    <input type="text" id="postUsername" name="postUsername"/> <br/><br/>

                    <label for="postContent">Tresc</label>
                    <input type="text" id="postContent" name="postContent"/> <br/><br/>

                    <input id="xd" type="submit" value="Wyślij"/><br/>
                </form>

            </div>
        </div>


        <div id="postsContainer">
            <!--
                Retreving posts from the database and displaying them
            -->
            <?php
                // Getting selected district from cookies
                $district = $_COOKIE['district'];

                // Making SQL query to read posts from the database
                $postsQuery = "SELECT username, postContent FROM posts WHERE districtID = $district";
                $postsResult = $connection -> query($postsQuery);

                // Reading database content
                if($postsResult -> num_rows > 0) {
                    while($postRow = $postsResult -> fetch_assoc()) {
                        echo "<p class='post'>" .
                        "Autor: " . 
                        $postRow["username"] . 
                        "<br/>" .
                        $postRow["postContent"] .
                        "</p>";
                    }
                    consoleLog("[i] Pomyślnie odczytano posty");
                } else {
                    consoleLog("[!] Nie ma żadnych postów do odczytania");
                }
            ?>
        </div>

        <a href="https://www.flaticon.com/free-icons/neighbourhood-watch" title="neighbourhood watch icons" id="iconAttribution">Neighbourhood watch icons created by AmazingDesign - Flaticon</a>

        <!--
            Closing connection to the database
        -->
        <?php
            $connection -> close();
        ?>
        
        <div id="overlay"></div>

        <script src="./js/modal.js"></script>
    </body>
</html>