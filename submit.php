<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Konekcija nije uspjela: ' . $conn->connect_error]);
    exit();
}


$ime = isset($_POST['ime']) ? mysqli_real_escape_string($conn, $_POST['ime']) : '';
$prezime = isset($_POST['prezime']) ? mysqli_real_escape_string($conn, $_POST['prezime']) : '';
$telefon = isset($_POST['telefon']) ? mysqli_real_escape_string($conn, $_POST['telefon']) : '';
$email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
$check_in = isset($_POST['check_in']) ? mysqli_real_escape_string($conn, $_POST['check_in']) : '';
$check_out = isset($_POST['check_out']) ? mysqli_real_escape_string($conn, $_POST['check_out']) : '';
$odrasli = isset($_POST['odrasli']) ? mysqli_real_escape_string($conn, $_POST['odrasli']) : '';
$djeca = isset($_POST['djeca']) ? mysqli_real_escape_string($conn, $_POST['djeca']) : '';
$soba = isset($_POST['soba']) ? mysqli_real_escape_string($conn, $_POST['soba']) : '';

$sql = "INSERT INTO rezervacije (ime, prezime, telefon, email, check_in, check_out, odrasli, djeca, soba) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['status' => 'error', 'message' => 'Priprema SQL upita nije uspjela: ' . $conn->error]);
    exit();
}


$stmt->bind_param("ssssssiss", $ime, $prezime, $telefon, $email, $check_in, $check_out, $odrasli, $djeca, $soba);


if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Uspješno ste rezervisali.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Greška: ' . $stmt->error]);
}

$stmt->close();


$conn->close();
?>
