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
    <!-- Page Header -->
    <header class="masthead" style="background-image:url('img/posts.jpg'">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Proga Passion</h1>
              <span class="subheading">A Programming Blog</span>
            </div>
          </div>
        </div>
      </div>
    </header>
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="post-preview">

        <h2 class="post-title">
          <?php echo $post['title']; ?>
        </h2>
        <p class="text-justify">
          <?php echo $post['body']; ?>
        </p>
      <p class="post-meta">Posted by
        <a href="#"><?php echo $post['author']; ?></a>
        <?php echo formatDate($post['date']); ?></p>
    </div>
    <hr>
<?php include 'include/footer.php'; ?>
