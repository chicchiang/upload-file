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
      
      $file_type=explode('.',$file_name);
      if(is_array($file_type)){
         $file_type=end($file_type);
      }
      $file_ext=strtolower($file_type);
      
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
         header('HTTP/1.0 403 Forbidden');
         print_r($errors);
      }
   }
}
   
?>