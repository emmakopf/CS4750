<?php
    ob_start();
    session_start();
   	include("./connect_to_db.php");
           $db = DbUtil::loginConnection();
    
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); //Encrypt Password
    $fav_genre = $_POST['fav_genre'];
	
	//Check if username is unique
	$sql="SELECT username FROM Users";
	$result = $db->query($sql);
	while($row = $result->fetch_assoc()){
		if($row["username"] == $username){ ?>
			<script type = "text/javascript">
				document.cookie = "usernametaken=taken";
				window.location.replace("create_account.html");
				
			</script>
			<?php
		}
	}
	
    $sql = "INSERT INTO Users Values
        ('$username', '$first_name', '$last_name', '$email', '$password', '$fav_genre')";
	$result = $db->query($sql);

	//successful creation of account:

        $_SESSION["username"] = $username;
		$_SESSION["login"] = true;
        $_SESSION["fav_genre"] = $genre;
		?>
		<script type = "text/javascript">
				document.cookie = "usernametaken=valid";
				window.location.replace("profile.php");
			</script>
		<?php
        
    mysqli_close($con);
?>
