<?php
 session_start();


 if (isset($_SESSION['admin'])) {
 ?>
   <?php
     include('header.php');
   ?>
	<div class="row">
		<div class="large-12 columns">
			<div class="large-6 medium-6 push-3 columns">
				<h1>Mapping marker admin tool</h1>
				<?php
				$sql="SELECT * FROM potholes order by date_added asc";
				$result = mysql_query($sql);
				$count = mysql_num_rows($result);

				if ($count > 0) {
				echo "<table>";
				echo "<tr><td><strong>Name</strong></td><td><strong>Email</strong></td><td><strong>Description</strong></td><td><strong>Lattitude</strong></td><td><strong>Longitude</strong></td><td><strong>Active</strong></td><td><strong>Date Added</strong></td><td>&nbsp</td><td>&nbsp</td></tr>";
				while($row = mysql_fetch_array($result)) {
				echo "<tr><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['description']."</td><td>".$row['lat']."</td><td>".$row['lng']."</td><td>".$row['active']."</td><td>".$row['date_added']."</td><td><a href='login.php?view=delete&cid=".$row['id']."'>Delete</a></td><td><a href='login.php?view=edit&cid=".$row['id']."'>Edit</a></td></tr>";

				}
				echo "</table>";
				}
				?>
			</div>
		</div>
	</div>
   <?php
     include('footer.php');
   ?>
 <?php

 } else {
   header("location: index.php");
 }
?>

