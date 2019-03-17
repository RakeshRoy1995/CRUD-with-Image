<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "SELECT * from new_record where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> | <a href="insert.php">Insert New Record</a> </p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['submit']))
{
$id=$_POST['u_id'];
$name =$_POST['name'];
$comment = $_POST["comment"];

$target = "images/".basename($_FILES['image']['name']);

// $update="UPDATE new_record set name='$name', image='$target' comment='$comment' where id=$id";
$update ="UPDATE new_record SET name='$name',image='$target',comment='$comment' WHERE id=$id";

   $result = mysqli_query($con, $update);
var_dump($result) or die();
  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
              echo '<script language="javascript">';
              echo 'alert("message successfully sent")';
              echo '</script>';
        }
	}else {
		echo "string";
	}
?>
<div>
<form name="form" method="post" action="edit.php" enctype="multipart/form-data"> 
<input name="u_id" type="text" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['name'];?>" /></p>
<p><input type="file" name="image" /></p>
<p><input type="text" name="comment" placeholder="Enter comment" required value="<?php echo $row['comment'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<br /><br /><br /><br />
</div>
</div>
</body>
</html>