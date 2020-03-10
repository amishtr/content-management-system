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
                        <?php 

                        $cat_error = "";
                        if(isset($_POST['submit'])) {

                           $cat_title = $_POST['cat_title'];
                           
                           if($cat_title == "" || empty($cat_title)) {
                               $cat_error =  "The field can not be empty.";
                           } else {
                               $query = "INSERT INTO categories (cat_title)"; 
                               $query .= "VALUES('{$cat_title}') ";

                               $insert_categories = mysqli_query($connection, $query); 

                               if(!$insert_categories) {
                                   die('QUERY FAILED!' . mysqli_error($connection));
                               }
                           }
                        }
                        ?>

                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input class="form-control" type="text" name= "cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name= "submit" value="Add Category">
                                </div>    
                                <div class="form-group">
                                     <?php echo $cat_error; ?> 
                                </div>                            
                            </form>
                        </div><!-- Add Category Form -->

                        <div class="col-xs-6">                    
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="active">
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php    
                                // To select all the categories and display them
                                $query = "SELECT * FROM categories";
                                $select_categories = mysqli_query($connection, $query); 

                                while($row = mysqli_fetch_assoc($select_categories)) {

                                    $cat_id = $row['cat_id'];    
                                    $cat_title = $row['cat_title'];    
                                    
                                    echo '<tr class="">';
                                    echo "<td>{$cat_id}</td>";   
                                    echo "<td>{$cat_title}</td>"; 
                                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "</tr>";
                                } 
                                ?>                                   
                                
                                <?php
                                   // Delete a category(s)
                                   if(isset($_GET['delete'])) {

                                        $get_cat_id = $_GET['delete'];
                                        $get_delete_category = "";                                      

                                            $query = "DELETE FROM categories WHERE cat_id = '{$get_cat_id}'";
                                            $delete_category = mysqli_query($connection, $query);                                        
                                            header("Location: categories.php");
                                        
                                   }                               
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
    
