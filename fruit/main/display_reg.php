<?php
// users.php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sale";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username FROM users ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <style>
        body {
            padding-top: 40px;
            background: #f8f9fa;
        }
        .contentheader {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: #f2f2f2;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #fff;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="contentheader">
        <i class="icon-user"></i> Registered Users
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th width="10%">ID</th>
                <th width="90%">Username</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="2">No users found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php
$conn->close();
?>