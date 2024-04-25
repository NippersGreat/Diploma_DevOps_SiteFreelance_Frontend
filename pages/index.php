<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Main page</title>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/index.css">
    </head>
    <body>
        <?php
            require_once("../connect/session.php");
            require("../fragments/sign-out-form.php");

            if(@$login){
                ?><hr><?php

             }
        ?>

        <?php
            require ("../fragments/index-intro.php");
            require ("../fragments/index-gallery.php");
            require ("../fragments/index-promotional.php");
            require ("../fragments/index-projects.php");
            require ("../fragments/index-info.php");
            require ("../fragments/index-faq.php");
        ?>
    </body>

</html>
