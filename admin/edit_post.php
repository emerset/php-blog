<?php	$dashboard = '';
		$addpost = '';
		$addcategory = ''; ?>
<?php include 'includes/header.php'; ?>
<?php 
/*
 * Pull post info
 */
$id = (int) $_GET['id'];
$db = new Database();
$query = "SELECT * FROM `posts` WHERE id = $id";
$post = $db->select($query)->fetch_assoc();

/*
 * Pull Category info
 */
$query = "SELECT * FROM `categories`";
$categories = $db->select($query);
?>

<form method="post" action="edit_post.php">
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
  		<option <?php if ($category['id'] == $post['category']) echo 'selected '; ?>value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
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
  <input name="submit" type="submit" class="btn btn-default" value="Submit" />
  <a href="index.php" class="btn btn-default">Cancel</a>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>
