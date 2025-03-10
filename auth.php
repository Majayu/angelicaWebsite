<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check user in database
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && hash('sha256', $password) === $hashed_password) {
        $_SESSION["user"] = $username;
        header("Location: dashboard.php"); // Redirect to appointments page
        exit;
    } else {
        echo "<script>alert('Invalid login'); window.location.href='login.html';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
