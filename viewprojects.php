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
        background-color: #f4f7fa;
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

    a {
        color: #3498db;
        text-decoration: none;
        margin: 15px;
        font-size: 1.1em;
    }

    a:hover {
        color: #2980b9;
        text-decoration: underline;
    }

    form {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 30px;
        width: 100%;
        max-width: 400px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        text-align: left;
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
    input[type="submit"] {
        font-size: 1.1em;
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        border-radius: 8px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="submit"]:hover {
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
    }

    input[type="submit"] {
        background-color: #3498db;
        color: white;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
        border: none;
    }

    input[type="submit"]:hover {
        background-color: #2980b9;
    }

    table {
        width: 100%;
        margin-top: 50px;
        border-collapse: collapse;
        background-color: #ffffff;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .action-links a {
        color: #3498db;
        margin-right: 12px;
        text-decoration: none;
        font-weight: bold;
    }

    .action-links a:hover {
        color: #2980b9;
        text-decoration: underline;
    }
</style>

</head>
<body>
	<a href="index.php">Return to home</a>
	<?php $getAllInfoByArtistID = getAllInfoByArtistID($pdo, $_GET['artist_id']); ?>
	<h1>Artist: <?php echo $getAllInfoByArtistID['first_name']; ?>
    <?php echo $getAllInfoByArtistID['last_name']; ?></h1>
	<h1>Add New Project</h1>
	<form action="core/handleForms.php?artist_id=<?php echo $_GET['artist_id']; ?>" method="POST">
		<p>
			<label for="firstName">Project Name</label> 
			<input type="text" name="projectName">
		</p>
		<p>
			<label for="firstName">Genre</label> 
			<input type="text" name="genre">
			<input type="submit" name="insertNewProjectBtn">
		</p>
	</form>

    <table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Project ID</th>
	    <th>Project Name</th>
	    <th>genre</th>
	    <th>Project Artist</th>
	    <th>Date Added</th>
		<th>Added by</th>
	    <th>Action</th>
	  </tr>
	  <?php $getProjectsByArtist = getProjectsByArtist($pdo, $_GET['artist_id']); ?>
	  <?php foreach ($getProjectsByArtist as $row) { ?>
	  <tr>
	  	<td><?php echo $row['project_id']; ?></td>	  	
	  	<td><?php echo $row['project_name']; ?></td>	  	
	  	<td><?php echo $row['genre']; ?></td>	  	
	  	<td><?php echo $row['project_owner']; ?></td>	  	
	  	<td><?php echo $row['date_added']; ?></td>
		<td><?php echo $row['added_by']; ?></td>
	  	<td>
	  		<a href="editproject.php?project_id=<?php echo $row['project_id']; ?>&artist_id=<?php echo $_GET['artist_id']; ?>">Edit</a>

	  		<a href="deleteproject.php?project_id=<?php echo $row['project_id']; ?>&artist_id=<?php echo $_GET['artist_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>