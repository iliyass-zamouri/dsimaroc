<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dsimaroc";
if(!empty($nom) || !empty($prenom) || !empty($email) || !empty($password)) {
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO users (nom, prenom, email, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nom, $prenom, $email, $password);

// set parameters and execute
$nom = $_POST['name'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['pass'];
$stmt->execute();

$stmt->close();
$conn->close();
header("Location: ../index.html");
exit();
} else {
    echo "TOUS LES ZONES SONT IMPORTANT";
    die();
}
?>