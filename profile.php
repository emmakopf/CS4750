<?php
    session_start();
     ################### Check Login Status ###################
	 if(!$_SESSION["login"]){
		header('Location: index.html');
	  } 
	 else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 </head>
    <nav class="navbar navbar" style="color:black">
        <div class="container-fluid">

            <!--Home-Header button of navbar -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNavBar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="profile.php" style="color:white">NeXtflix</a>
            </div>

            <div class="collapse navbar-collapse" id="topNavBar">
                <ul class="nav navbar-nav navbar-right" style="color:white">
                    <li class="">
                        <a href="" style="color:white">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp; What to Watch!
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
					<li class="">
						<a href="logout.php" style="color:white">
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp; Logout
						</a>
					</li>
				</ul>
				<ul class ="nav navbar-nav navbar-right">
				    <li class="">
				        <a href="edit_profile.html" style="color:white">
				            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Edit Profile
				        </a>
				    </li>
				</ul>
            </div>
        </div>
    </nav>
 <style>
     body {
         background-color: black;
         background-repeat: no-repeat;
     }
     .navbar{
            font-family: Avenir;
            border-radius: 0;
        }
     h1{
         font-family: Avenir;
         color: white;
         text-align: center;

     }
     h2 {
         font-family: Avenir;
         color: white;
         margin-left: 5%;
     }
	 h3 {
         font-family: Avenir;
         color: white;
         margin-left: 5%;
     }
     p{
         font-family: Avenir;
         color: white;
         margin-left: 5%;
     }
     input{
         font-family: Avenir;
     }
 </style>
<body>
    <h1>Welcome: <?php echo($_SESSION["username"]);
        }?>
	 </h1>
	 <h2> Popular Now </h2>
	 <h3> TV Shows: </h3>
        <div style="overflow-x:auto;">
		<table id="popularShows" border = "1" class="table-responsive" align = center>
			<tr id="showRow">
			</tr>
		</table>
        </div>
		<h3> Movies: </h3>
        <div style="overflow-x:auto;">
		<table id="popularMovies" border = "1" class="table-responsive" align = center>
			<tr id="movieRow">
			</tr>
		</table>
        </div>
    <h2>
    <?php //Find current user's favorite genre
        include_once("./library.php");
        $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        
        if (mysqli_connect_errno()) {
            echo("Can't connect to MySQL Server.");
            return null;
        }
        
		$username = $_SESSION["username"];
        $getGenre = "SELECT fav_genre FROM Users WHERE username = '$username'";
        $fav_genre = mysqli_query($con, $getGenre);
        while($genres = mysqli_fetch_array($fav_genre)) {
            $genre = $genres['fav_genre'];
        }
/*           
		   //Join TVShows & Movies, select Titles of those that are from the same preferred genre of the logged in user
            $query1="SELECT Title, Genre FROM Movies WHERE Genre='$genre' UNION ALL SELECT Title, Genre FROM TVShows WHERE Genre='$genre'";
            
        $result = mysqli_query($con, $query1);
            while($row = mysqli_fetch_array($result)) {
                echo($row['Title']."<br>");
            }*/
        ?></h2>
		
	<script type = "text/javascript">
		//Populate tvshow table
		var tvrow = document.getElementById("showRow");
		var i = 0;
		<?php 
		$query1="SELECT Title, tvid FROM TVShows WHERE TVShows.Rating > 4";
		$result = mysqli_query($con, $query1);
		
		while($tvrow = mysqli_fetch_array($result)) { ?>
			var x = tvrow.insertCell(i);
            <?php $title = $tvrow['Title']; 
			$id = $tvrow['tvid']; ?>
			x.innerHTML ="<a href='info.php?id=<?php echo($id); ?>'><img src='./images/<?php echo($id); ?>.jpg' style='width:180px;height:152px;'></a>";
			i++;
           <?php } ?>;
		   
		//Populate movie table   
		var mrow = document.getElementById("movieRow");
		var j = 0;
		<?php 
		$query2="SELECT Title, movie_id FROM Movies WHERE Movies.Rating = 5";
		$result2 = mysqli_query($con, $query2);
		
		while($mrow = mysqli_fetch_array($result2)) { ?>
			var x = mrow.insertCell(j);
            <?php $title = $mrow['Title']; 
				$id = $mrow['movie_id'];
				 ?>
			x.innerHTML ="<a href='info.php?id=<?php echo($id); ?>'><img src='./images/<?php echo($id); ?>.jpg' style='width:180px;height:152px;'></a>";
			j++;
           <?php } ?>;
	</script>
</body>

</html>
