<?php
session_start();

if (!isset($_POST["token"]) || !isset($_SESSION["token"]) ) {
  exit("Token is not set!");
}

if ($_SESSION["token"]==$_POST["token"]) {
   if(isset($_FILES['fileupload'])){
      $errors= array();
      $file_name = $_FILES['fileupload']['name'];
      $file_size =$_FILES['fileupload']['size'];
      $file_tmp =$_FILES['fileupload']['tmp_name'];
      $file_type=$_FILES['fileupload']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['fileupload']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
}
   
?>