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
            $conn = db_connect("test");
            if(!$conn)
            {
                echo "Er is een fout opgetreden. <i>".$GLOBALS["db_error"]."</i>";
            }
            else
            {
                $query = 'SELECT * FROM table1';
                $result = $conn->query($query);
                if ($result->num_rows > 0)
                {
                    echo "<table>\n";
                    // output data of each row
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr><td>".$row["nr"]."</td><td>".$row["date"]."</td></tr>\n";
                    }
                    echo "</table>\n";
                }
                else
                {
                    echo "0 results";
                }
            }
        }
        else
        {
        ?>
        <form action="viewdata.php" method="get">
            <input type="hidden" name="sender" value="viewdata.php" autofocus/>
            Wachtwoord: string: <input type="text" name="pw"/>
        </form>
        <?php
        }
        ?>
    </div>

    <?php include("../../sources/footer.php"); ?>
    </body>
</html>