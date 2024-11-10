<?php  

require_once 'dbConfig.php';

function insertNewUser($pdo, $username, $password) {

	$checkUserSql = "SELECT * FROM user_passwords WHERE username = ?";
	$checkUserSqlStmt = $pdo->prepare($checkUserSql);
	$checkUserSqlStmt->execute([$username]);

	if ($checkUserSqlStmt->rowCount() == 0) {

		$sql = "INSERT INTO user_passwords (username, password) VALUES(?,?)";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$username, $password]);

		if ($executeQuery) {
			$_SESSION['message'] = "User successfully inserted";
			return true;
		}

		else {
			$_SESSION['message'] = "An error occured from the query";
		}

	}
	else {
		$_SESSION['message'] = "User already exists";
	}

	
}

function loginUser($pdo, $username, $password) {
	$sql = "SELECT * FROM user_passwords WHERE username=?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$username]); 

	if ($stmt->rowCount() == 1) {
		$userInfoRow = $stmt->fetch();
		$usernameFromDB = $userInfoRow['username']; 
		$passwordFromDB = $userInfoRow['password'];

		if ($password == $passwordFromDB) {
			$_SESSION['username'] = $usernameFromDB;
			$_SESSION['message'] = "Login successful!";
			return true;
		}

		else {
			$_SESSION['message'] = "Password is invalid, but user exists";
		}
	}

	
	if ($stmt->rowCount() == 0) {
		$_SESSION['message'] = "Username doesn't exist from the database. You may consider registration first";
	}

}

function getAllUsers($pdo) {
	$sql = "SELECT * FROM user_passwords";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}

}

function getUserByID($pdo, $user_id) {
	$sql = "SELECT * FROM user_passwords WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$user_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function insertArtist($pdo, $first_name, $last_name, $gender, 
	$date_of_birth, $specialization, $added_by) {

	$sql = "INSERT INTO artist (first_name, last_name, gender, 
		date_of_birth, specialization, added_by, last_updated) VALUES(?,?,?,?,?,?, null)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender,
		$date_of_birth, $specialization, $added_by]);

	if ($executeQuery) {
		return true;
	}
}

function getAllArtist($pdo) {
	$sql = "SELECT * FROM artist";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getArtistByID($pdo, $artist_id) {
	$sql = "SELECT * FROM artist WHERE artist_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$artist_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateArtist($pdo, $first_name, $last_name, $gender, 
	$date_of_birth, $specialization, $edited_by, $artist_id) {

	$sql = "UPDATE artist
				SET first_name = ?,
					last_name = ?,
					gender = ?,
					date_of_birth = ?, 
					specialization = ?,
					last_updated = now(),
					edited_by = ?
				WHERE artist_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, 
		$date_of_birth, $specialization, $edited_by, $artist_id]);
	
	if ($executeQuery) {
		return true;
	}

}

function deleteArtist($pdo, $artist_id, $deleted_by) {
	$deleteArtistProj = "DELETE FROM projects WHERE artist_id = ?";
	$deleteStmt = $pdo->prepare($deleteArtistProj);
	$executeDeleteQuery = $deleteStmt->execute([$artist_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM artist WHERE artist_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$artist_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}

function getProjectsByArtist($pdo, $artist_id) {
	
	$sql = "SELECT 
				projects.project_id AS project_id,
				projects.project_name AS project_name,
				projects.genre AS genre,
				projects.date_added AS date_added,
				projects.added_by AS added_by,
				CONCAT(artist.first_name,' ',artist.last_name) AS project_owner
			FROM projects
			JOIN artist ON projects.artist_id = artist.artist_id
			WHERE projects.artist_id = ? 
			GROUP BY projects.project_name;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$artist_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getAllInfoByArtistID($pdo, $artist_id) {
	$sql = "SELECT * FROM artist WHERE artist_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$artist_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function insertProject($pdo, $project_name, $genre, $artist_id, $added_by) {
	$sql = "INSERT INTO projects (project_name, genre, artist_id, added_by, last_updated) VALUES (?,?,?,?, null)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_name, $genre, $artist_id, $added_by]);
	if ($executeQuery) {
		return true;
	}

}

function getProjectByID($pdo, $project_id) {
	$sql = "SELECT 
				projects.project_id AS project_id,
				projects.project_name AS project_name,
				projects.genre AS genre,
				projects.date_added AS date_added,
				CONCAT(artist.first_name,' ',artist.last_name) AS project_owner
			FROM projects
			JOIN artist ON projects.artist_id = artist.artist_id
			WHERE projects.project_id  = ? 
			GROUP BY projects.project_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateProject($pdo, $project_name, $genre, $edited_by, $project_id) {
	$sql = "UPDATE projects
			SET project_name = ?,
				genre = ?,
				last_updated = now(),
				 edited_by = ?
			WHERE project_id = ?
			
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_name, $genre, $edited_by, $project_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteProject($pdo, $project_id, $deleted_by) {
	$sql = "DELETE FROM projects WHERE project_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_id]);
	if ($executeQuery) {
		return true;
	}
}



?>


