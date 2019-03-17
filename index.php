<head>
    <link rel="stylesheet" href="styles/main.css">
    <title>Gallery Managment</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<video autoplay muted loop id="myVideo">
  <source src="mov_bbb.mp4" type="video/mp4">
  <source src="mov_bbb.ogg" type="video/ogg">
</video>

<div class="content">

<center> 
    <div class="topnav">
     <div class="search-container">
    <form action="index.php" method="post">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name="submit">Submit</button>
    </form>
      </div>
    </div>
<a class="button" href="insert.php">insert</a>
<button class="button button4"><a href="view.php">view</a></button>
</center>


<h3><center>welcome to database management project. in this project me and my team will show you online gallery management.<br>thank you fo coming here<center></h3>
<h1><left>
<canvas id="canvas" width="400" height="400"
style="background-color:#333">
</canvas>
</left></h1>
<center>

<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
  <!-- <b>Serach Result</b> -->
<tr>
  <th><strong>Name</strong></th>
  <th><strong>Picture</strong></th>
  <th><strong>Comment</strong></th>
  <th><strong>Edit</strong></th>
  <th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
  <?php
require('db.php');
if (isset($_POST['submit'])) {
  $name = $_POST['search'];

  $sel_query = "Select * from new_record where name = '$name'";
    $result = mysqli_query($con,$sel_query);

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
<?php


}?>
</tbody>
</table>

</center>

</div>







<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>


<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>


</body>
</html>