<?php
require_once __DIR__ . "/../db/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if ($username === "" || $password === "") {
        echo "All fields are required.";
        exit();
    }

    // Hash de contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "INSERT INTO users (username, password) VALUES (?, ?)",
    );
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        echo "Your registration was successful, please log in.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
