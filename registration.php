<?php
/**
 * @author Sriram Gopalakrishnan
 * @url www.classuser.com
 */

session_start();
include "dbconnection.php";

$error = '';

if(isset($_POST['username'], $_POST['password'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $rePassword = mysqli_real_escape_string($connection, $_POST['rePassword']);

    if ($password == $rePassword) {

        # Hash the password.
        $password = password_hash($password, PASSWORD_DEFAULT);

        /** @var string $query */
        $query = "INSERT INTO users (username, password) VALUES ('{$username}', '{$password}')";

        # Save the user information


        if (!mysqli_query($connection, $query)) {
            die(mysqli_error($connection));
        }

        $_SESSION['user_id'] = mysqli_insert_id($connection);
        $_SESSION['username'] = $username;

        # User registration completed
        header('Location: index.php');
        exit;
    } else {
        $error = "Password and Re-Type password not match";
    }
}

?>

<html>
<head>
    <title>User Registration - www.classuser.com</title>
</head>
<body>
	<div style="text-align: center;">
	    <h1>User Registration</h1>
        <h3><?php echo ($error != '') ? $error : '' ?></h3>
	    <form method="post">
            <input type="text" name="username" maxlength="50" placeholder="User name" required>
            <input type="password" name="password" maxlength="20" placeholder="Password" required>
            <input type="password" name="rePassword" maxlength="50" placeholder="Re-Type Password" required>
            <input type="submit" name="register" value="Register">
	    </form>
	</div>
</body>
</html>
