<!DOCTYPE html>
<html>
<head>
    <title>Profile page.</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php
        require_once("../connect/session.php");
        require("../fragments/sign-out-form.php");

        $missing = @$_GET['missing'];
        $mfieldlist = explode(" ", $missing);
        $mfieldkeys = array_flip($mfieldlist);
    ?>
    <a href="index.php">Back to main page</a>
    <?php
    if(array_key_exists("id", $_GET)){
        $id = 0 + $_GET['id'];
    }
    else{
        $id = 0 + $login_id;
    }

    $stmt = $mysqli->prepare("SELECT login as userlogin, first_name, last_name, role, image_data, info FROM Participant WHERE id = ?;");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if($result = $stmt->get_result()){
        extract($result->fetch_assoc());
        ?>
        <h2><?=$first_name?> <?=$first_name?></h2>

        <p>You are a <strong><?=$role?></strong>.</p>
        <ul>
            <li>Login (E-mail): <?=$userlogin?></li>

        <?php

        if($role='contractor'){
            $stmt = $mysqli->prepare("SELECT COUNT(*) FROM Project WHERE contractor_id = ?;");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $undertaken_projects = $stmt->get_result()->fetch_row()[0];

            $stmt = $mysqli->prepare("SELECT COUNT(*) FROM Project WHERE contractor_id = ? AND completed = TRUE;");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $finished_projects = $stmt->get_result()->fetch_row()[0];

            ?>
                <!-- Add a whole list of projects when projects will exist, damn it!-->

                <li>Undertaken projects: <?=$undertaken_projects?></li>
                <li>Finished projects: <?=$finished_projects?></li>

            <?php
        }

        else{
            $stmt = $mysqli->prepare("SELECT COUNT(*) FROM Project WHERE client_id = ?;");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $projects_posted = $stmt->get_result()->fetch_row()[0];

            $stmt = $mysqli->prepare("SELECT COUNT(*) FROM Project WHERE client_id = ? AND completed = TRUE;");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $had_projects_finished = $stmt->get_result()->fetch_row()[0];

            ?>
                <!-- Add a whole list of projects when projects will exist, damn it!-->

                <li>Projects posted: <?=$projects_posted?></li>
                <li>Of them are finished: <?=$had_projects_finished?></li>

            <?php
        }
        ?>
            </ul>
            <img src="" alt="Profile image.">
        <?php

        if($login_id == $id){
            ?>
                This is you.
                <blockquote>
                    <form action="change-password-action.php" method="POST">
                        <input type="hidden" name="user_id" value="<?=$id?>"/>
                        <?php
                            require("../fragments/password-entry.php");
                        ?>
                        <button type="submit">Change password.</button>
                    </form>
                </blockquote>
            <blockquote>
                <form action="change-image-action.php" method="POST">
                    <input type="hidden" name="user_id" value="<?=$id?>"/>
                    <?php
                    require("../fragments/image-change.php");
                    ?>
                    <button type="submit">Change the image.</button>
                </form>
            </blockquote>
            <blockquote>
                <form action="change-info-action.php" method="POST">
                    <input type="hidden" name="user_id" value="<?=$id?>"/>
                    <?php
                    require("../fragments/info-entry.php");
                    ?>
                    <button type="submit">Change info.</button>
                </form>
            </blockquote>
            <?php
        }
    }
    ?>
</html>

