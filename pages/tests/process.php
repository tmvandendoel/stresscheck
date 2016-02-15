<!DOCTYPE html>
<html>
    <head>
        <title>Home - Data weergeven</title>
        <link rel="stylesheet" type="text/css" href="../../sources/main.css"/>
        
    </head>
    <body>
    <?php include("../../sources/header.php"); ?>
    
    <div class="body">
        <?php
        $post = $_GET;
        $sender = $post["sender"];
        if ($sender != "")
        {
            echo "De gegevens zijn afkomstig van $sender<br>\n";
            if ($sender == "testtest.php")
            {
                echo "--- test ---<br><br>\n";
                $data = $post["data"];
                echo $data."<br>";
                
                require("../../data/connect.php");
                $conn = db_connect("test");
                if(!$conn)
                {
                    echo "Er is een fout opgetreden. <i>".$GLOBALS["db_error"]."</i>";
                }
                else
                {
                    $query = 'INSERT INTO table1 (date) VALUES ("'.$data.'")';
                    $result = $conn->query($query);
                    if ($result === true)
                    {
                        echo "De gegevens zijn succesvol opgeslagen.<br><a href='viewdata.php'>Gegevens inzien</a>\n";
                    }
                    else
                    {
                        echo "Er is een fout opgetreden. <i>".$conn->error."</i>";                        
                        }
                }
            }
        }
        else
        {
            die("Er is een fout opgetreden.<br><i>Fout: geen zender opgegeven.</i>");
            }
        ?>
        
    </div>

    <?php include("../../sources/footer.php"); ?>
    </body>
</html>