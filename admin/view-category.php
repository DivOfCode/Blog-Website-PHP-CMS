<?php

require_once 'conn.php';
$sql = "SELECT * FROM category";
$check = mysqli_query($con,$sql);

if (isset($_REQUEST['d_Id'])) {
    $del_id = $_REQUEST['d_Id'];
    $sql = "DELETE FROM category WHERE cat_id = '$del_id'";
    $check = mysqli_query($con,$sql);
    if ($check) { ?>
        <script type="text/javascript">
            alert('Category Deleted Sucessfully!');
            window.location = 'view-category.php';
        </script>
   <?php     
    }else { ?>
        <script type="text/javascript">
            alert('Failed to Delete Category! Please Try Again!');
            window.location = 'view-category.php';
        </script>
   <?php }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard 2</title>

   <?php include 'links.php';?>

</head>

<body class="animsition">
    <div class="page-wrapper">
       

    <?php include 'header.php'; ?>

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Category</li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->


            <section>
                <div class="section__content section__content--p30 mt-5">
                    <div class="container-fluid">
                        
                        <div class="row d-flex justify-content-center"> 
                        <div class="col-6"><h3 class="title-3">Categories</h3></div> 
                        <div class="col-6 text-right">                       
                         <a href="add-category.php" class="btn btn-info mb-5">add new category</a>
                        </div>
                        </div>
                        <div class="row">

                        <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category Id</th>
                                                <th>Category name</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if (mysqli_num_rows($check)>0) {
                                                    $i = 1;
                                                    while ($result = mysqli_fetch_assoc($check)){ ?>
                                                        <tr>
                                                            <td><?=$i++?></td>
                                                            <td><?=$result['cat_id']?></td>
                                                            <td><?=$result['category_name']?></td>

                                                            <td><a href="add-category.php?id=<?=$result['cat_id']?>&catname=<?=$result['category_name']?>" ><i class="fas fa-edit text-info"></i></a></td>

                                                            <td><a href="view-category.php?d_Id=<?=$result['cat_id']?>"><i class="far fa-trash-alt text-danger"></i></a></td>
                                                        </tr>
                                                <?php }
                                                } else { ?>
                                                        <tr>
                                                            <td colspan="5" class="text-center">No Categories Found! please add Categories</td>
                                                        </tr>
                                                <?php } ?>
                                            <tr></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                               <p>Copyright © 2024 Div-Of-Code. All rights reserved. Template by <a href="https://divofcode.com">divofcode</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

  <?php include 'footer.php';?>