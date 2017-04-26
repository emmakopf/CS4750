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
    $pword = md5($_POST["password"]);
    $genre = $_POST["fav_genre"];
    $name = $_SESSION["username"];


    $old = "SELECT password FROM Users WHERE username='$name'";
    $res = mysqli_query($db, $old);
    while ($oldpw = mysqli_fetch_array($res)) {
        $pw = $oldpw['password'];
     }


    if (strcmp($pw,$pword)) {
        $sql = "update Users set fav_genre='$genre' where username='$name'";
        $query = $db->query($sql);
        if ($query == TRUE) { ?>
            <script type = "text/javascript">
                document.cookie = "loginwrong=right";
                window.location.replace("profile.php");
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