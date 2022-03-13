<?php
   require_once("connection.php");//For connection database
   $query = " select * from gatagorey ";//Query to select all data about gatagorey
   $query2 = " select * from product ";//Query to select all data about products
   $result = mysqli_query($con,$query);
   $result2 = mysqli_query($con,$query2);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>View Records</title>
</head>
<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <!--for display gatagorey inside the table-->
                        <table class="table table-bordered">
                            <h1 class="text-white bg-success p-2 ">Gatagorey</h1>
                            <tr>
                                <th>  ID </th>
                                <th> Gatagorey Name </th>
                                <th> description </th>
                                <th> Edit  </th>
                                <th> Delete </th>
                            </tr>

                            <?php 
                                    //Display gatagory from database
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $gataID = $row['id'];// this coulmn name from database
                                        $gataName = $row['name'];
                                        $gataDes = $row['des'];
                                     
                            ?>
                                    <tr>
                                        <td><?php echo $gataID ?></td>
                                        <td><?php echo $gataName ?></td>
                                        <td><?php echo $gataDes ?></td>
                                        <td><a href="edit.php?GetID=<?php echo $gataID ?>">Edit</a></td>
                                        <td><a href="delete.php?Del=<?php echo $gataID ?>">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
       
        <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                         <!--for display products inside the table-->
                        <table class="table table-bordered">
                            <h1 class="text-white bg-success p-2 ">products</h1>
                            <tr>
                                <th>  ID </th>
                                <th> product Name </th>
                                <th> gatagorey </th>
                                <th> description </th>
                                <th> price </th>
                                <th> image </th>
                                <th> Edit  </th>
                                <th> Delete </th>
                            </tr>

                            <?php 
                                    
                                    //Display products from database
                                    while($row=mysqli_fetch_assoc($result2))
                                    {
                                        $proID = $row['id'];// this coulmn name from database
                                        $proName = $row['prodName'];
                                        $proDes = $row['des'];
                                        $price = $row['price'];
                                        $proImage = $row['image'];
                                        $gata=$row['gataID'];
                                        
                                     
                            ?>
                                    <tr>
                                        <td><?php echo $proID ?></td>
                                        <td><?php echo $proName ?></td>
                                        <td><?php echo $gata ?></td>
                                        <td><?php echo $proDes ?></td>
                                        <td><?php echo $price ?></td>
                                        <td><img src="../public/upload/<?php echo $proImage ?>" alt="" height=50px width=50px ></td>
                                        <td><a href="edit-pro.php?GetID=<?php echo $proID ?>">Edit</a></td>
                                        <td><a href="delete.php?DelID=<?php echo $proID ?>">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
