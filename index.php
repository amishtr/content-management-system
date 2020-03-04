<?php 

include "includes/db.php"; 
include "includes/header.php"; 

?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php

                $query = "SELECT * FROM posts";

                $select_all_posts = mysqli_query($connection, $query);             
                    
                    $row = mysqli_fetch_assoc($select_all_posts);

                    while($row = mysqli_fetch_assoc($select_all_posts)) {
                        $post_title = $row['post_title'];          
                        $post_author = $row['post_author']; 
                        $post_date = $row['post_date']; 
                        $post_image = $row['post_image']; 
                        $post_content = $row['post_content'];    
                        
            ?>


                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>   

                <?php } ?>     
                            
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>
