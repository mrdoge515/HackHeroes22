<?php
    // Server info
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hackheroes";

    // Function that bring console.log to php
    function consoleLog($message) {
        print (
            '<script>' .
            'console.log("' . $message . '")' .
            '</script>'
        );
    }

    // Function that allows to easily connect to the database
    function connectToDB($servername, $username, $password, $database) {
        $connection = new mysqli($servername, $username, $password, $database);
        if($connection -> connect_error) {
            die(
                '<script>' .
                'console.log("[!] Database connection failed: ' . $connection -> connect_error . '")' .
                '</script>'
            );
        }

        return $connection;
    }

    function checkCookies($cookieName) {
        if($_COOKIE[$cookieName] == null) {
            setcookie($cookieName, 1, time() + (86400 * 30), "/");
        }
    }
?>