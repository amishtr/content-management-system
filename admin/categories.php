<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>   
                    
                    <!-- Add Category Form -->
                    <div class="col-xs-6">
                        <?php insert_categories($cat_error); ?>

                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input class="form-control" type="text" name= "cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name= "submit" value="Add Category">
                            </div>    
                            <div class="form-group">
                                  <!-- does not work!  <?php echo $cat_error; ?> -->
                            </div>                            
                        </form><br>

                        <?php 
                            // Update and include query
                            if(isset($_GET['edit'])) {

                                $cat_id = $_GET['edit'];

                                include "includes/update_categories.php";
                            }                        
                        ?>

                    </div><!-- Add Category Form -->

                    <div class="col-xs-6">                    
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="active">
                                    <th class='text-center'>Id</th>
                                    <th class='text-center'>Category Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php    
                                // To select all the categories and display them
                                selectAllCategories();
                            ?>                                   
                            
                            <?php
                                // Delete category(s)
                                deleteCategories();
                            ?>
                            </tbody>
                        </table>                                                                         
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>


