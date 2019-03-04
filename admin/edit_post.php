<?php include 'include/header.php'; ?>
<?php
$id=$_GET['id'];
$db=new Database();
//Running queries
$query="SELECT * FROM posts Where id=".$id;
 $post=$db->select($query)->fetch_assoc();
 //Running queries
 $query="SELECT * FROM categories";
  $categories=$db->select($query);
 ?>
 <?php
 $db=new Database();
 if(isset($_POST['submit'])){
   $title=mysqli_real_escape_string($db->link, $_POST['title']);
   $body=mysqli_real_escape_string($db->link, $_POST['body']);
   $category=mysqli_real_escape_string($db->link, $_POST['category']);
   $author=mysqli_real_escape_string($db->link, $_POST['author']);
   $tags=mysqli_real_escape_string($db->link, $_POST['tags']);
   //query
   $query="UPDATE posts
   SET
   title='$title',
   body='$body',
   category='$category',
   author='$author',
   tags='$tags'
   WHERE id=".$id;
   $update_row=$db->update($query);
 }
  ?>
  <?php
  if(isset($_POST['delete'])){
    $query="DELETE from
    posts WHERE id=".$id;
    $delete_row=$db->delete($query);
  } ?>

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
  <form role="form" method="post" action="edit_post.php?id=<?php echo $id;?>">
<div class="form-group">
</br>
  <label>Post Title</label>
  <input type="text" name="title" class="form-control"  value="<?php echo $post['title'];?>">
</div>
<div class="form-group">
  <label for="postbody">Post Body</label>
<textarea class="form-control" rows="10" cols="10" name="body"><?php echo $post['body'];?></textarea>
</div>
<div class="form-group">
  <label>Category</label>
    <select name="category" class="form-control">
      <?php while ($row=$categories->fetch_assoc()): ?>
    <?php if($row['id']==$post['category']){
      $selected='selected';
    }else{
      $selected='';
    } ?>
      <option value="<?php echo $row['id']; ?>" <?php echo $selected ;?>><?php echo $row['name']; ?></option>
    <?php endwhile; ?>
    </select>
</div>
<div class="form-group">
  <label>Author</label>
  <input type="text"name="author" class="form-control"  value="<?php echo $post['author'];?>">
</div>
<div class="form-group">
  <label>Tags</label>
  <input type="text" name="tags" class="form-control"  value="<?php echo $post['tags'];?>">
</div>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
<a  class="btn btn-primary" href="index.php">Cancel</a>
<button type="submit" name="delete" class="btn btn-danger">Delete</button>
</form>
</div>
<?php include 'include/footer.php'; ?>
