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

    //Check if password is valid
    $pword = md5($_POST["password"]);
    $name = $_SESSION["username"];
    $verify = "SELECT password FROM Users WHERE username='$name'";
    $res = mysqli_query($con, $verify);
    while ($oldpw = mysqli_fetch_array($res)) {
        $pw = $oldpw['password'];
     }
    if (strcmp($pword,$pw) == 0){
     //change-password
        if(!empty($_POST['change-password'])){
            $newpword = md5($_POST["new_password"]);
            $pass = "update Users set password='$newpword' where username='$name'";
            $query1 = $db->query($pass);
            if ($query == TRUE) { ?>
                <script type = "text/javascript">
                    document.cookie = "loginwrong=right";
                    window.location.replace("profile.php");
                </script> <?php
            }
        }
     //change-genre
        if(!empty($_POST['change-password'])){
            $newgenre = $_POST["fav_genre"];
            $genre = "update Users set fav_genre='$newgenre' where username='$name'";
            $query2 = $db->query($genre);
            if ($query2 == TRUE) { ?>
                <script type = "text/javascript">
                    document.cookie = "loginwrong=right";
                    window.location.replace("profile.php");
                </script> <?php
            }
        }
     //delete-account
        if(!empty($_POST['delete-account'])){
            $confirm= $_POST["decision"];
            if($confirm == "Yes"){
                $delete = "DELETE FROM Users WHERE username='$name'";
                $query3 = $db->query($sql);
                if ($query3 == TRUE) { ?>
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
        }
     } else {
        ?>
            <script type = "text/javascript">
                document.cookie = "loginwrong=wrong";
                window.location.replace("edit_profile.html");
            </script>
        <?php
     }

?>