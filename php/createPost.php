<?php
    if($_POST == null) {
        $userID = -1;
        $username = "";
        $postContent = "";
    } else {
        // !!! userID do zmiany
        $userID = 1;
        $postUsername = $_POST["postUsername"];
        $postContent = $_POST["postContent"];
    }

    // Server info
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hackheroes";

    // Trying to connect to the database and handling errors
    $connection = new mysqli($servername, $username, $password, $database);
    if($connection -> connect_error) {
        die(
            '<script>' .
            'console.log("[!] Database connection failed: ' . $connection -> connect_error . '")' .
            '</script>'
        );
    }

    // Making SQL query to add a post to database
    $sqlQuery = "INSERT INTO posts (userID, username, postContent) VALUES ('$userID', '$postUsername', '$postContent')";
    
    // Trying to execute SQL query
    if($connection -> query($sqlQuery) === TRUE) {
        echo "git";
    } else {
        echo "nie git".$connection -> error;
    }

    // Redirecting back to main site
    header('Location: ../index.html');
?>