<?php  
require_once 'core/models.php'; 
require_once 'core/dbConfig.php'; 
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
        background-color: #f4f7fb; /* Softer background for less strain */
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0;
        padding: 30px; /* More padding for breathing room */
        min-height: 100vh;
        justify-content: center; /* Vertically centered content */
    }

    h1 {
        color: #2c3e50;
        font-size: 2.5em;
        font-weight: 700;
        margin-bottom: 20px;
        text-align: center;
    }

    form {
        background-color: #fff;
        border-radius: 12px; /* Softer rounded corners */
        padding: 30px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1); /* Stronger shadow for better depth */
        width: 100%;
        max-width: 350px; /* Increased form width */
        text-align: left; /* Align form text to the left for readability */
    }

    p {
        margin: 15px 0;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        font-size: 1.1em;
        color: #34495e; /* Darker color for labels */
    }

    input[type="text"],
    input[type="password"] {
        font-size: 1.1em;
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        border-radius: 8px; /* More rounded input fields */
        border: 1px solid #ddd;
        box-sizing: border-box;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.5); /* Highlight input field on focus */
        outline: none;
    }

    input[type="submit"] {
        font-size: 1.2em;
        padding: 12px;
        width: 100%;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 8px; /* Rounded button */
        cursor: pointer;
        margin-top: 20px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #45a049; /* Slightly darker green on hover */
    }

    a {
        color: #4CAF50;
        font-weight: bold;
        text-decoration: none;
        margin-top: 10px;
        display: inline-block;
    }

    a:hover {
        text-decoration: underline;
    }

    .message {
        color: red;
        font-size: 1.2em;
        margin-bottom: 20px;
        text-align: center;
    }

</style>

</head>
<body>
	<?php if (isset($_SESSION['message'])) { ?>
		<h1 style="color: red;"><?php echo $_SESSION['message']; ?></h1>
	<?php } unset($_SESSION['message']); ?>
	<h1>Login Now!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="username">Username</label>
			<input type="text" name="username">
		</p>
		<p>
			<label for="username">Password</label>
			<input type="password" name="password">
			<input type="submit" name="loginUserBtn">
		</p>
	</form>
	<p>Don't have an account? You may register <a href="register.php">here</a></p>
</body>
</html>