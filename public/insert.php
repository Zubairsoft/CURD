<?php 
  require_once("connection.php");
// This  insert for gatagory
  if(isset($_POST['submit']))
  {
      if(empty($_POST['gata-name']) || empty($_POST['gata-des']) )
      {
          echo ' Please Fill in the Blanks ';
      }
      else
      {
          $gataName = $_POST['gata-name'];
          $gataDes = $_POST['gata-des'];
         

          $query = " insert into gatagorey (name,des) values('$gataName','$gataDes')";
          $result = mysqli_query($con,$query);

          if($result)
          {
              header("location:view.php");
          }
          else
          {
              echo '  Please Check Your Query ';
          }
      }
  }
  

  // This  insert for products 
  
 else if(isset($_POST['pro']))
  {
      if(empty($_POST['pro-name']) || empty($_POST['pro-des']) || empty($_POST['price']) || empty($_POST['gatagorey']) )
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

          $file_path="../public/upload/";
          $filePart=explode(".",$proImage);
          $ex=end($filePart);
          $file_ex=["pdf","dox","rar","png","jpg"];
          if(in_array($ex,$file_ex)){
              $newName=time().".".$ex;
              move_uploaded_file($_FILES["image"]["tmp_name"],$file_path.$newName);

         

          $query = " insert into product (prodName,price,des,image,gataID) values('$proName','$proPrice','$proDes','$newName','$proGata')";
          $result = mysqli_query($con,$query);
       



          
          
          

          if($result)
          {
              header("location:view.php");
          }
          else
          {
              echo '  Please Check Your Query ';
          }
      }
    }
  }
  else
  {
      header("location:product.php");
  }
?>