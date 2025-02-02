<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #eef2f7; /* Light background color */
			color: #333; /* Default text color */
			display: flex;
			flex-direction: column;
			align-items: center;
			padding: 20px;
			margin: 0;
		}

		h1 {
			color: #e74c3c; /* Red color for warning */
			margin-bottom: 20px;
		}

		.container {
			background-color: #ffffff; /* White background for the container */
			border-radius: 8px; /* Rounded corners */
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
			padding: 20px;
			width: 100%;
			max-width: 500px; /* Maximum width of the container */
			text-align: left; /* Left-align text */
		}

		h2 {
			color: #34495e; /* Dark blue for headings */
			margin: 10px 0; /* Margin for spacing */
		}

		.deleteBtn {
			margin-top: 20px; /* Space above the button */
			text-align: right; /* Align the button to the right */
		}

		input[type="submit"] {
			background-color: #e74c3c; /* Red color for the delete button */
			color: white; /* White text */
			border: none; /* No border */
			border-radius: 5px; /* Rounded corners for button */
			padding: 10px 20px; /* Padding for button */
			font-size: 16px; /* Font size for button text */
			cursor: pointer; /* Pointer cursor on hover */
			transition: background-color 0.3s ease; /* Smooth background color transition */
		}

		input[type="submit"]:hover {
			background-color: #c0392b; /* Darker red on hover */
		}
	</style>
<body>
	<?php $getProjectByID = getProjectByID($pdo, $_GET['project_id']); ?>
	<h1>Are you sure you want to delete this project?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Project Name: <?php echo $getProjectByID['project_name'] ?></h2>
		<h2>Genre: <?php echo $getProjectByID['genre'] ?></h2>
		<h2>Project Owner: <?php echo $getProjectByID['project_owner'] ?></h2>
		<h2>Date Added: <?php echo $getProjectByID['date_added'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">

			<form action="core/handleForms.php?project_id=<?php echo $_GET['project_id']; ?>&artist_id=<?php echo $_GET['artist_id']; ?>" method="POST">
				<input type="submit" name="deleteProjectBtn" value="Delete">
			</form>			
			
		</div>	

	</div>
</body>
</html>