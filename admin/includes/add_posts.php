<?php

    if(isset($_POST['create_post'])) {

        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];
        
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('Y-m-d');
        $post_comment_count = 4;

        // Saves the file in temporary location on server
        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO `posts` (`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`)"; 

        $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(),'{$post_image}','{$post_content}','{$post_tags}', {$post_comment_count}, '{$post_status}') ";

        $insert_post = mysqli_query($connection, $query); 

        confirmQuery($insert_post);
    }
?>

<form action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" name="post_title" class="form-control" id="" aria-describedby="" placeholder="Enter post title">
  </div>

  <div class="form-group">
    <label for="post_category_id">Post Category</label>
    <select name="post_category_id" id="post_category_id" class="form-control">
            <?php
                // Fetch category name
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query); 

                confirmQuery($select_categories);

                while($row = mysqli_fetch_assoc($select_categories)) {

                    $cat_id = $row['cat_id'];    
                    $cat_title = $row['cat_title'];                    
                    
                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                    //echo $cat_id;
                }                                                      
            ?>                
        </select>    
  </div>

  <div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" name="post_author" class="form-control" id="" aria-describedby="" placeholder="Enter post author">
  </div>

  <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" name="post_status" class="form-control" id="" aria-describedby="" placeholder="Enter post status">
  </div>

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="post_image">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" name="post_tags" class="form-control" id="" aria-describedby="" placeholder="Enter post tags">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea name="post_content" class="form-control" id="" rows="5" cols="30" aria-describedby="" placeholder="Enter post content"></textarea>
  </div>
  
  <input type="submit" name="create_post" class="btn btn-primary" value="Publish Post">

</form>