<?php

require_once 'conn.php';
$sqlb = "SELECT * FROM blogs order by blog_id desc";
$checkb = mysqli_query($con,$sqlb);

$sqlc = "SELECT * FROM category order by cat_id desc";
$checkc = mysqli_query($con,$sqlc);

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
                                        <li class="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END BREADCRUMB-->

        <!-- STATISTIC-->
        <section class="statistic">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item">
                                <h2 class="number">10,368</h2>
                                <span class="desc">members online</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item">
                                <h2 class="number">388,688</h2>
                                <span class="desc">items sold</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item">
                                <h2 class="number">1,086</h2>
                                <span class="desc">this week</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END STATISTIC-->


        <section>
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive table--no-card m-b-30">
                                <h2 class="mb-3">Recent Blogs</h2>
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Blog Id</th>
                                        <th>Tittle</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Uploaded On</th>
                                    </tr>
                                </thead>
                                     <tbody>
                                    <?php
                                    if (mysqli_num_rows($checkb)>0) {
                                        $i = 1;
                                        while ($result = mysqli_fetch_assoc($checkb)){ ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$result['blog_id']?></td>
                                                <td><?= substr($result['title'], 0, 50) . '...' ?> </td>
                                                <td style="white-space: normal; word-break: break-word;">
                                                    <?= substr($result['description'], 0, 50) . '...' ?>  
                                                </td>
                                                <td> <img src="<?=$result['image']?>"width="200px"> </td>
                                                <td><?=$result['category']?></td>
                                                <td><?php  if ($result['status'] = 1) {
                                                    echo "Active";
                                                }else{
                                                    echo "Inactive";
                                                }?></td>
                                                <td><?=$result['date']?></td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="10" class="text-center">No Blogs Found! please add Blogs</td>
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
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive table--no-card m-b-30">
                                <h2 class="mb-3">All Category</h2>
                                <table class="table table-borderless table-striped table-earning">
                                  <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category Id</th>
                                                <th>Category name</th>
                                            </tr>
                                        </thead>
                                     <tbody>
                                            <?php
                                                if (mysqli_num_rows($checkc)>0) {
                                                    $i = 1;
                                                    while ($result = mysqli_fetch_assoc($checkc)){ ?>
                                                        <tr>
                                                            <td><?=$i++?></td>
                                                            <td><?=$result['cat_id']?></td>
                                                            <td><?=$result['category_name']?></td>
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