<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
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
        background-color: #f4f7fa;
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0;
        padding: 40px 20px; /* Increased padding for a more open design */
        min-height: 100vh;
        justify-content: center; /* Center the content vertically */
    }

    h1 {
        color: #2c3e50;
        font-size: 2.5em;
        font-weight: 700;
        margin-bottom: 25px; /* More breathing room */
        text-align: center;
    }

    form {
        background-color: #ffffff;
        border-radius: 12px; /* Rounded corners for a softer look */
        padding: 25px;
        width: 100%;
        max-width: 450px; /* Increased width for better input visibility */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        display: flex;
        flex-direction: column; /* Align form elements vertically */
    }

    form p {
        margin: 15px 0;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #34495e;
        font-size: 1.1em;
    }

    input[type="text"],
    input[type="date"] {
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        border: 1px solid #ccc;
        border-radius: 8px; /* Increased radius for more rounded edges */
        box-sizing: border-box; /* Ensure padding is included in width */
        font-size: 1em;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="date"]:focus {
        border-color: #3498db; /* Blue border on focus for clarity */
        outline: none;
    }

    input[type="submit"] {
        width: 100%;
        padding: 12px;
        margin-top: 15px;
        background-color: #3498db;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 8px; /* Rounded corners for the button */
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 1.1em;
    }

    input[type="submit"]:hover {
        background-color: #2980b9; /* Darker blue on hover */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        h1 {
            font-size: 2em;
        }

        form {
            padding: 20px;
        }
    }
</style>

</head>
<body>
	<?php $getArtistByID = getArtistByID($pdo, $_GET['artist_id']); ?>
	<h1>Edit the Artist!</h1>
	<form action="core/handleForms.php?artist_id=<?php echo $_GET['artist_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getArtistByID['first_name']; ?>">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getArtistByID['last_name']; ?>">
		</p>
		<p>
			<label for="firstName">Gender</label> 
			<input type="text" name="gender" value="<?php echo $getArtistByID['gender']; ?>">
		</p>
		<p>
			<label for="firstName">Date of Birth</label> 
			<input type="date" name="dateOfBirth" value="<?php echo $getArtistByID['date_of_birth']; ?>">
		</p>
		<p>
			<label for="firstName">Specialization</label> 
			<input type="text" name="specialization" value="<?php echo $getArtistByID['specialization']; ?>">
			<input type="submit" name="editArtistBtn">
		</p>
	</form>
</body>
</html>