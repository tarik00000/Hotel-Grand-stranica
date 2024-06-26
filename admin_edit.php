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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $odrasli = $_POST['odrasli'];
    $djeca = $_POST['djeca'];
    $soba = $_POST['soba'];

    $sql = "UPDATE rezervacije SET 
            ime = '$ime', 
            prezime = '$prezime', 
            telefon = '$telefon', 
            email = '$email', 
            check_in = '$check_in', 
            check_out = '$check_out', 
            odrasli = '$odrasli', 
            djeca = '$djeca', 
            soba = '$soba'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Greška: " . $conn->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM rezervacije WHERE id = $id";
    $result = $conn->query($sql);
    $reservation = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uredi rezervaciju</title>
    <link rel="stylesheet" href="admin_edit.css">
</head>
<body>
    <div class="container">
        <h2>Uredi rezervaciju</h2>
        <form action="admin_edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $reservation['id']; ?>">

            <label for="ime">Ime:</label>
            <input type="text" id="ime" name="ime" value="<?php echo $reservation['ime']; ?>" required>

            <label for="prezime">Prezime:</label>
            <input type="text" id="prezime" name="prezime" value="<?php echo $reservation['prezime']; ?>" required>

            <label for="telefon">Broj telefona:</label>
            <input type="tel" id="telefon" name="telefon" value="<?php echo $reservation['telefon']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $reservation['email']; ?>" required>

            <label for="check_in">Check-in:</label>
            <input type="date" id="check_in" name="check_in" value="<?php echo $reservation['check_in']; ?>" required>

            <label for="check_out">Check-out:</label>
            <input type="date" id="check_out" name="check_out" value="<?php echo $reservation['check_out']; ?>" required>

            <label for="odrasli">Broj odraslih:</label>
            <input type="number" id="odrasli" name="odrasli" value="<?php echo $reservation['odrasli']; ?>" required>

            <label for="djeca">Broj djece:</label>
            <input type="number" id="djeca" name="djeca" value="<?php echo $reservation['djeca']; ?>" required>

            <label for="soba">Izaberi sobu:</label>
            <select id="soba" name="soba" required>
                <option value="PORODICNA SOBA" <?php if ($reservation['soba'] == "PORODICNA SOBA") echo "selected"; ?>>PORODICNA SOBA</option>
                <option value="DVOKREVETNA SOBA DELUXE" <?php if ($reservation['soba'] == "DVOKREVETNA SOBA DELUXE") echo "selected"; ?>>DVOKREVETNA SOBA DELUXE</option>
                <option value="DVOKREVETNA SOBA DELUXE s pogledom na grad" <?php if ($reservation['soba'] == "DVOKREVETNA SOBA DELUXE s pogledom na grad") echo "selected"; ?>>DVOKREVETNA SOBA DELUXE s pogledom na grad</option>
                <option value="JUNIOR SUITE" <?php if ($reservation['soba'] == "JUNIOR SUITE") echo "selected"; ?>>JUNIOR SUITE</option>
                <option value="EKONOMI DVOKREVETNA" <?php if ($reservation['soba'] == "EKONOMI DVOKREVETNA") echo "selected"; ?>>EKONOMI DVOKREVETNA</option>
                <option value="SUPERIOR DVOKREVETNA" <?php if ($reservation['soba'] == "SUPERIOR DVOKREVETNA") echo "selected"; ?>>SUPERIOR DVOKREVETNA</option>
                <option value="KLASIK JEDNOKREVETNA" <?php if ($reservation['soba'] == "KLASIK JEDNOKREVETNA") echo "selected"; ?>>KLASIK JEDNOKREVETNA</option>
                <option value="KLASIK DVOKREVETNA" <?php if ($reservation['soba'] == "KLASIK DVOKREVETNA") echo "selected"; ?>>KLASIK DVOKREVETNA</option>
            </select>

            <input type="submit" value="Sačuvaj">
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>
