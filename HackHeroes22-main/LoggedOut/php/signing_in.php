<?php
    include("../../php/config.php");

    if($_POST == null) {
        $user_name = "";
        $user_email = "";
        $user_password = "";
    } else {
        $user_name = $_POST["nick"];
        $user_email = $_POST["mail"];
        $user_password = $_POST["pass"];
    }

    $connection = connectToDB($servername, $username, $password, $database);

    $sql1 = "SELECT user_name FROM users WHERE user_name = '$user_name'";
    $sql2 = "SELECT user_email FROM users WHERE user_email = '$user_email'";

    $result1 = mysqli_query($connection, $sql1);
    $result2 = mysqli_query($connection, $sql2);

    if(mysqli_num_rows($result1) >= 1 || mysqli_num_rows($result2) >= 1){
        consoleLog("[i] Wystapił błąd!");
        header('Location: ../sign_in/sign_in.php');
    }else{
        $sqlQuery = "INSERT INTO users (user_name, user_email, user_password) VALUES ('$user_name', '$user_email', '$user_password')";

        if($connection -> query($sqlQuery) === TRUE) {
            consoleLog("[i] Pomyślnie przesłano dane na serwer");
        } else {
            consoleLog("[!] Wystąpił błąd podczas przesyłania informacji na serwer: " . $connection -> error);
        }
        
        header('Location: ../../index.php');
    }

    $connection -> close();
?>