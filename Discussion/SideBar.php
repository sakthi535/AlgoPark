<!doctype html>

<!--
	Developed by : S Sakthi Saravanan
					20BCE1354

-->

<html style = "background: #AFB4FF;">


	<head>
		<link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
		<link rel = "stylesheet" href = "./SideBar.css" >

	</head>

	<style>
		
		.button{
			width: 100%;
			border: 2px solid #B1E1FF;
			padding: 18px;
			font-family: rubik,sans-serif;
			cursor: pointer;
			text-transform: uppercase;
			background: #B1E1FF;
			color: #A66CFF;
			
		}


		.button:hover{
			border: 2px solid #A66CFF;
			background: #A66CFF;
			color: #B1E1FF;
		}


	</style>

	<div style="font-family: rubik">


		<form action="Forum.php" method="GET" target="forumList" id="forum">

			<table>		

			<tr > 
				<button type="submit" class = "button" value="add" name="submit" style="background: #A66CFF;color: #B1E1FF;">
					Create a forum
				</button>
				<!-- <input type="submit" class = "button" value=" + Add your own" name = "submit"> -->
			</tr>

			<?php
				$servername = "localhost";
				$username = "root";
				$db = "algoPark";
	
				$conn = mysqli_connect($servername, $username, null, $db);
				
				$sql = "select * from forums";
				$result = mysqli_query($conn, $sql);
            	$itr = 0;

				
	            if (mysqli_num_rows($result) > 0) {
					$prompt = false;
					
					
        	        while ($row = mysqli_fetch_assoc($result)) {
						$name = $row['forumName'];
						echo "<tr><input type='submit' class = 'button' value='$name' name = 'submit'></tr>";
						
                	}
            	} else {
					echo "0 results";
            	}
				
				
				?>

			<!-- <tr > 
				<input type="submit" class = "button" value="Arrays and Strings" name = "submit">
			</tr>
			<tr> 
				<input type="submit" class = "button" value="Linked List" name = "submit">
			</tr>
			<tr> 
				<input type="submit" class = "button" value="Stack Queue" name = "submit">
			</tr>
			<tr> 
				<input type="submit" class = "button" value="Binary Tree" name = "submit">
			</tr>

			</tr>
			 -->
			
		</table> 
	</form>
	
			
	</div>


</html>