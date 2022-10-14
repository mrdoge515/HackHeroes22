<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="sign_in.css">
</head>
<body>
   <main id="">
        <form action="../php/signing_in.php" method="post">
            <label for="nick">Podaj swój unikalny nick: </label>
            <input type="text" id="nick" name="nick"><br><br>

            <label for="mail">Podaj E-Mail: </label>
            <input type="email" id="mail" name="mail"><br><br>
            
            <label for="pass">Podaj Hasło: </label>
            <input type="password" id="pass" name="pass"><br><br>

            <input type="submit" value="Zarejestruj się">
            <input type="reset" value="Wyczyść">
        </form>
   </main>

   <?php
        include("../../php/config.php");
    ?>
</body>
</html>