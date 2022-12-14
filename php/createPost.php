<?php
    // Including file with functions and variables
    include('config.php');

    if($_POST == null) {
        $userID = -1;
        $username = "";
        $postContent = "";
        $districtID = -1;
    } else {
        // !!! userID do zmiany
        $userID = 1;
        $postUsername = $_POST["postUsername"];
        $postContent = $_POST["postContent"];
        $districtID = $_COOKIE["district"];
    }

    // Using function to connect to the database and handling errors
    $connection = connectToDB($servername, $username, $password, $database);

    // Making SQL query to add a post to the database
    $sqlQuery = "INSERT INTO posts (userID, username, postContent, districtID) VALUES ('$userID', '$postUsername', '$postContent', $districtID)";
    
    // Trying to execute SQL query
    if($connection -> query($sqlQuery) === TRUE) {
        consoleLog("[i] Pomyślnie przesłano dane na serwer");
    } else {
        consoleLog("[!] Wystąpił błąd podczas przesyłania informacji na serwer: " . $connection -> error);
    }

    // Closing connection to the database
    $connection -> close();

    // Redirecting back to main site
    echo "<script>window.location = '../index.php'</script>";
?>