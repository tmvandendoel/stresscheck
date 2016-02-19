<!DOCTYPE html>
<html>
    <head>
        <title>Home - Testen</title>
        <link rel="stylesheet" type="text/css" href="../../sources/main.css"/>
        <style type="text/css">
        tr
        {
            background-color: #AABBCC;
        }
        </style>
        <?php
            require("../../data/connect.php");
            $conn = db_connect();
            $sql = "SELECT * FROM questions WHERE test = 1";
            $results = getarray($conn->query($sql));
        ?>
        <script type="text/javascript" src="../../sources/qarrangement.js"></script>
        <script type="text/javascript">
        <!--
        //alert("boe");
        var activeq = 1;
        var numberq = <?php echo count($results); ?>;
        //-->
        </script>
    </head>
    <body onload="setcss();">
    <?php include("../../sources/header.php"); ?>
    
    <div class="body">
    <h1>Test A</h1>
        Iedere vraag is een bewering. Kies geef aan in hoeverre deze bewering geldt voor u.
        <form action="process.php" method="get">
        <?php
        $nr = 1;
        echo "<table>\n";
        foreach($results as $question)
        {
            echo '<tr id="id'.$nr.'" onclick="ffocus('.$nr.');">';
            //echo '<tr id="id'.$nr.'">';
            echo "<td>$nr</td>";
            echo "<td>".$question["question"]."</td>";
            echo "<td>helemaal niet van toepassing";
            for ($i = 0; $i < 6; $i++)
            {
                echo '<input type="radio" name="qid'.$question["id"].'" value="'.$i.'"/>';
            }
            echo "volledig van toepassing</td>";
            echo "</tr>\n";
            $nr++;
        }
        echo "</table>";
        ?>
            <input type="button" value="Vorige" id="previous" onclick="fprevious();"/>
            <input type="button" value="Volgende" id="next" onclick="fnext();"/>
            <input type="hidden" name="sender" value="testa">
            <input type="submit" value="VERSTUUR"/>
        </form>
    </div>

    <?php include("../../sources/footer.php"); ?>
    </body>
</html>