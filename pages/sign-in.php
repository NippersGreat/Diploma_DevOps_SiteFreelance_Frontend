<?php
$missing = @$_GET['missing'];
$failed = @$_GET['failed'];
$mfieldlist = explode(" ", $missing);
$mfieldkeys = array_flip($mfieldlist);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign-in page</title>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/sign-in.css">
    </head>

    <body>
     <?php
        if ($failed){
            ?>
            <p class="errmsg">Given combination of the login name and the password you entered matches no registered user.</p>
        <?php
        }
    ?>
     <div id="sign-in-block-main">
        <form action="sign-in-action.php" method="post">
            <?php
                if(array_key_exists('login', $mfieldkeys)){
                    ?>
                        <div class="warning-label">
                            <label class="errmsg">'Login' field needs to be filled in.</label>
                        </div>
            <?php
                }
            ?>
            <div class="block-label-bordered">
                <label for="login" class="block-label-white">Your login (E-mail address):</label>
                <input name="login" id="login" type="text">
            </div>
            <br/>
            <?php
            if(array_key_exists('password', $mfieldkeys)){
                ?>
                <label class="errmsg">'Password' field needs to be filled in.</label>
                <br/>
                <?php
            }
            ?>
            <div class="block-label-bordered">
                <label for="password" class="block-label-white">Your password:</label>
                <input name="password" id="password" type="password">
            </div>
            <button type="submit" class="block-label-blue" id="sign-in-button">Sign in.</button>
        </form>
     </div>
    </body>
</html>
