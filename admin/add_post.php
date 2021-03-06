<?php include 'include/header.php'; ?>
<?php
$db=new Database();
if(isset($_POST['submit'])){
  $title=mysqli_real_escape_string($db->link, $_POST['title']);
  $body=mysqli_real_escape_string($db->link, $_POST['body']);
  $category=mysqli_real_escape_string($db->link, $_POST['category']);
  $author=mysqli_real_escape_string($db->link, $_POST['author']);
  $tags=mysqli_real_escape_string($db->link, $_POST['tags']);
  //query
  $query="INSERT into posts(title,body,category,author,tags)
  VALUES('$title','$body','$category','$author','$tags')";
  $insert_row=$db->insert($query);
}
 //Running queries
$query="SELECT * FROM categories";
$categories=$db->select($query);
 ?>
<!-- Navigation -->

  <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="add_post.php">Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_category.php">Add Category</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
   <li><a class="nav-link" href="http://localhost/progapassion/index.php"> Visit Blog </a></li>
 </ul>
    </div>
  </nav>
  <!-- Main -->
  <div class="container">
  <form method="POST" action="add_post.php">
<div class="form-group">
</br>
  <label>Post Title</label>
  <input type="text" name="title" class="form-control"  placeholder="Enter the title of the post">
</div>
<div class="form-group">
  <label for="postbody">Post Body</label>
<textarea class="form-control" name="body" placeholder="Enter the content of the post "></textarea>
</div>
<div class="form-group">
  <label>Category</label>
<select name="category" class="form-control">
 <?php while ($row=$categories->fetch_assoc()):?>
   <option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></option>
<?php endwhile; ?>
</select>
</div>
<div class="form-group">
  <label>Author</label>
  <input type="text" name="author" class="form-control"  placeholder="Enter the Author of the post">
</div>
<div class="form-group">
  <label>Tags</label>
  <input type="text" name="tags" class="form-control"  placeholder="Enter the tags for the post">
</div>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
<a  class="btn btn-primary" href="index.php">Cancel</a>
</form>
</div>
<?php include 'include/footer.php'; ?>
