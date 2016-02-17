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
        <script type="text/javascript">
        <!--
        alert("boe");
        var activeq = 1;
        var numberq = 4; // let php fill in
        function setcss()
        {
            alert("graag");
            for (i = 1; i <= numberq; i++)
            {
                /*var tr = document.getElementById("id" + i);
                if (i + 1 == activeq || i - 1 == activeq)
                {
                    tr.style.opacity = 0.5;
                }
                else
                {
                    tr.style.display = "none";
                }*/
            }
        //-->
        </script>
    </head>
    <body onload="setcss();">
    <?php include("../../sources/header.php"); ?>
    
    <div class="body">
    <h1>Test A</h1>
        Iedere vraag is een bewering. Kies geef aan in hoeverre deze bewering geldt voor u.
        <?php
        require("../../data/connect.php");
        $conn = db_connect();
        $sql = "SELECT * FROM questions WHERE test = 1";
        $results = getarray($conn->query($sql));
        $nr = 1;
        echo "<table>\n";
        foreach($results as $question)
        {
            echo "<tr id=id$nr>";
            echo "<td>$nr</td>";
            echo "<td>".$question["question"]."</td>";
            echo "<td>helemaal niet van toepassing";
            for ($i = 0; $i < 6; $i++)
            {
                echo '<input type="radio" name="vraagid'.$question["id"].'"/>';
            }
            echo "volledig van toepassing</td>";
            echo "</tr>\n";
            $nr++;
        }
        echo "</table>";
        ?>
    </div>

    <?php include("../../sources/footer.php"); ?>
    </body>
</html>