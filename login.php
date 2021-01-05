<?php
include_once('auth.php');
// Initialize the session
session_id("login");
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
auth("vote_page.php");

// Define variables and initialize with empty values
$username = $nim = $password = "";
$username_err = $nim_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty($_POST["username"])) {
        $username_err = "Please enter username.";
    } else {
        $username = $_POST["username"];
    }

    if (empty($_POST["nim"])) {
        $nim_err = "Please enter NIM.";
    } else {
        $nim = $_POST["nim"];
    }

    // Check if password is empty
    if (empty($_POST["password"])) {
        $password_err = "Please enter your password.";
    } else {
        $password = $_POST["password"];
    }

    foreach ($absen as $abs) {
        if ($abs->validasi($username, $nim, $password)) {
            // Store data in session variables                       
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["nim"] = $nim;

            // Redirect user to welcome page                       
            header("location: vote_page.php");
        } else {
            if ($username != $abs->get_nama()) {
                $username_err = "The username you entered was not valid.";
            } elseif ($nim != $abs->get_nim()) {
                $nim_err = "The NIM you entered was not valid.";
            } elseif ($password != $abs->get_pass()) {
                $password_err = "The password you entered was not valid.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

</head>

<body>
    <div class="card mx-auto p-3 my-1" style="width: 25rem;">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control">
                <span class="help-block"><?php echo $nim_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>
</body>

</html>