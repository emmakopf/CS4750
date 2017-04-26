<?php
    ob_start();
    session_start();
   	include("./connect_to_db.php");
    $db = DbUtil::loginConnection();

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
else{
    $name = $_POST["username"];
    $pword = md5($_POST["password"]);
    $login = false;

    $stmt = $db->stmt_init();
    if ($stmt = $db->prepare("select username, password from Users where username = ? and password = ?")) {
        $stmt->bind_param('ss', $name, $pword);
        $stmt->execute();
        $stmt->bind_result($name, $pass);
        if ($stmt->fetch()) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $name;?>
			<script type = "text/javascript">
				document.cookie = "loginwrong=right";
				document.cookie = "verified=true";
				window.location.replace("edit_profile.html");
			</script>
            <?php
        }
		//Incorrect:
		else{ ?>
			<script type = "text/javascript">
				document.cookie = "loginwrong=wrong";
				window.location.replace("verify.html");
			</script>
			<?php
		}
	}
}
	$stmt->close();
    $db->close();
?>
