<?php
require_once("connection.php"); // For connection to database
$query="select * from gatagorey  "; // Query to select all data about gatagorey table
$result=mysqli_query($con,$query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="css/bootstrap.css">
    <title> Gatagorey</title>
</head>
<body class="bg-dark">

        <div class="container">
            <!-- add gatagorey -->
            <div class="row">
                <div class="col-lg-6  col-md-6 ">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> add Gatagorey</h3>
                        </div>
                        <div class="card-body">

                            <form action="insert.php" method="post">
                                <input type="text" class="form-control mb-2" placeholder=" gatagory Name " name="gata-name">
                                <input type="text" class="form-control mb-2" placeholder=" description " name="gata-des">
                            
                                <button class="btn btn-primary" name="submit">save</button>
                            </form>

                        </div>
                    </div>
                </div>
            
          <!--add products-->
                <div class="col-lg-6 col-md-6 ">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> add product</h3>
                        </div>
                        <div class="card-body">

                            <form action="insert.php" method="post"  enctype="multipart/form-data">
                                <input type="text" class="form-control mb-2" placeholder=" product Name " name="pro-name">
                                <input type="text" class="form-control mb-2" placeholder=" description " name="pro-des">
                                <select  name="gatagorey" id="" class="form-select mb-2">
                                   <?php while($row=mysqli_fetch_assoc($result)){
                                    $gataID= $row['id'];
                                    $gataName=$row['name'];
                                  

                                    echo "<option value='$gataID'>".$gataName."</option>";
                                  

                                   }?>
                                 

                                </select>
                               
                                <input type="number" class="form-control mb-2" placeholder="price" name="price">
                                <input type="file" class="form-control mb-2" placeholder=" select image " name="image">

                            
                                <button class="btn btn-primary" name="pro">save</button>
                            </form>

                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    
</body>
</html>

