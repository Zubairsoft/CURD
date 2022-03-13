<?php
require_once('connection.php');
if(isset($_GET['Del']))
         {
             $gataId = $_GET['Del'];
             $query = " delete from gatagorey where id = '".$gataId."'"; // this query for delete record from table gatagorey
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

else if(isset($_GET['DelID']))
        {
            $proId=$_GET['DelID'];
            $query2 = " delete from product where id = '".$proId."'";// this query for delete record from table product
            $result2 = mysqli_query($con,$query2);
            if($result2)
            {
                header("location:view.php");
            }
            else
            {
                echo ' Please Check Your Query ';
            }
        }
         else
         {
             header("location:view.php");
         }

         ?>