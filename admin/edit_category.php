<?php include 'include/header.php'; ?>
<?php
$id=$_GET['id'];
$db=new Database();
//Running queries
$query="SELECT * FROM categories Where id=".$id;
 $category=$db->select($query)->fetch_assoc();
 ?>
 <?php
 $db=new Database();
 if(isset($_POST['submit'])){
   $name=mysqli_real_escape_string($db->link, $_POST['name']);
   //query
   $query="UPDATE categories
   SET
   name='$name'
   WHERE id=".$id;
   $insert_row=$db->update($query);
 }
  ?>
  <?php
if(isset($_POST['delete'])){
  $query="DELETE from categories where id=".$id;
  $delete_row=$db->delete($query);
}
?>
<!-- Navigation -->
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Dashboard</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="add_post.php">Add Post</a>
          </li>
          <li class="nav-item active">
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
    <form method="POST" action="edit_category.php?id=<?php echo $id;?>">
  <div class="form-group">
  </br>
    <label>Category Name</label>
    <input type="text" name="name" class="form-control"  value="<?php echo $category['name'];?>">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <a  class="btn btn-primary" href="index.php">Cancel</a>
  <button type="submit" name="delete" class="btn btn-danger">Delete</button>

</form>
</div>
<?php include 'include/footer.php'; ?>
