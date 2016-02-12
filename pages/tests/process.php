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