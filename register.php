<?php
// register.php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sale";
$conn = new mysqli($host, $user, $pass, $dbname);

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    if ($username && $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hash);
        if ($stmt->execute()) {
            $message = "Registration successful. <a href='login.php'>Login here</a>.";
        } else {
            $message = "Username already exists.";
        }
        $stmt->close();
    } else {
        $message = "Please fill all fields.";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Register</h2>
    <?php if($message) echo "<div class='alert alert-info'>$message</div>"; ?>
    <form method="POST">
        <div class="mb-3">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary" type="submit">Register</button>
        <a href="login.php" class="btn btn-link">Login</a>
    </form>
</div>
</body>
</html>