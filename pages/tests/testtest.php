<!DOCTYPE html>
<html>
    <head>
        <title>Home - Test A</title>
        <link rel="stylesheet" type="text/css" href="../../sources/main.css"/>
        
    </head>
    <body>
    <?php include("../../sources/header.php"); ?>
    
    <div class="body">
        <h1>Test A</h1>
        Dit is een testpagina.<br/>
        <form action="process.php" method="get">
            <input type="hidden" name="sender" value="testtest.php"/>
            Type een antwoord string: <input type="text" name="data"/>
            <input type="submit" value="Stuur in"/>
        </form>
    </div>

    <?php include("../../sources/footer.php"); ?>
    </body>
</html>