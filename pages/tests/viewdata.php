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
        <?php
        if ($_GET["pw"] == "12345")
        {
        ?>
            <hr>Deze tabel bevat de volgende gegevens:
        <?php
            require("../../data/connect.php");
            $conn = db_connect();
            if(!$conn)
            {
                echo "Er is een fout opgetreden. <i>".$GLOBALS["db_error"]."</i>";
            }
            else
            {
                $query = 'SELECT * FROM table1';
                $result = getarray($conn->query($query));
                echo "<table>\n";
                foreach($result as $item)
                {
                    echo "<tr><td>".$item["nr"]."</td><td>".$item["date"]."</td></tr>\n";
                }
                echo "<table>";
            }
        }
        else
        {
        ?>
        <form action="viewdata.php" method="get">
            <input type="hidden" name="sender" value="viewdata.php" autofocus/>
            Wachtwoord: <input type="text" name="pw"/>
        </form>
        <?php
        }
        ?>
    </div>

    <?php include("../../sources/footer.php"); ?>
    </body>
</html>