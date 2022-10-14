<?php
    include("../../php/config.php");

    $num = 0;
    $user_email = $_POST["email"];
    $user_password = $_POST["pass"];

    //Sprawdzanie czy taki email istnieje w bazie danych
    $connection = connectToDB($servername, $username, $password, $database);
    $sqlQuery = "SELECT user_email FROM users WHERE user_email = '$user_email'";

    $result1 = $connection -> query($sqlQuery);

    if(mysqli_num_rows($result1) === 0){
        consoleLog("[i] Bład logowania. Podany email nie istnieje.");
        header("Location: ../logged_out.php");
    }else{
        consoleLog("[i] Pomyslnie zalogowano.");
        header("Location: ../logged_out.php");
        $num++;
    }
    

    //Sprawdzanie czy takie haslo nalezy do tego uzytkownika (nie gotowe)
    $sqlQuery = "SELECT user_password FROM users WHERE user_password = '$user_password'";

    $result2 = mysqli_query($connection, $sqlQuery);

    if(mysqli_num_rows($result2) === 0){
        consoleLog("[i] Bład logowania. Podane haslo jest nie prawidlowe.");
        header("Location: ../logged_out.php");
    }else{
        consoleLog("[i] Pomyslnie zalogowano.");
        header("Location: ../logged_out.php");
        $num++;
    }

    if($num === 2){
        header("Location: ../../index.php");
    }


    $connection -> close();


















/*session_start(); 

include "../../php/config.php";

if (isset($_POST['email']) && isset($_POST['pass'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $email = validate($_POST['email']);

    $password = validate($_POST['pass']);

    if (empty($email)) {

        header("Location: ../logged_out.php?error=User Name is required");

        exit();

    }else if(empty($password)){

        header("Location: ../logged_out.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM users WHERE user_email= '$email' AND user_password = '$password'";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['user_email'] === $email && $row['user_password'] === $password) {

                consoleLog("[i] Pomyslnie zalogowano.");

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['user_email'] = $row['user_email'];

                $_SESSION['uesr_id'] = $row['user_id'];

                header("Location: ../../index.php");

                exit();

            }else{

                header("Location: ../logged_out.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: ../logged_out.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: ../logged_out.php");

    exit();

}*/


?>