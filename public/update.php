<?php 

    require_once("connection.php");

    if(isset($_POST['update']))
    {
        $gataID = $_GET['ID'];
        $gataName = $_POST['gata-name'];
        $gataDes = $_POST['gata-des'];
       

        $query = " update gatagorey set name = '".$gataName."', des='".$gataDes."' where id='".$gataID."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:view.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
//update product
    else if(isset($_POST['updateProduct']))
    {
        $proID = $_GET['ID'];
        $proName = $_POST['pro-name'];
        $proDes = $_POST['pro-des'];
        $price = $_POST['price'];
        $gata = $_POST['gatagorey'];
        $image=$_FILES['image']['name'];

        $file_path="../public/upload/";
        $filePart=explode(".",$image);
        $ex=end($filePart);
        $file_ex=["png","jpg"];
        if(in_array($ex,$file_ex)){
            $newName=time().".".$ex;
            move_uploaded_file($_FILES["image"]["tmp_name"],$file_path.$newName);


        $query2="update product set prodName ='".$proName."', des='".$proDes."', price ='".$price."', image ='".$newName."',gataID='".$gata."' where id='".$proID."'";
        $result2=mysqli_query($con,$query2);

        if($result2)
        {
            header("location:view.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }

    }
   }


    else
    {
        header("location:view.php");
    }


?>