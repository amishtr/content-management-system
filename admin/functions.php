<?php 

function confirmQuery($result) {

    global $connection;
    
    if(!$result) {
        die('QUERY FAILED! ' . mysqli_error($connection));

    } else {

        return $result;
    }
}

$cat_error = "";

function insert_categories() {

    global $connection;  
    $cat_error = "";

    if(isset($_POST['submit'])) {

        $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)) {
            $cat_error =  "The field can not be empty.";
            //return $cat_error;
        } else {
            $query = "INSERT INTO categories (cat_title)"; 
            $query .= "VALUES('{$cat_title}') ";

            $insert_categories = mysqli_query($connection, $query); 

            if(!$insert_categories) {
                die('QUERY FAILED!' . mysqli_error($connection));
            }
        }
    }
}

function selectAllCategories() {

    global $connection; 

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query); 

    while($row = mysqli_fetch_assoc($select_categories)) {

        $cat_id = $row['cat_id'];    
        $cat_title = $row['cat_title'];    
        
        echo "<tr>";
        echo "<td class='text-center'>{$cat_id}</td>";   
        echo "<td class='text-center'>{$cat_title}</td>"; 
        echo "<td class='text-center'><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td class='text-center'><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    } 
}

function deleteCategories() {

    global $connection; 

    if(isset($_GET['delete'])) {

        $get_cat_id = $_GET['delete'];                                                                          

            $query = "DELETE FROM categories WHERE cat_id = '{$get_cat_id}'";
            $delete_category = mysqli_query($connection, $query);                                        
            header("Location: categories.php");                                        
    } 
}

?>