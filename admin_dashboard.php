<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Konekcija nije uspjela: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM rezervacije WHERE id = $id";
    $conn->query($sql);
}

$sql = "SELECT * FROM rezervacije";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .action-buttons a, .action-buttons button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }
        .action-buttons a.logout-btn {
            background-color: #ff4b5c;
        }
        .action-buttons a:hover, .action-buttons button:hover {
            background-color: #45a049;
        }
        .action-buttons a.logout-btn:hover {
            background-color: #ff1f3c;
        }
        .container {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="action-buttons">
            <button onclick="goBack()">&#60; Povratak</button> 
            <a href="admin_logout.php" class="logout-btn">Odjava</a> 
        </div>
        <h2>Pregled rezervacija</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Odrasli</th>
                <th>Djeca</th>
                <th>Soba</th>
                <th>Akcije</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['ime']; ?></td>
                <td><?php echo $row['prezime']; ?></td>
                <td><?php echo $row['telefon']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['check_in']; ?></td>
                <td><?php echo $row['check_out']; ?></td>
                <td><?php echo $row['odrasli']; ?></td>
                <td><?php echo $row['djeca']; ?></td>
                <td><?php echo $row['soba']; ?></td>
                <td>
                    <form action="admin_edit.php" method="GET" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" value="Uredi">
                    </form>
                    <form action="admin_dashboard.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" name="delete" value="Obriši">
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php $conn->close(); ?>
