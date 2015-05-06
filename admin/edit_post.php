<?php	$dashboard = '';
		$addpost = '';
		$addcategory = ''; ?>
<?php include 'includes/header.php'; ?>
<?php $db = new Database(); ?>
<?php 
	if (isset($_POST['update'])) {
		// Assign vars
		$id = mysqli_real_escape_string($db->link, $_POST['id']);
		$category = mysqli_real_escape_string($db->link, $_POST['category']);
		$title = mysqli_real_escape_string($db->link, $_POST['title']);
		$body = mysqli_real_escape_string($db->link, $_POST['body']);
		$author = mysqli_real_escape_string($db->link, $_POST['author']);
		$tags = mysqli_real_escape_string($db->link, $_POST['tags']);
		
		// Simple validation
		if ($title == '' || $body == '' || $category == '' || $author == '' ) {
			// Set error
			$error = 'Please fill out all required fields';
		} else {
			$query = "UPDATE posts
				SET category = $category,
					title = '$title',
					body = '$body',
					author = '$author',
					tags = '$tags'
				WHERE posts.id = $id;";
			
			$update_row = $db->update($query);
		}
	}
?>
<?php 
	if (isset($_POST['delete'])) {
		$id = mysqli_real_escape_string($db->link, $_POST['id']);		
		$query = "DELETE FROM `posts` WHERE id=$id";
		$delete_row = $db->delete($query);
	}
?>
<?php 
/*
 * Pull post info
 */
$id = (int) $_GET['id'];
$query = "SELECT * FROM `posts` WHERE id = $id";
$post = $db->select($query)->fetch_assoc();

/*
 * Pull Category info
 */
$query = "SELECT * FROM `categories`";
$categories = $db->select($query);
?>

<form method="post" action="edit_post.php">

  <input name="id" type="hidden" value="<?php echo $id ?>" />

  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" value="<?php echo $post['title'] ?>" />
  </div>
  
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control"><?php echo $post['body'] ?></textarea>
  </div>
  
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
    	<?php while ($category = $categories->fetch_assoc()) : ?>
  		<option 
  			<?php if ($category['id'] == $post['category']) echo 'selected '; ?>
  			value="<?php echo $category['id'] ?>">
  			<?php echo $category['name'] ?>
  		</option>
  		<?php endwhile; ?>
	</select>
  </div>
  
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" value="<?php echo $post['author'] ?>">
  </div>
  
    <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" value="<?php echo $post['tags'] ?>">
  </div>

  <div>
  <input name="update" type="submit" class="btn btn-default" value="Update" />
  <a href="index.php" class="btn btn-default">Cancel</a>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>
