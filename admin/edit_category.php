<?php	$dashboard = '';
		$addpost = '';
		$addcategory = ''; ?>
<?php include 'includes/header.php'; ?>

<form method="post" action="edit_category.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Category">
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-default" value="Submit" />
  <a href="index.php" class="btn btn-default">Cancel</a>
  <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>
