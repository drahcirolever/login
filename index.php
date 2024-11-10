<?php 
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fb; /* Lighter background for a softer feel */
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px 20px;
        margin: 0;
        min-height: 100vh;
        justify-content: center;
    }

    h1, h3 {
        color: #2c3e50;
        text-align: center;
    }

    h1 {
        font-size: 2.8em;
        margin-bottom: 20px; /* More breathing space below the heading */
        font-weight: 700;
    }

    h3 {
        font-size: 1.3em;
        margin-top: 15px;
        font-weight: 500;
    }

    a {
        color: #3498db;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #2980b9;
    }

    .message {
        color: #e74c3c;
        font-size: 1.3em;
        margin-bottom: 25px;
        text-align: center;
        font-weight: 600;
    }

    form {
        background-color: #fff;
        border-radius: 12px;
        padding: 30px;
        width: 100%;
        max-width: 500px;
        margin-top: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    form p {
        margin: 18px 0;
    }

    label {
        display: block;
        font-weight: 600;
        color: #34495e;
        margin-bottom: 12px;
    }

    input[type="text"],
    input[type="date"],
    input[type="submit"] {
        width: 100%;
        padding: 12px;
        font-size: 1.1em;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-top: 8px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #3498db;
        color: white;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
        padding: 12px 0;
        border: none;
    }

    input[type="submit"]:hover {
        background-color: #2980b9;
    }

    .container {
        width: 100%;
        max-width: 600px;
        background-color: #fff;
        border-radius: 12px;
        padding: 25px;
        margin-top: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .container h3 {
        margin: 12px 0;
        color: #34495e;
        font-weight: 500;
    }

    .editAndDelete {
        display: flex;
        gap: 20px;
        justify-content: flex-end;
    }

    .editAndDelete a {
        background-color: #3498db;
        color: white;
        border-radius: 8px;
        padding: 10px 15px;
        text-align: center;
        transition: background-color 0.3s ease;
        font-weight: 600;
    }

    .editAndDelete a:hover {
        background-color: #2980b9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px; /* More space above table */
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px; /* Increased padding for better readability */
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: 600;
    }

    .action-logs-container {
        width: 100%;
        max-width: 650px;
        background-color: #fff;
        border-radius: 12px;
        padding: 25px;
        margin-top: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .container, form, .action-logs-container {
            max-width: 100%;
            padding: 15px;
        }

        h1 {
            font-size: 2.2em;
        }

        h3 {
            font-size: 1.1em;
        }

        input[type="submit"] {
            padding: 10px 0;
        }
    }
</style>

</head>
<body>
	<?php if (isset($_SESSION['message'])) { ?>
		<h1 style="color: red;"><?php echo $_SESSION['message']; ?></h1>
	<?php } unset($_SESSION['message']); ?>



	<?php if (isset($_SESSION['username'])) { ?>
		<h1>Hello there!! <?php echo $_SESSION['username']; ?></h1>
		<a href="core/handleForms.php?logoutUser=1">Logout</a>
	<?php } else { echo "<h1>No user logged in</h1>";}?>

	<h3>Users List</h3>

    <ul>
		<?php $getAllUsers = getAllUsers($pdo); ?>
		<?php foreach ($getAllUsers as $row) { ?>
			<li>
				<a href="viewuser.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['username']; ?></a>
			</li>
		<?php } ?>
	</ul>

	<h1>Welcome To Artist Management System. Add new Artist!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastName">
		</p>
		<p>
			<label for="firstName">Gender</label> 
			<input type="text" name="gender">
		</p>
		<p>
			<label for="firstName">Date of Birth</label> 
			<input type="date" name="dateOfBirth">
		</p>
		<p>
			<label for="firstName">Specialization</label> 
			<input type="text" name="specialization">
			<input type="submit" name="insertArtistBtn">
		</p>
	</form>

	<?php $getAllArtist = getAllArtist($pdo); ?>
	<?php foreach ($getAllArtist as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>FirstName: <?php echo $row['first_name']; ?></h3>
		<h3>LastName: <?php echo $row['last_name']; ?></h3>
		<h3>Gender: <?php echo $row['gender']; ?></h3>
		<h3>Date Of Birth: <?php echo $row['date_of_birth']; ?></h3>
		<h3>Specialization: <?php echo $row['specialization']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>
		<h3>Added by: <?php echo $row['added_by']; ?></h3>
        <h3>Last Updated: <?php echo $row['last_updated']; ?></h3>
        <h3>Edited by: <?php echo $row['edited_by']; ?></h3>


		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewprojects.php?artist_id=<?php echo $row['artist_id']; ?>">View Projects</a>
			<a href="editartist.php?artist_id=<?php echo $row['artist_id']; ?>">Edit</a>
			<a href="deleteartist.php?artist_id=<?php echo $row['artist_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>

</body>
</html>
	