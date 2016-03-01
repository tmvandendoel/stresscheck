<?php
    include($_SERVER['DOCUMENT_ROOT']."/admin/admin.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home - Check je stress</title>
        <link rel="stylesheet" type="text/css" href="/sources/main.css"/>
        
    </head>
    <body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/sources/header.php"); ?>
    <div id="body">
       <h1>Foutenlogboek</h1>
       Dit is een adminpagina.<br>
       <textarea style="width: 80%; height: 300px;"><?php
       if ($_POST["clear"] == "CLEAR")
       {
           $str = date("[Y-m-d G:i:s]")."\n-- ERROR LOG CLEARED --\n\n";
           file_put_contents($_SERVER["DOCUMENT_ROOT"]."/admin/err_log", $str);
        }
       
       $err = file_get_contents($_SERVER['DOCUMENT_ROOT']."/admin/err_log");
       echo $err;
       ?></textarea><br>
       <form action="err_view.php" method="post"><input type="submit" value="CLEAR" name="clear"/></form>
    </div>
	
    <?php include($_SERVER['DOCUMENT_ROOT']."/sources/footer.php"); ?>
    </body>
</html>
