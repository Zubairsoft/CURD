<?php 
  require_once("connection.php");
// This  insert for gatagory
  if(isset($_POST['submit']))
  {
      if(empty($_POST['gata-name']) || empty($_POST['gata-des']) ) // For make sure that post value is not empty
      {
          echo ' Please Fill in the Blanks ';
      }
      else
      {
          $gataName = $_POST['gata-name'];
          $gataDes = $_POST['gata-des'];
         

          $query = " insert into gatagorey (name,des) values('$gataName','$gataDes')";// Query for insert value to gatagory table gatagorey
          $result = mysqli_query($con,$query);

          if($result)
          {
              header("location:view.php"); // If true redirct to view.php
          }
          else
          {
              echo '  Please Check Your Query '; // meagge if query error
          }
      }
  }
  

  // This  insert for products 
  
 else if(isset($_POST['pro']))
  {
      if(empty($_POST['pro-name']) || empty($_POST['pro-des']) || empty($_POST['price']) || empty($_POST['gatagorey']) )// For make sure that post value is not empty
      {
          echo " Please Fill in the Blanks";
      }
      else
      {



          $proName = $_POST['pro-name'];
          $proDes = $_POST['pro-des'];
          $proPrice = $_POST['price'];
          $proGata = $_POST['gatagorey'];
          $proImage=$_FILES['image']['name'];

          $file_path="../public/upload/";  // Path that will storge the image
          $filePart=explode(".",$proImage);
          $ex=end($filePart);
          $file_ex=["png","jpg"]; // extintion of images
          if(in_array($ex,$file_ex)){
              $newName=time().".".$ex; // for change name of image
              move_uploaded_file($_FILES["image"]["tmp_name"],$file_path.$newName);

         

          $query = " insert into product (prodName,price,des,image,gataID) values('$proName','$proPrice','$proDes','$newName','$proGata')";//Query for insert values to product table
          $result = mysqli_query($con,$query);
       

          if($result)//check query 
          {
              header("location:view.php");// If true redirct to view.php
          }
          else
          {
              echo '  Please Check Your Query '; // if false message 
          }
      }
    }
  }
  else
  {
      header("location:index.php"); // if not requst redirct to index.php
  }
?>