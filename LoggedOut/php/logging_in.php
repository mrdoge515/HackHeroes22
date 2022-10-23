<?php
    include("../../php/config.php");

    //zmienne
    $num = 0;
    $user_email = $_POST["email"];
    $user_password = $_POST["pass"];

    
    //Sprawdzanie czy taki email z takim hasłem istnieją w bazie danych
    $connection = connectToDB($servername, $username, $password, $database);
    $sqlQuery = "SELECT user_id FROM users WHERE user_email = '$user_email' AND user_password = '$user_password'";
    
    //wykonywanie powyższego zapytania i sprawdzanie czy jest prawdziwe
    $result = $connection -> query($sqlQuery);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    if($count == 1){
        consoleLog("[i] Pomyslnie zalogowano.");
        header("Location: ../../index.php");
    }else{
        header("Location: ../logged_out.php");
    }
        
    $connection -> close();
?>