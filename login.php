<?php
// Initialize the session
session_start();
// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>';
// echo password_hash("haslo-test", PASSWORD_DEFAULT);
$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("./class/db.class.php");
    $db = new Db();
    $db->dbConnect();
    // var_dump('test');

    if (empty(trim($_POST["username"]))) {
        $errors['username'] = "Proszę wprowadzić nazwę użytkownika.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $errors['password'] = "Proszę wprowadzić nazwę hasło.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (count($errors) == 0) {
        $query_sql = 'SELECT id, username, password FROM users WHERE username = "' . $username . '" LIMIT 1';
        $user = $db->dbQuery($query_sql);
        if (count($user) == 1) {
            $user = $user[0];
            if (password_verify($password, $user['password'])) {
                // Password is correct, so start a new session
                session_start();
                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $user['id'];
                $_SESSION["username"] = $user['username'];

                // Redirect user to welcome page
                header("location: ./");
            } else {
                // Display an error message if password is not valid
                $errors['password'] = "Podane hasło jest nieprawidłowe";
            }
        } else {
            $errors['username'] = "Nie ma takiego użytkownika";
        }
    }
}

// // Check if the user is already logged in, if yes then redirect him to welcome page
// if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
//     header("location: welcome.php");
//     exit;
// }

// // Include config file
// require_once "config.php";

// // Define variables and initialize with empty values
// $username = $password = "";
// $username_err = $password_err = "";

// // Processing form data when form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     // Check if username is empty
//     if (empty(trim($_POST["username"]))) {
//         $username_err = "Please enter username.";
//     } else {
//         $username = trim($_POST["username"]);
//     }

//     // Check if password is empty
//     if (empty(trim($_POST["password"]))) {
//         $password_err = "Please enter your password.";
//     } else {
//         $password = trim($_POST["password"]);
//     }

//     // Validate credentials
//     if (empty($username_err) && empty($password_err)) {
//         // Prepare a select statement
//         $sql = "SELECT id, username, password FROM users WHERE username = ?";

//         if ($stmt = mysqli_prepare($link, $sql)) {
//             // Bind variables to the prepared statement as parameters
//             mysqli_stmt_bind_param($stmt, "s", $param_username);

//             // Set parameters
//             $param_username = $username;

//             // Attempt to execute the prepared statement
//             if (mysqli_stmt_execute($stmt)) {
//                 // Store result
//                 mysqli_stmt_store_result($stmt);

//                 // Check if username exists, if yes then verify password
//                 if (mysqli_stmt_num_rows($stmt) == 1) {
//                     // Bind result variables
//                     mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
//                     if (mysqli_stmt_fetch($stmt)) {
//                         if (password_verify($password, $hashed_password)) {
//                             // Password is correct, so start a new session
//                             session_start();

//                             // Store data in session variables
//                             $_SESSION["loggedin"] = true;
//                             $_SESSION["id"] = $id;
//                             $_SESSION["username"] = $username;

//                             // Redirect user to welcome page
//                             header("location: welcome.php");
//                         } else {
//                             // Display an error message if password is not valid
//                             $password_err = "The password you entered was not valid.";
//                         }
//                     }
//                 } else {
//                     // Display an error message if username doesn't exist
//                     $username_err = "No account found with that username.";
//                 }
//             } else {
//                 echo "Oops! Something went wrong. Please try again later.";
//             }

//             // Close statement
//             mysqli_stmt_close($stmt);
//         }
//     }

//     // Close connection
//     mysqli_close($link);
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- <h2>Login</h2> -->
        <!-- <p>Please fill in your credentials to login.</p> -->
        <form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($errors['username'])) ? 'has-error' : ''; ?>">
                <label>Login</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $errors['username']; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($errors['password'])) ? 'has-error' : ''; ?>">
                <label>Hsało</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $errors['password']; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Zaloguj">
            </div>
            <!-- <p>Don't have an account? <a href="register.php">Sign up now</a>.</p> -->
        </form>
    </div>
</body>

</html>