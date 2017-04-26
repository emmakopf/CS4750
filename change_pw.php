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
    $ogpword = md5($_POST["old_password"]);
    $newpword = md5($_POST["new_password"]);
    $name = $_SESSION["username"];
    
    
    $old = "SELECT password FROM Users WHERE username='$name'";
    $res = md5(mysqli_query($con, $old));
    
    if ($res === $ogpword) {
    $sql = "update Users set password='$newpword' where username='$name'";
    $query = $db->query($sql);
    if ($query == TRUE) { ?>
        <script type = "text/javascript">
            document.cookie = "loginwrong=right";
            window.location.replace("profile.php");
        </script> <?php
    } else {
        ?>
        <script type = "text/javascript">
            document.cookie = "loginwrong=wrong";
            window.location.replace("edit_profile.html");
        </script>
    <?php
        }
    }

    $db->close();
?>
