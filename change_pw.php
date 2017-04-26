<?php
    ob_start();
    session_start();
   	include("./connect_to_db.php");
    include_once("./library.php");
    $db = DbUtil::loginConnection();
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    //check if db connects
     if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //Changing password
    $newpword = md5($_POST["new_password"]);
    $name = $_SESSION["username"];

    $sql = "update Users set password='$newpword' where username='$name'";
    $query = $db->query($sql);
    if ($query == TRUE) { ?>
        <script type = "text/javascript">
            document.cookie = "loginwrong=right";
            window.location.replace("profile.php");
        </script> <?php
        }



    $db->close();
?>