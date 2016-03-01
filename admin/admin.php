<?php
    //include this page on all admin-pages
    //it should be included as first of all data, for the redirection requires
    //that not a single byte (not even a space) is sent to the browser.
    $login = true; //in the future this should be password checking
    
    if (!$login)
    {
        //if not logged in, redirect to login page
        header("Location: /admin/");
        //echo $_SERVER['DOCUMENT_ROOT'];
        die("U wordt doorgestuurt naar de inlogpagina. Klik <a href='/admin/'>hier</a> voor de inlogpagina.");
    }
?>