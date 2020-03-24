<?php

  // Retrieve all the post's information depending on the post_id
  if(isset($_GET['p_id'])) {

      $get_post_id = $_GET['p_id'];

      $query = "SELECT * FROM posts WHERE post_id = $get_post_id";
      $select_posts_by_id = mysqli_query($connection, $query); 

      while($row = mysqli_fetch_assoc($select_posts_by_id)) {
          $post_id = $row['post_id'];    
          $post_author = $row['post_author']; 
          $post_title = $row['post_title']; 
          $post_category = $row['post_category_id']; 
          $post_status = $row['post_status']; 
          $post_image = $row['post_image']; 
          $post_content = trim($row['post_content']); 
          $post_tags = $row['post_tags']; 
          $post_comment_count = $row['post_comment_count']; 
          $post_date = $row['post_date']; 
      }
  }

  // Update the selected post when the update Post button is pressed
  if(isset($_POST['update_post'])) {
      
          $post_title = $_POST['post_title']; 
          $post_category_id = $_POST['post_category_id']; 
          $post_author = $_POST['post_author'];               
          $post_status = $_POST['post_status'];          
          $post_image = $_FILES['post_image']['name'];
          $post_image_temp = $_FILES['post_image']['tmp_name'];
          $post_tags = $_POST['post_tags'];
          $post_content = $_POST['post_content'];

          // Saves the file in temporary location on server
          move_uploaded_file($post_image_temp, "../images/$post_image");   

          if(empty($post_image)) {            

            $image_query = "SELECT post_image FROM categories WHERE post_id = $get_post_id";
            $select_image = mysqli_query($connection, $query); 

            confirmQuery($select_image);

            while($row = mysqli_fetch_array($select_image)) {

              $post_image = $row['post_image'];  
               
            }              
          }
         
          $query = "UPDATE posts SET ";
          $query .= "post_title = '$post_title', ";
          $query .= "post_category_id = '$post_category_id', ";
          $query .= "post_date = now(), ";
          $query .= "post_author = '$post_author', ";
          $query .= "post_status = '$post_status', ";
          $query .= "post_tags = '$post_tags', ";
          $query .= "post_content = '$post_content', ";
          $query .= "post_image = '$post_image' ";
          $query .= "WHERE post_id = '$post_id' "; 
          
          $update_post = mysqli_query($connection, $query);

          //confirmQuery($update_post);      

          if(!$update_post) {
            die('QUERY FAILED! ' . mysqli_error($connection));
            //die($query);
          }
  }

?>

<form action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="post_title">Post Title</label>
    <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control" id="" aria-describedby="" placeholder="Enter post title">
  </div>

    <div class="form-group">
        <label for="post_category_id">Post Category</label><br>
        <select name="post_category_id" id="post_category_id" class="form-control">
            <?php

                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query); 

                confirmQuery($select_categories);

                while($row = mysqli_fetch_assoc($select_categories)) {

                    $cat_id = $row['cat_id'];    
                    $cat_title = $row['cat_title'];

                    echo "<option value='{$cat_id}'>{$cat_title}</option>";   
                }       
            ?>                
        </select>   
    </div>

  <div class="form-group">
    <label for="post_author">Post Author</label>
    <input value="<?php echo $post_author; ?>" type="text" name="post_author" class="form-control" id="" aria-describedby="">
  </div>

  <div class="form-group">
    <label for="post_status">Post Status</label>
    <input value="<?php echo $post_status; ?>" type="text" name="post_status" class="form-control" id="" aria-describedby="" placeholder="Enter post status">
  </div>

  <div class="form-group">
    <img src="../images/<?php echo $post_image; ?>" width="100"><br><br> 
    <!-- <label for="post_image">Post Image</label> -->
    <input type="file" name="post_image"> 
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control" id="" aria-describedby="" placeholder="Enter post tags">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea name="post_content" class="form-control" id="" rows="5" cols="30" aria-describedby="" placeholder="Enter post content"><?php echo $post_content; ?></textarea>
  </div>
  
  <input type="submit" name="update_post" class="btn btn-primary" value="Update Post">

</form>