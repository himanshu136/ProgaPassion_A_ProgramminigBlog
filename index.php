<?php include 'include/header.php'; ?>
<?php  $db= new database();
$query="SELECT * FROM posts order by id desc";
 $posts=$db->select($query);
 //Running queries
 $query="SELECT * FROM categories";
  $categories=$db->select($query);
?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
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

    <!-- Main Content -->
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
          <!-- Pager -->
        </div>
      </div>
    </div>
  <?php include 'include/footer.php'; ?>
