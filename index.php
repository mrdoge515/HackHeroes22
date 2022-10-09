<!DOCTYPE html>
<html>
    <head>
        <title>Strona główna</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        
        <form action="index.php" method="post">
            <label for="trescPosta">Tresc</label>
            <input type="text" id="trescPosta" name="trescPosta"/> <br/>
            <input type="submit" value="Wyślij"/>
        </form>
        <?php 
            $tresc = $_POST["trescPosta"];
            echo $tresc;
        ?>

    </body>
</html>

