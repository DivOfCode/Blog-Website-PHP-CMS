<?php

require_once 'conn.php';
$sql = "SELECT * FROM blogs";
$check = mysqli_query($con,$sql);



if (isset($_REQUEST['d_Id'])) {
    $del_id = $_REQUEST['d_Id'];
    $sql = "DELETE FROM blogs WHERE blog_id = '$del_id'";
    $check = mysqli_query($con,$sql);
    if ($check) { ?>
        <script type="text/javascript">
            alert('Blog Deleted Sucessfully!');
            window.location = 'view-blogs.php';
        </script>
        <?php     
    }else { ?>
        <script type="text/javascript">
            alert('Failed to Delete blog! Please Try Again!');
            window.location = 'view-blogs.php';
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
                                        <li class="list-inline-item">Blogs</li>
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
                        <div class="col-6"><h3 class="title-3">Blogs</h3></div> 
                        <div class="col-6 text-right">                       
                         <a href="add-blog.php" class="btn btn-info mb-5">Add New Blog</a>
                     </div>
                 </div>
                 <div class="row">

                    <div class="col-lg-12">
                        <div class="table-responsive table--no-card m-b-30">
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

                                                <td><a href="add-blog.php?id=<?=$result['blog_id']?>" ><i class="fas fa-edit text-info"></i></a></td>

                                                <td><a href="view-blogs.php?d_Id=<?=$result['blog_id']?>"><i class="far fa-trash-alt text-danger"></i></a></td>
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