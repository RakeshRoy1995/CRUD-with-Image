<?php

include('db.php');
    
    if(isset($_POST['upload'])){
    	$name = $_POST['name'];
    	$comment = $_POST['comment'];

        $target = "images/".basename($_FILES['image']['name']);
        //images is the folder name to save picture inthat particular filder
     
     var_dump($_FILES);   

        $sql = "INSERT INTO new_record(name, image, comment)
         VALUES ('$name','$target','$comment')";
        $run = mysqli_query($con , $sql);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
              echo '<script language="javascript">';
              echo 'alert("message successfully sent")';
              echo '</script>';
        }

}

   ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> | <a href="view.php">View Records</a>  </p>

<div>
<h1>Insert New Record</h1>

   <form class="form-group" action='insert.php' method='post' enctype='multipart/form-data' ></br><br>
           Name  :<input type="text" name="name" class="form-control" required ><br><br>
           Image :<input type='file' name='image' class="btn btn-outline-primary" required ><br><br>
           Comment :<input type="text" name="comment" class="form-control" required ><br><br>
            <input type="submit" name="upload" value="Image Upload" class="btn btn-outline-primary" />
    </form>

<br /><br /><br /><br />
</div>
</div>
</body>
</html>
