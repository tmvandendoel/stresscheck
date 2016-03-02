<!DOCTYPE html>
<html>
    <head>
        <title>Home - Data weergeven</title>
        <link rel="stylesheet" type="text/css" href="/sources/main.css"/>
        
    </head>
    <body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/sources/header.php"); ?>
    
    <div class="body">
        <h1>Data</h1>
        Dit is een testpagina.<br/>
        <?php
        if ($_GET["pw"] == "12345")
        {
        ?>
            <form action="viewdata.php" method="get">
                Tabel: <input type="text" name="table" value="<?php echo $_GET["table"]; ?>"/>
                <input type="hidden" name="pw" value="12345"/>
                <input type="submit" value="OK">            
            </form>
            <hr>
            Deze tabel bevat de volgende gegevens:
            
        <?php
            require($_SERVER['DOCUMENT_ROOT']."/data/connect.php");
            $conn = db_connect();
            if(!$conn)
            {
                echo "Er is een fout opgetreden. <i>".$GLOBALS["db_error"]."</i>";
            }
            else
            {
                $table = $_GET["table"];
                $query = 'SELECT * FROM '.$table;
                $result = getarray($conn->query($query));
                echo "<table border='1'>\n";
                foreach($result as $item)
                {
                    //echo "<tr><td>".$item["nr"]."</td><td>".$item["date"]."</td></tr>\n";
                    echo "<tr>";
                    foreach($item as $value)
                    {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>\n";
                }
                echo "</table>";
            }
        }
        else
        {
        ?>
        <form action="viewdata.php" method="get">
            <input type="hidden" name="table" value="<?php echo $_GET["table"]; ?>"/>
            Wachtwoord: <input type="text" name="pw"/>
            <input type="submit" value="OK">
        </form>
        <?php
        }
        ?>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT']."/sources/footer.php"); ?>
    </body>
</html>