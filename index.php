<?php
session_start();

$_SESSION["token"] = bin2hex(random_bytes(32));
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
Select image to upload:
<input type="hidden" value="<?=$_SESSION["token"]?>" name="token" >
<input type="file" name="fileupload" >
<input type="submit"  name="submit">
</form>
