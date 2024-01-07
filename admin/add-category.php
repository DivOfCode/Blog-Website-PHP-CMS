<?php
require_once 'conn.php';
$catname = $_POST['CatagoryName'];
if (isset($_POST['addCatagory'])) {
    $sql = "INSERT INTO category (category_name) VALUES('$catname')";
    $check = mysqli_query($con,$sql);

    if ($check) { ?>
        <script type="text/javascript">
            alert('Category Added Sucessfully!');
            window.location = 'view-category.php';
        </script>
   <?php     
    }else { ?>
        <script type="text/javascript">
            alert('Failed to add Category! Please Try Again!');
            window.location = 'add-category.php';
        </script>
   <?php }
}

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $catname = $_REQUEST['catname'];
}
if (isset($_POST['updateCatagory'])) {
    $catname = $_POST['CatagoryName'];
     $up_Id = $_POST['up-Id'];
     $sql = "UPDATE category SET category_name = '$catname' WHERE cat_id = '$up_Id'";
     $check = mysqli_query($con,$sql);
     if ($check) { ?>
        <script type="text/javascript">
            alert('Category Updated Sucessfully!');
            window.location = 'view-category.php';
        </script>
   <?php     
    }else { ?>
        <script type="text/javascript">
            alert('Failed to Update Category! Please Try Again!');
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
                         <a href="view-category.php" class="btn btn-info mb-5">View Categories</a>
                        </div>
                        </div>
                        <div class="row">

                        <div class="col-lg-12">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <lebel>Catagory Name</lebel>
                                        <input class="form-control" type="text" name="CatagoryName" placeholder="Catagory Name" id="CatagoryName" value="<?php if (!empty($catname)): ?>
                                            <?php echo $catname ?>
                                        <?php endif ?>" trim>
                                        <input type="hidden" name="up-Id" value="<?= $id ?>">
                                    </div>
                                    <div class="form-group">
                                        <?php if (!empty($_REQUEST['id'])) {?>
                                            <input class=" btn btn-info" type="submit" name="updateCatagory" value="Update Category" placeholder="Catagory Name" id="CatagoryName" width="100px" trim >
                                        <?php } else { ?>
                                        <input class=" btn btn-info" type="submit" name="addCatagory" value="Add Catagory" placeholder="Catagory Name" id="CatagoryName" width="100px">
                                    <?php } ?>
                                    </div>
                                </form>
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