<?php 

    require_once("connection.php");
    $proID = $_GET['GetID'];
    $query = " select * from product where id='".$proID."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $proID = $row['id']; //
        $proName = $row['prodName'];
        $proDes = $row['des'];
        $gata = $row['gataID']; //
        $price = $row['price'];
        $image = $row['image'];
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>Document</title>
</head>
<body class="bg-dark">
<!-- this form for update products -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> Update </h3>
                        </div>
                        <div class="card-body">

                            <form action="update.php?ID=<?php echo $proID ?>" method="post"   enctype="multipart/form-data"  >
                                <input type="text" class="form-control mb-2" placeholder=" product name "  name="pro-name"  value="<?php echo $proName ?>">
                                <input type="text" class="form-control mb-2" placeholder=" description " name="pro-des" value="<?php echo $proDes ?>">
                                <select  name="gatagorey" id="" class="form-select mb-2">
                                   <?php 

                                   $query2="select * from gatagorey ";
                                   $result2=mysqli_query($con,$query2);
                                   while($row2=mysqli_fetch_assoc($result2))
                                   {
                                       $gataID=$row2['id'];
                                       $gataName=$row2['name'];
                                       if($gata==$gataID){
                                        echo "<option selected  value='$gata'>".$gataName."</option>";
                                       }
                                       else {
                                      
                                       echo "<option value='$gataID'>".$gataName."</option>";


                                   
                                   }
                                }

                                   ?>
                                 

                                </select>
                                <input type="text" class="form-control mb-2" placeholder=" price "  name="price" value="<?php echo $price ?>">
                                <input type="file" class="form-control mb-2" placeholder=" image "  name="image"  value="<?php echo $image ?>">
                                <button class="btn btn-primary" name="updateProduct">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>