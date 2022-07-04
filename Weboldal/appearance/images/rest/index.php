<!DOCTYPE html>
<html>
<body>
<center>
<?php
$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "png") {
  echo "Sorry, only PNG files are allowed.";
  $uploadOk = 0;
}

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  $namer = generateRandomString();
  $temp = explode(".", $_FILES["fileToUpload"]["name"]);
  $newfilename = round(microtime(true)) . '.' . end($temp);
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "./" . $namer.".png");
	echo '<img src="'.$namer.'.png" style="width: 150xp;">';
	echo "<h4>Fájl neve:</h4> <h2>".$namer.".png</h2>";
}
?>
<form action="index.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
</center>

</body>
</html>