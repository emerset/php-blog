<?php	$dashboard = '';
		$addpost = '';
		$addcategory = ' active'; ?>
<?php include 'includes/header.php'; ?>
<?php $db = new Database(); ?>
<?php 
	if (isset($_POST['submit'])) {
		// Assign vars
		$category = mysqli_real_escape_string($db->link, $_POST['name']);
		
		// Simple validation
		if ($category == '') {
			// Set error
			$error = 'Please fill out category name';
		} else {
			$query = "INSERT INTO categories(name)
				VALUES ('$category')";
			
			$insert_row = $db->insert($query);
		}
	}
?>

<form method="post" action="add_category.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Category">
  </div>
  <div>
  <button name="submit" type="submit" class="btn btn-default">Submit</button>
  <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>
