<?php	$dashboard = '';
		$addpost = ' active';
		$addcategory = ''; ?>
<?php include 'includes/header.php'; ?>
<?php $db = new Database(); ?>
<?php 
	if (isset($_POST['submit'])) {
		// Assign vars
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
			$query = "INSERT INTO posts(category, title, body, author, tags)
				VALUES ($category, '$title', '$body', '$author', '$tags')";
			
			$insert_row = $db->insert($query);
		}
	}
?>
<?php 
/*
 * Pull category table
 */
$query = "SELECT * FROM categories";
$categories = $db->select($query);
?>

<form method="post" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post Body"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
    	<?php while ($category = $categories->fetch_assoc()) : ?>
  		<option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
  		<?php endwhile; ?>
	</select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author Name">
  </div>
    <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
  </div>

  <div>
  <button name="submit" type="submit" class="btn btn-default">Submit</button>
  <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>
