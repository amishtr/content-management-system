<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="POST">
    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form> <!-- search form -->
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">                   
                <?php
                    $query = "SELECT * FROM categories LIMIT 6";

                    $select_categories = mysqli_query($connection, $query); 

                    if($select_categories) {
                            
                        $row = mysqli_fetch_assoc($select_categories);

                        while($row = mysqli_fetch_assoc($select_categories)) {
                            $cat_title = $row['cat_title'];     
                            echo "<li><a href='#'>{$cat_title}</a></li>";   
                        }
                    }                           
                ?>                             
            </ul>
        </div>       
    </div> 
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include "includes/widget.php"; ?>

</div>