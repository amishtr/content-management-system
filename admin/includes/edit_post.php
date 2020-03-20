<?php

if(isset($_GET['p_id'])) {
    $get_post_id = $_GET['p_id'];


    $query = "SELECT * FROM posts";
    $select_posts_by_id = mysqli_query($connection, $query); 

    while($row = mysqli_fetch_assoc($select_posts_by_id)) {

        $post_id = $row['post_id'];    
        $post_author = $row['post_author']; 
        $post_title = $row['post_title']; 
        $post_category = $row['post_category_id']; 
        $post_status = $row['post_status']; 
        $post_image = $row['post_image']; 
        $post_content = $row['post_content']; 
        $post_tags = $row['post_tags']; 
        $post_comment_count = $row['post_comment_count']; 
        $post_date = $row['post_date']; 
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="post_title">Post Title</label>
    <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control" id="" aria-describedby="" placeholder="Enter post title">
  </div>

  <div class="form-group">
    <label for="post_category_id">Post Category Id</label>
    <input value="<?php echo $post_category; ?>" type="text" name="post_category_id" class="form-control" id="" aria-describedby="" placeholder="Enter post category id">
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
    <label for="post_image">Post Image</label>
    <input type="file" name="post_image">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control" id="" aria-describedby="" placeholder="Enter post tags">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea name="post_content" class="form-control" id="" rows="5" cols="30" aria-describedby="" placeholder="Enter post content">
        <?php echo $post_content; ?>
    </textarea>
  </div>
  
  <input type="submit" name="create_post" class="btn btn-primary" value="Edit Post">

</form>