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
        <link rel="icon" type="image/png" href="https://example.com/favicon.png">
        <link rel="icon" type="image/x-icon" href="https://example.com/favicon.ico">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/normalize.css"/>
    </head>
    <body>
        <form action="" method="post">
            <label for="trescPosta">Tresc</label>
            <input type="text" id="trescPosta" name="trescPosta"/> <br/>
            <input type="submit" value="Wyślij"/>
            
        </form>
        <?php
            if($_POST == null) {
                $tresc = "";
            } else {
                $tresc = $_POST["trescPosta"];
            }
            echo $tresc;
        ?>
    </body>
</html>

