<?php include 'include/header.php'; ?>

<?php
//Create Database
$db=new Database;
//Create Query
$query="SELECT  posts.* , categories.name from posts Inner join categories
on posts.category = categories.id
ORDER by posts.id desc";
//Run Query
$posts=$db->select($query);

$query="SELECT * FROM categories order by name desc";
 $categories=$db->select($query);

 ?>

    <!-- Navigation -->

    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Dashboard</a>
          </li>
          <li class="nav-item">
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

    <!-- Main Content -->
<div class="container">
    <table class="table table-hover">
      <tr >
 <th >POST ID</th>
   <th >POST TITLE</th>
     <th >CATEGORY</th>
       <th >AUTHOR</th>
       <th>DATE</th>
     </tr>
     <?php while($row=$posts->fetch_assoc()): ?>
      <tr >
 <td ><?php echo $row['id']; ?></td>
<td ><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
<td ><?php echo $row['name']; ?></td>
<td ><?php echo $row['author']; ?></td>
<td ><?php echo formatDate($row['date']); ?></td>
      </tr>
    <?php endwhile;?>
    </table>
</div>
<div class="container">
    <table class="table table-hover">
      <tr >
 <th >CATEGORY ID</th>
   <th >CATEGORY NAME</th>
     </tr>
     <?php while($row=$categories->fetch_assoc()): ?>
      <tr >
 <td ><?php echo $row['id']; ?></td>
<td ><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
      </tr>
    <?php endwhile; ?>

    </table>
</div>
<?php include 'include/footer.php'; ?>
