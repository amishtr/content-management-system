<form action="" method="POST">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>

        <?php    
            // To display category title in edit category text box from $_GET[] method
            if(isset($_GET['edit'])) {
            
                $edit_cat = $_GET['edit'];     
                    
                $query = "SELECT * FROM categories WHERE cat_id = $edit_cat ";
                $edit_category = mysqli_query($connection, $query); 

                while($row = mysqli_fetch_assoc($edit_category)) {

                    $cat_id = $row['cat_id'];    
                    $cat_title = $row['cat_title'];                                         
        ?>

        <input value="<?php if(isset($cat_title)) { echo $cat_title;} ?>" class="form-control" type="text" id="cat_title" name= "cat_title">

        <?php
                }
            }
        ?>

        <?php 
            // Update the selected Id's category                                 
            if(isset($_POST['update_category'])) {

                $update_cat_title = $_POST['cat_title'];     

                $query = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE cat_id = '{$cat_id}'";
                $update_category = mysqli_query($connection, $query);                                        
                header("Location: categories.php");
                
                if(!$update_category) {
                    die("QUERY FAILED!" . mysqli_error($connection));
                }
            }
        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" id="update_category" name= "update_category" value="Update Category">
    </div>    
</form>