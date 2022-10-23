<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje Osiedle</title>
    <link rel="stylesheet" href="logged_out.css">
</head>
<body>
    <div id="left">
        <p id="title">Moje Osiedle</p>
        <p id="description">Od Obywateli dla Obywateli.</p>
    </div>

    <div id="right">

    <!--<?php //if (isset($_GET['error'])) { ?>

    <p class="error"><?php //echo $_GET['error']; ?></p>

    <?php //} ?>-->


            <form id="form" action="php/logging_in.php" method="post">
                <input placeholder="E-Mail Adress" type="email" id="email" name="email"><br><br>
    
                <input placeholder="Password" type="password" id="pass" name="pass"><br><br>
            </form>
        

            <a onclick="document.getElementById('form').submit();" id="log_in">Log In</a><br>
            <a id="sign_in" href="./sign_in/sign_in.php">Sign In</a>
    </div>

    <?php
        include("../php/config.php");
    ?>
</body>
</html>