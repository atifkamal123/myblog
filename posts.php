<?php
// connecting to host
mysqli_connect("localhost", "root","", "blog"); // replace this with your data
 // database name here

// lets build a blog
if(isset($_GET['posts'])){
$posts = $_GET['posts'];

// first of all we will check string length
if(strlen($posts) > 11){ // if post id is bigger than 11 charachters
die('Blog post nof found.');
}
// now we will make sure that the post id is numeric and this is a nice security method
if(is_numeric($posts)){ // is numeric allows numbers only
$posts = (int)$posts; // and the int function, which replace every string to its correspoing number

// for the tutorial im gonna add mysql_real_escape_string but is not really needed in this case
$posts = mysqli_real_escape_string($posts); // final sqli defense

// final part
$query = mysqli_query("SELECT title FROM posts WHERE id=$posts LIMIT 1"); 
while($row = mysqli_fetch_assoc($query)){
echo $row['title'];
}

}
else{ // if post is not numeric then
die('Blog post nof found.'); // post does not exist
}

}
else{
// if post is not submitted display them all
$query = mysqli_query("SELECT title, id FROM posts ORDER BY id DESC"); 
while($row = mysqli_fetch_assoc($query)){
$title =  $row['title'];
$id =  $row['id'];
echo '<a href="?posts='.$id.'">'.$title.'</a><br>';
}

}
?>