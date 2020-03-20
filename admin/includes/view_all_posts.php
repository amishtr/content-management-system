<table class="table table-bordered table-hover">
                        <thead>
                            <tr class="active">
                                <th class='text-center'>Id</th>
                                <th class='text-center'>Author</th>
                                <th class='text-center'>Title</th>
                                <th class='text-center'>Category</th>
                                <th class='text-center'>Status</th>
                                <th class='text-center'>Image</th>
                                <th class='text-center'>Tags</th>
                                <th class='text-center'>Comments</th>
                                <th class='text-center'>Date</th>
                                <th class='text-center'></th>
                                <th class='text-center'></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $query = "SELECT * FROM posts";
                                $select_posts = mysqli_query($connection, $query); 
                            
                                while($row = mysqli_fetch_assoc($select_posts)) {
                            
                                    $post_id = $row['post_id'];    
                                    $post_author = $row['post_author']; 
                                    $post_title = $row['post_title']; 
                                    $post_category = $row['post_category_id']; 
                                    $post_status = $row['post_status']; 
                                    $post_image = $row['post_image'];                                     
                                    $post_tags = $row['post_tags']; 
                                    $post_comments = $row['post_comment_count']; 
                                    $post_date = $row['post_date'];                                                      
                       
                                    echo "<tr>";
                                    echo "<td class='text-center'>{$post_id}</td>";   
                                    echo "<td class='text-center'>{$post_author}</td>"; 
                                    echo "<td class='text-center'>{$post_title}</td>"; 
                                    echo "<td class='text-center'>{$post_category}</td>"; 
                                    echo "<td class='text-center'>{$post_status}</td>"; 
                                    echo "<td class='text-center'><img width='100px' src='../images/$post_image' alt='image'></td>"; 
                                    echo "<td class='text-center'>{$post_tags}</td>"; 
                                    echo "<td class='text-center'>{$post_comments}</td>"; 
                                    echo "<td class='text-center'>{$post_date}</td>"; 
                                    echo "<td class='text-center'><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</td>";
                                    echo "<td class='text-center'><a href='posts.php?delete={$post_id}'>Delete</td>"; 
                                    echo "</tr>";
                                }     
                            ?>                                              
                        </tbody>
                    </table>

                    <?php
                        // Delete the post depending on id
                        if(isset($_GET['delete'])) {

                            $delete_post_id = $_GET['delete'];

                            $query = "DELETE FROM posts WHERE post_id = {$delete_post_id}";
                            $delete_query = mysqli_query($connection, $query);

                        }
                    ?>