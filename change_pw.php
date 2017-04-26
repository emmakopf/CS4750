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
    $ogpword = md5($_POST["password"]);
    $login = false;
    $newpword=md5($_POST["new_password"]);
    echo $newpword;
    $name = $_SESSION["username"];

    $stmt = $db->stmt_init();
    if ($stmt = $db->prepare("select username, password from Users where username = ? and password = ?")) {
        $stmt->bind_param('ss', $name, $ogpword);
        $stmt->execute();
        $stmt->bind_result($name, $pass);
        if ($stmt->fetch()) {
            $sql = "update Users set password = '$newpword' where username = '$name'";
            $update = mysqli_query($con,$sql);

        }
		//Incorrect:
		else{ ?>
			<script type = "text/javascript">
				document.cookie = "loginwrong=wrong";
				window.location.replace("login.html");
			</script>
			<?php
		}
	}
	$stmt->close();
    $db->close();
?>