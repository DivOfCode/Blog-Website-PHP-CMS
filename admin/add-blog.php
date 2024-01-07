<?php
require_once 'conn.php';
$sql = "SELECT * FROM category";
$check = mysqli_query($con, $sql);


if (isset($_POST['add_blog'])) {
    $title = $_POST['blog_title'];
    $description = $_POST['description'];
    $catagory = $_POST['catagory']; 
    $blog_author = $_POST['blog_author'];
    $blog_img_name = $_FILES['blog_img']['name'];
    $blog_img_temp = $_FILES['blog_img']['tmp_name']; 
    $destination = 'upload/' . $blog_img_name; 
    $status = 1;
    move_uploaded_file($blog_img_temp, $destination);


    $sql = "INSERT INTO blogs (title,description,image,category,author,status) VALUES('$title','$description','$destination','$catagory','$blog_author','$status')";
    $check = mysqli_query($con, $sql);
    if ($check) {
      if ($check) { ?>
        <script type="text/javascript">
            alert('Blog Uploaded Sucessfully!');
            window.location = 'view-blogs.php';
        </script>
        <?php     
    }else { ?>
        <script type="text/javascript">
            alert('Failed to Upload Blog! Please Try Again!');
            window.location = 'add-blogs.php';
        </script>
    <?php }
}
}


if (isset($_REQUEST['id'])) {
    $blog_id = $_REQUEST['id'];
    $sql = "SELECT * FROM blogs where blog_id = '$blog_id' ";
    $check = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($check);
}

if (isset($_POST['update_blog'])) {
    $upid = $_POST['upid'];
    $title = $_POST['blog_title'];
    $description = $_POST['description'];
    $catagory = $_POST['catagory']; 
    $blog_author = $_POST['blog_author'];
    $status = 1;
    if (!empty($_FILES['blog_img']['name'])) {
    $blog_img_name = $_FILES['blog_img']['name'];
    $blog_img_temp = $_FILES['blog_img']['tmp_name']; 
    $destination = 'upload/' . $blog_img_name; 
    echo $destination;
    move_uploaded_file($blog_img_temp, $destination);
    $query = "UPDATE blogs SET title='$title', description='$description', category='$catagory', author='$blog_author', image='$destination', status='$status' WHERE blog_id='$upid'";
    $check = mysqli_query($con,$query);
        if ($check) {
      if ($check) { ?>
        <script type="text/javascript">
            alert('Blog Updated Sucessfully!');
            window.location = 'view-blogs.php';
        </script>
        <?php     
    }else { ?>
        <script type="text/javascript">
            alert('Failed to Update Blog! Please Try Again!');
            window.location = 'add-blogs.php';
        </script>
    <?php }
}

    }else {

    $upid = $_POST['upid'];
    $title = $_POST['blog_title'];
    $description = $_POST['description'];
    $catagory = $_POST['catagory']; 
    $blog_author = $_POST['blog_author'];
    $status = 1;
    $query = "UPDATE blogs SET title='$title', description='$description', category='$catagory', author='$blog_author', status='$status' WHERE blog_id='$upid'";
    $check = mysqli_query($con,$query);
        if ($check) {
      if ($check) { ?>
        <script type="text/javascript">
            alert('Blog Updated Sucessfully!');
            window.location = 'view-blogs.php';
        </script>
        <?php     
    }else { ?>
        <script type="text/javascript">
            alert('Failed to Update Blog! Please Try Again!');
            window.location = 'add-blogs.php';
        </script>
    <?php }
}

}
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
    <title>Dashboard </title>
    <?php include 'links.php';?>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

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
                                        <li class="list-inline-item">Add Blogs</li>
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
                        <div class="col-6"><h3 class="title-3">Add Blogs</h3></div> 
                        <div class="col-6 text-right">                       
                         <a href="view-Blogs.php" class="btn btn-info mb-5">View Blogs</a>
                     </div>
                 </div>
                 <div class="row">

                    <div class="col-lg-12">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <lebel>Blog Tittle</lebel>
                                <input class="form-control" type="text" name="blog_title" placeholder="Blog Title" id="blog_title" value="<?=$result['title']?? ''?>" required>

                            </div>
                            <input type="hidden" value="<?= $blog_id ?>" name="upid">
                            <div class="form-group">
                                <lebel>Description</lebel>
                                <textarea class="form-control" id="editor1" placeholder="Write Something Intresting....."  name="description" rows="5" required value=""><?=$result['description']?? "";?></textarea>
                                <script>
                                 CKEDITOR.replace('editor1');
                             </script>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                    <select class="custom-select custom-select-md mb-3" name="catagory">
                                      <option selected>Select Category</option>
                                      <?php 
                                      if (mysqli_num_rows($check) > 0) {
                                       while ($data = mysqli_fetch_assoc($check)) 
                                        { ?>
                                            <option value="<?=$data['category_name'];?>"
                                                <?php
                                                if ($data['category_name'] == $result['category']) {
                                                    echo "selected";
                                                }
                                            ?>>
                                             <?=$data['category_name'];?>
                                            </option>

                                        <?php } 
                                    } else {
                                         { ?>
                                            <option value="<?=$data['category_name'];?>">
                                             <?=$data['category_name'];?>
                                            </option>

                                        <?php } 
                                    } ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <input class="form-control" type="text" name="blog_author" placeholder="Blog Author" id="blog_author" value="<?=$result['author']?? ""?>" required> 

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input blogFile" id="blogFile" name='blog_img'>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                         <img class="image-flued mb-5" src="<?=$result['image']?? ""?>" name="image" width="400px">
                    </div>
                    <?php if (!empty($blog_id)) { ?>
                      <input class=" btn btn-info" type="submit" name="update_blog" value="Update Blog" placeholder="Update Blog" id="update_Blog" width="100px">
                  <?php }else { ?>
                     <input class=" btn btn-info" type="submit" name="add_blog" value="Add Blog" placeholder="Add Blog" id="add_blog" width="100px">
                 <?php }?> 

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
