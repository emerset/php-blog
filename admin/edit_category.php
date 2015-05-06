<?php	$dashboard = '';
		$addpost = '';
		$addcategory = ''; ?>
<?php include 'includes/header.php'; ?>

<?php 
/*
 * Pull Category
 */
$id = (int) $_GET['id'];
$db = new Database();
$query = "SELECT * FROM `categories` WHERE id = $id";
$category = $db->select($query)->fetch_assoc();
?>

<form method="post" action="edit_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $category['name'] ?>" />
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-default" value="Submit" />
  <a href="index.php" class="btn btn-default">Cancel</a>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>
