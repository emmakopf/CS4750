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

    $confirm= $_POST["decision"];
    $name = $_SESSION["username"];

    if($confirm == "Yes"){
        $sql = "DELETE FROM Users WHERE username='$name'";
        $query = $db->query($sql);
        if ($query == TRUE) { ?>
            <script type = "text/javascript">
                document.cookie = "loginwrong=right";
                window.location.replace("index.html");
            </script> <?php
       }
    } else {
        ?>
        <script type = "text/javascript">
            document.cookie = "loginwrong=wrong";
            window.location.replace("edit_profile.html");
        </script>
        <?php
    }

    $db->close();
?>