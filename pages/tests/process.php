<!DOCTYPE html>
<html>
    <head>
        <title>Home - Data weergeven</title>
        <link rel="stylesheet" type="text/css" href="/sources/main.css"/>
        
    </head>
    <body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/sources/header.php"); ?>
    
    <div class="body">
        <h1>Testresultaat</h1>
        <?php
        $post = $_GET;
        $sender = $post["sender"];
        if ($sender != "")
        {
            //echo "De gegevens zijn afkomstig van $sender<br>\n";
            if ($sender == "testtest.php")
            {
                echo "--- test ---<br><br>\n";
                $data = $post["data"];
                echo $data."<br>";
                
                require($_SERVER['DOCUMENT_ROOT']."/data/connect.php");
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
                        echo "De gegevens zijn succesvol opgeslagen.<br>";
                    }
                    else
                    {
                        echo "Er is een fout opgetreden. <i>".$conn->error."</i>";                        
                        }
                }
            }
            else if ($sender == "testa" || $sender == "testb")
            {
                echo "U heeft test ".strtoupper(substr($sender,-1))." afgelegd.<br><br>";
                require($_SERVER['DOCUMENT_ROOT']."/data/connect.php");
                $conn = db_connect();
                $sql = "SELECT * FROM $sender";
                $results = getarray($conn->query($sql));
                
                $score = 0;
                for($i = 1; $i <= 25; $i++)
                {
                    if(!$results[$i - 1]["reverse"])
                    {
                        $score += $post["qid$i"];
                    }
                    else
                    {
                        $score += (5 - $post["qid$i"]);
                    }
                }
                echo "Score: $score<br>";
                //Hier moet de code die de resultaten in de juiste database zet. Daarnaast
                //ook het script dat de meter verzorgt. In plaats daarvan worden nu gewoon
                //de resultaten weergegeven.
                /*$ansarr[0] = "helemaal niet van toepassing";
                $ansarr[1] = "niet van toepassing";
                $ansarr[2] = "matig van toepassing";
                $ansarr[3] = "een beetje van toepassing";
                $ansarr[4] = "van toepassing";
                $ansarr[5] = "zeer van toepassing";
                $i = 1;
                foreach ($post as $key => $value)
                {
                    if(substr($key,0,3) == "qid")
                    {
                        echo "Vraag $i: ".$ansarr[$value]."<br>\n";
                        $i++;
                    }
                }*/
            //require($_SERVER['DOCUMENT_ROOT']."/data/connect.php");
            //$conn = db_connect();
            
            $sql = "INSERT INTO ".$sender."_results (score";
            for($i = 1; $i <= 25; $i++)
            {
                $sql .= ", q$i";
            }
            $sql .= ") VALUES (";
            $sql .= $score;
            for($i = 1; $i <= 25; $i++)
            {
                $sql .= ",".$post["qid$i"];
            }
            $sql .= ")";
            //echo "Query: $sql";
            if(!$conn->query($sql))
            {
                //echo "Error occured executing query: <i>$sql</i><br>Error: ".$conn->error;
                $error = $conn->error;
                
                $type = "SQL";
                $additional = "SQL query: ".$sql;
                include($_SERVER['DOCUMENT_ROOT']."/admin/err_register.php");
            }
            else
            {
                echo "Gegevens succesvol opgeslagen.<br>";
            }
            
            $conn->close();
            }
            else
            {
                echo "Er is een fout opgetreden.<br><i>Fout: onbekende afzender.</i>";
                }
        }
        else
        {
            echo "Er is een fout opgetreden.<br><i>Fout: geen zender opgegeven.</i>";
        }
        echo "<a href='viewdata.php'>Gegevens inzien</a>\n";
        ?>
        
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT']."/sources/footer.php"); ?>
    </body>
</html>