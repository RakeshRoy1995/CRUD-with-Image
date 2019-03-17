<?php
require('db.php');
if (isset($_POST['submit'])) {
	$name = $_POST['search'];

	$sel_query = "Select * from new_record where name = '$name'";
    $result = mysqli_query($con,$sel_query);

}

?>

<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
	<th><strong>S.No</strong></th>
	<th><strong>Name</strong></th>
	<th><strong>Picture</strong></th>
	<th><strong>Comment</strong></th>
	<th><strong>Edit</strong></th>
	<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["name"]; ?></td>
	<!-- <img style="width:70px; height:70px;" src="<?php echo $product_array["image"]; ?>"></div> -->
	<td align="center"><img style="width:70px; height:70px;" src="<?php echo $row["image"]; ?>"> </td>
	<td align="center"><?php echo $row["comment"]; ?></td>
	<td align="center"><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
	<td align="center"><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
