<?php
//AUTHOR: suzukikijai22
   if(isset($_FILES['resume'])){

      $errors= array();
      $file_name = $_FILES['resume']['name'];
      $file_name = $_FILES['resume']['name'];
      $file_size =$_FILES['resume']['size'];
      $file_tmp =$_FILES['resume']['tmp_name'];
      $file_type=$_FILES['resume']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['resume']['name'])));
   

      $expensions= array("pdf","doc","docx","rtf");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a valid resume/CV format file.";
      }
      
      if($file_size > 20971520){
         $errors[]='File size must be excately 20 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"resume/".$file_name);
         $pythonX3 = `pdf2txt.py "/var/www/html/Untitled Folder/pdfminer/resume/$file_name"`;
         echo nl2br($pythonX3);
      }else{
         print_r($errors);
      }
   }

?>