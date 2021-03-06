<?php include 'config/config.php'; ?>
<?php include 'library/database.php'; ?>
<?php include'helpers/format_helper.php' ?>
<?php $db= new database();
$query="SELECT * FROM categories";
 $categories=$db->select($query);?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Proga Passion - A Programming Blog</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-secondary" id="mainNav">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item dropdown">
      <a class=" nav-link dropdown-toggle" data-toggle="dropdown" href="#">Categories</a>
      <ul class="dropdown-menu">
        <?php if($categories): ?>
          <?php while ($row=$categories->fetch_assoc()):?>
        <li><a href="post.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
      <?php endwhile; ?>
    <?php else : ?>
<p>There are no categories yet</p>
<?php endif; ?>
      </ul>
    </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</br>
</br>
<?php
//Object of Databse
$db=new Database();
if(isset($_GET['category'])){
  $category=$_GET['category'];
  $query="SELECT * FROM posts where category= ".$category;
   $posts=$db->select($query);
 } else {
   $query="SELECT * FROM posts";
    $posts=$db->select($query);
 }
 //Running queries
 $query="SELECT * FROM categories";
  $categories=$db->select($query);
?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <div class="post-preview">
        <?php if($posts): ?>
          <?php while ($row = $posts->fetch_assoc()): ?>
        <a href="posts.php?id=<?php echo urlencode($row['id']);?>">
          <h2 class="post-title">
            <?php echo $row['title']; ?>
          </h2>
          <h3 class="post-subtitle text-justify">
            <?php echo shortenText($row['body']); ?>
          </h3>
        </a>
        <p class="post-meta">Posted by
          <a href="about.php"><?php echo $row['author']; ?></a>
          <?php echo formatDate($row['date']);?></p>
        <?php endwhile;?>
        <?php else: ?>
        <p>There are no Posts Yet</p>
        <?php endif;?>
      </div>
      <hr>


<?php include 'include/footer.php'; ?>
