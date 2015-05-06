<?php	$dashboard = '';
		$addpost = '';
		$addcategory = ''; ?>
<?php include 'includes/header.php'; ?>
<?php $db = new Database(); ?>
<?php 
	if (isset($_POST['update'])) {
		// Assign var
		$id = mysqli_real_escape_string($db->link, $_POST['id']);
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		
		// Simple validation
		if ($name == '') {
			// Set error
			$error = 'Please fill out category field';
		} else {
			$query = "UPDATE categories
					SET name = '$name'
					WHERE id =$id";
			
			$update_row = $db->update($query);
		}
	}
?>
<?php 
	if (isset($_POST['delete'])) {
		$id = mysqli_real_escape_string($db->link, $_POST['id']);		
		$query = "DELETE FROM `categories` WHERE id=$id";
		$delete_row = $db->delete($query);
	}
?>
<?php 
/*
 * Pull Category
 */
$id = (int) $_GET['id'];
$query = "SELECT * FROM `categories` WHERE id = $id";
$category = $db->select($query)->fetch_assoc();
?>

<form method="post" action="edit_category.php">

  <input name="id" type="hidden" value="<?php echo $id ?>" />
  
  <div class="form-group">
    <label>Category Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $category['name'] ?>" />
  </div>
  <div>
  <input name="update" type="submit" class="btn btn-default" value="Update" />
  <a href="index.php" class="btn btn-default">Cancel</a>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>
