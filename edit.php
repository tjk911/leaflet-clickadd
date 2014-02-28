<?php
if(isset($_SESSION['admin'])) {
} else {
header("location:index.php");
}
include("header.php");
$cid='';

if(isset($_GET['cid'])) {
$cid = $_GET['cid']; 
$cid = stripslashes($cid);
$cid = mysql_real_escape_string($cid);
} else {
header("location:index.php");
}
?>
<?php
$sql="select * from potholes where id='".$cid."'";
$result = mysql_query($sql);
$count = mysql_num_rows($result);

$name = '';
$email= '';
$description= '';
$lat= '';
$lng= '';
$active= '';
$date_added= '';

if ($count > 0) {
	while($row = mysql_fetch_array($result)) {
	$name = $row['name'];
$email= $row['email'];
$description= $row['description'];
$lat= $row['lat'];
$lng= $row['lng'];
$active= $row['active'];
$date_added= $row['date_added'];
	}
} else {
echo "<p>There are no markers for the map.</p>";
}
?>
<div class="row">
  <div class="large-12 columns">
    <div class="large-6 push-3 columns">
      <div align="center">
      <p style="text-align:center;"><strong>Mapping marker admin tool</strong></p>
      </div>
      <p><strong>Edit content:</strong></p>
      <form name="form1" method="post" action="?view=edit_process&cid=<?php echo $cid;?>" style="width:100vw;">
      <table>
      <tr><td>Submitter name:</td><td><input type="text" name="name" id="name" value="<?php echo stripslashes($name);?>"></td><td>&nbsp;</td></tr>
      <tr><td>Submitter email:</td><td><input type="text" name="email" id="email" value="<?php echo $email;?>"></td><td><em>(Leave blank if not available)</em></td></tr>
      <tr><td colspan="3"><em>Optional:</em></td></tr>
      <tr><td>Description:</td><td><input type="text" name="description" id="description" value="<?php echo $description;?>"></td><td>&nbsp;</td></tr></tr>
      <tr><td>Latitude:</td><td><input type="text" name="lat" id="lat" value="<?php echo $lat;?>"></td><td>&nbsp;</td></tr></tr>
      <tr><td>Longitude:</td><td><input type="text" name="lng" id="lng" value="<?php echo $lng;?>"></td><td>&nbsp;</td></tr></tr>
      <tr><td>Active:</td><td><input type="text" name="active" id="active" value="<?php echo $active;?>"></td><td>&nbsp;</td></tr></tr>
      </table>
      <p><input type="submit" name="submit" value="Edit Content"></p>
      </form>
    </div>
  </div>
</div>


<?php
include("footer.php");
?>