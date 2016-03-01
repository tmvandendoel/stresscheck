<!DOCTYPE html>
<html>
    <head>
        <title>Home - Testen</title>
        <link rel="stylesheet" type="text/css" href="/sources/main.css"/>
        
    </head>
    <body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/sources/header.php"); ?>
    <div id="nav">
        <?php include("nav.php"); ?>       
    </div>   
    <div class="body">
    <?php
    if (!isset($_POST["input"]))
    {
        ?>
    <h1>Gegevens toevoegen</h1>
        Deze pagina is alleen voor ontwikkelingsdoeleinden! <i>Niet</i> gebruiken voor beheerders- of gebruikersdoeleinden.<br>
        <br>
        Gebruik deze pagina om vragen toe te voegen aan een bepaalde tabel. Een regel per vraag.
        <form action="addq.php" method="post">
            <textarea name="input" style="width: 600px; height: 200px;"></textarea><br>
            Toe te voegen aan tabel <input type="text" name="table"/>
            <input type="submit" value="OK"/>
        </form>
        <?php
    }
    else
    {
        require($_SERVER['DOCUMENT_ROOT']."/data/connect.php");
        $conn = db_connect();
        $regels = explode("\n",$_POST["input"]);
        $sql = "INSERT INTO ".$_POST["table"]." (question, reverse) VALUES ";
        foreach($regels as $regel)
        {
            $sql .= "('".substr(str_replace("'","\"",$regel),0,-1)."', 0),";
            //echo "$sql<br>\n";
            //$conn->query($sql);
        }
        //$sql .= "('boe',0) ";
        $sql = substr($sql,0,-1);
        if(!$conn->query($sql))
        {
            echo "Error executing <i>$sql</i><br>";
            echo "Error: ".$conn->error;
        }
        else
        {
            echo "Executed query:<br>$sql";
        }
        $conn->close();
    }
    ?>
    </div>

    <?php include($_SERVER['DOCUMENT_ROOT']."/sources/footer.php"); ?>
    </body>
</html>