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

                    <?php

                        if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = "";
                        }

                        switch($source) {

                            case 'add_posts';
                            include "includes/add_posts.php";
                            break;

                            case '100';
                            echo "Wrong case 100!";
                            break;

                            case '200';
                            echo "Wrong case 200!";
                            break;

                            default:
                            include "includes/view_all_posts.php";
                            
                        }
                    ?>

                    
                    
                                  
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>


