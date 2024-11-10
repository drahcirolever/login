<?php  
require_once 'core/dbConfig.php';
require_once 'core/models.php'; 
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
        background-color: #f4f7fb; /* Soft background to reduce strain */
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 30px;
        margin: 0;
        min-height: 100vh;
        justify-content: center;
    }

    h1 {
        color: #2c3e50;
        font-size: 2.5em;
        font-weight: 600;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-container {
        background-color: #fff;
        border-radius: 12px; /* Softer rounded corners */
        padding: 30px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1); /* Deeper shadow for more contrast */
        width: 100%;
        max-width: 350px;
        text-align: left;
    }

    p {
        margin: 15px 0;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        font-size: 1.1em;
        color: #34495e;
    }

    input[type="text"],
    input[type="password"] {
        font-size: 1.1em;
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        border-radius: 8px; /* More rounded input fields */
        border: 1px solid #ccc;
        box-sizing: border-box;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.5); /* Focus effect for inputs */
        outline: none;
    }

    input[type="submit"] {
        font-size: 1.2em;
        padding: 12px;
        width: 100%;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        margin-top: 20px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #45a049; /* Darker green on hover */
    }

    .message {
        color: #e74c3c;
        font-size: 1.2em;
        margin-bottom: 20px;
        text-align: center;
    }
</style>

</head>
<body>
	<h1>Register here!</h1>
	<?php if (isset($_SESSION['message'])) { ?>
		<h1 style="color: red;"><?php echo $_SESSION['message']; ?></h1>
	<?php } unset($_SESSION['message']); ?>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="username">Username</label>
			<input type="text" name="username">
		</p>
		<p>
			<label for="username">Password</label>
			<input type="password" name="password">
			<input type="submit" name="registerUserBtn">
		</p>
	</form>
</body>
</html>