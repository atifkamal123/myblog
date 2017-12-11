<?php
session_start();
include_once("db.php");


if (isset($_GET['logout']) && $_GET['logout']==1) {
    $_SESSION['logged_in']=0;
    session_destroy();
    header('location:index.php');
}
if($_SESSION['logged_in']!=1){
    header('location:login.php');
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blog</title>
    </head>
    <body>
        <?php

            require_once("nbbc/nbbc.php");

            $bbcode = new BBCode;
            $user_id= $_SESSION['id'];
            $sql = "select * from posts1 where user_id='$user_id'";

            $res_select = mysqli_query($db,$sql) or die(mysqli_error());
            $posts1 ="";
            if(mysqli_num_rows($res_select) > 0 )
            {
                while($row = mysqli_fetch_assoc($res_select)){
                    $id = $row['id'];
                     $title = $row['title'];
                      $content = $row['content'];
                       $date = $row['date'];
                       ?>

                       <div><a href='del_post.php?pid=<?php echo $id; ?>'>Delete</a>&nbsp;<a href='edit_post.php?pid=<?php echo $id; ?>'>Edit</a></div>
                       
                       <div><h2><a href='view_post.php?pid=$id'>$title</a></h2><h3>$date</h3><p><?php echo $output; ?></p><?php echo $admin; ?> <hr></div>
                       <?php
                        
                }
                

            }else{
                echo"there are no posts to display!";
            }
        ?>
        <a  href="post.php">Post</a>
        
    </body>
</html>