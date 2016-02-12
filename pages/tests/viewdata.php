<!DOCTYPE html>
<html>
    <head>
        <title>Home - Data weergeven</title>
        <link rel="stylesheet" type="text/css" href="../../sources/main.css"/>
        
    </head>
    <body>
    <?php include("../../sources/header.php"); ?>
    
    <div class="body">
        <h1>Data</h1>
        Dit is een testpagina.<br/>
        <form action="process.php" method="get">
            <input type="hidden" name="sender" value="viewdata.php"/>
            Wachtwoord: string: <input type="text" name="data"/>
        </form>
    </div>

    <?php include("../../sources/footer.php"); ?>
    </body>
</html>