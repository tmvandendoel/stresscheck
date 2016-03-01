<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

echo "Er is een fout opgetreden.<br>";
$page = $_SERVER["PHP_SELF"];
$errstring = date("[Y-m-d G:i:s]")."\nPAGE:        $page\nTYPE:        $type\nERROR MSG:   $error\nINFORMATION: $additional\n\n";
//echo $errstring;

if(!file_put_contents($_SERVER["DOCUMENT_ROOT"]."/admin/err_log", $errstring,FILE_APPEND))
{
    echo "De fout kon niet in het logboek verwerkt worden door een andere fout ;-). Neem alstublieft contact op met de beheerder van deze website.<br>";
    //echo $php_errmsg;
}
else
{
    echo "De fout is opgeslagen in het foutenlogboek, zichtbaar voor de beheerder. Onze excuses voor het ongemak.<br><hr>\n";
    echo "<i>".str_replace("\n","<br>",$errstring)."</i>";
    }
//fclose($fp);
?>