<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "labexam";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function login_user($conn, $username, $password) {
    $stmt = $conn->prepare("SELECT password FROM UserCredentials WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($password, $hashed_password)) {
        return true; 
    } else {
        return false; 
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    if (login_user($conn, $input_username, $input_password)) {
        // Login successful, redirect to dashboard or any other page
        header("Location: LibrarianDashboard.php");
        exit();
    } else {
        $error_message = "Incorrect username or password";
    }
}

$conn->close();

?>


<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>
    <h2>User Login</h2>
    <?php if(isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Username: <input type="text" name="username"><br><br>
        Password: <input type="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>