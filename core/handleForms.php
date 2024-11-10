<?php  
require_once 'models.php';
require_once 'dbConfig.php';

if (isset($_POST['registerUserBtn'])) {

	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	if (!empty($username) && !empty($password)) {

		$insertQuery = insertNewUser($pdo, $username, $password);

		if ($insertQuery) {
			header("Location: ../login.php");
		}
		else {
			header("Location: ../register.php");
		}
	}

	else {
		$_SESSION['message'] = "Please make sure the input fields 
		are not empty for registration!";

		header("Location: ../login.php");
	}

}

if (isset($_POST['loginUserBtn'])) {

	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	if (!empty($username) && !empty($password)) {

		$loginQuery = loginUser($pdo, $username, $password);
	
		if ($loginQuery) {
			header("Location: ../index.php");
			$_SESSION['username'] = $username;
		}
		else {
			header("Location: ../login.php");
		}

	}

	else {
		$_SESSION['message'] = "Please make sure the input fields 
		are not empty for the login!";
		header("Location: ../login.php");
	}
 
}

if (isset($_GET['logoutUser'])) {
	unset($_SESSION['username']);
	header('Location: ../login.php');
}

if (isset($_POST['insertArtistBtn'])) {

	$query = insertArtist($pdo, $_POST['firstName'], $_POST['lastName'], 
	$_POST['gender'], $_POST['dateOfBirth'], $_POST['specialization'], $_SESSION['username']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}

if (isset($_POST['editArtistBtn'])) {
	$query = updateArtist($pdo, $_POST['firstName'], $_POST['lastName'], 
	$_POST['gender'], $_POST['dateOfBirth'], $_POST['specialization'], $_SESSION['username'], $_GET['artist_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}

if (isset($_POST['deleteArtistBtn'])) {
	$query = deleteArtist($pdo, $_GET['artist_id'], $_SESSION['username']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertNewProjectBtn'])) {
	$query = insertProject($pdo, $_POST['projectName'], $_POST['genre'], $_GET['artist_id'], $_SESSION['username']);

	if ($query) {
		header("Location: ../viewprojects.php?artist_id=" .$_GET['artist_id']);
	}
	else {
		echo "Insertion failed";
	}
}

if (isset($_POST['editProjectBtn'])) {
	$query = updateProject($pdo, $_POST['projectName'], $_POST['genre'], $_SESSION['username'], $_GET['project_id']);

	if ($query) {
		header("Location: ../viewprojects.php?artist_id=" .$_GET['artist_id']);
	}
	else {
		echo "Update failed";
	}

}

if (isset($_POST['deleteProjectBtn'])) {
	$query = deleteProject($pdo, $_GET['project_id'], $_SESSION['username']);

	if ($query) {
		header("Location: ../viewprojects.php?artist_id=" .$_GET['artist_id']);
	}
	else {
		echo "Deletion failed";
	}
}