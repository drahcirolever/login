<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
	<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fb; /* Lighter background for a more neutral feel */
        color: #4a4a4a; /* Dark gray for better readability */
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px 20px; /* More spacious padding */
        margin: 0;
    }

    h1 {
        color: #e74c3c; /* Bold red for emphasis */
        margin-bottom: 30px; /* Larger space below the heading */
        font-size: 28px; /* Slightly larger font size for more impact */
        font-weight: 600; /* Slightly bolder heading */
    }

    .container {
        background-color: #ffffff; /* Clean white background */
        border-radius: 12px; /* Softer rounded corners */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Enhanced shadow for depth */
        padding: 30px;
        width: 100%;
        max-width: 600px; /* Increased max width for better spacing */
        text-align: left;
    }

    h2 {
        color: #34495e; /* Muted dark blue for subheadings */
        margin: 15px 0; /* Adjusted margin for balance */
        font-size: 22px; /* Slightly larger for subheadings */
        font-weight: 500; /* Medium weight for readability */
    }

    .deleteBtn {
        margin-top: 25px; /* More space above the button */
        text-align: center; /* Center-align the button for symmetry */
    }

    input[type="submit"] {
        background-color: #e74c3c; /* Bold red */
        color: white; /* White text */
        border: none;
        border-radius: 8px; /* Rounded corners for the button */
        padding: 12px 25px; /* More padding for a larger button */
        font-size: 18px; /* Larger text for better visibility */
        font-weight: 600; /* Bold text for emphasis */
        cursor: pointer; /* Pointer cursor for interaction */
        transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transitions */
    }

    input[type="submit"]:hover {
        background-color: #c0392b; /* Darker red on hover */
        transform: translateY(-2px); /* Slight elevation effect */
    }

    input[type="submit"]:active {
        transform: translateY(1px); /* Button presses down when clicked */
    }
</style>

	</style>
</head>
<body>
	<h1>Are you sure you want to delete this Artist?</h1>
	<?php $getArtistByID = getArtistByID($pdo, $_GET['artist_id']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>FirstName: <?php echo $getArtistByID['first_name']; ?></h2>
		<h2>LastName: <?php echo $getArtistByID['last_name']; ?></h2>
        <h2>Gender: <?php echo $getArtistByID['gender']; ?></h2>
		<h2>Date Of Birth: <?php echo $getArtistByID['date_of_birth']; ?></h2>
		<h2>Specialization: <?php echo $getArtistByID['specialization']; ?></h2>
		<h2>Date Added: <?php echo $getArtistByID['date_added']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?artist_id=<?php echo $_GET['artist_id']; ?>&artist_id=<?php echo $_GET['artist_id']; ?>" method="POST">
				<input type="submit" name="deleteArtistBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>