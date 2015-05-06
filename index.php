<?php include 'includes/header.php'; ?>

<?php 
	// Create DB Object
	$db = new Database();
	
	// Create Posts Query
	$query = "SELECT * FROM `posts`";
	// Run Query
	$posts = $db->select($query);
	
	// Create Categories Query
	$query = "SELECT * FROM `categories`";
	// Run Query
	$categories = $db->select($query);
?>
<?php if ($posts) : ?>
	<?php while ($post = $posts->fetch_assoc()) : ?>
		<div class="blog-post">
			<h2 class="blog-post-title"><?php echo $post['title'] ?></h2>
			<p class="blog-post-meta"><?php echo formatDate($post['date']); ?> by <a href="#"><?php echo $post['author']?></a></p>
				<?php echo shortenText($post['body']); ?>
			<a class="readmore" href="post.php?id=<?php echo urldecode($post['id']); ?>">Read More</a>
		</div><!-- /.blog-post -->
    <?php endwhile ?>
		  
<?php else : ?>
	<p>There are no posts yet</p>
<?php endif; ?>
<?php include 'includes/footer.php' ?>
