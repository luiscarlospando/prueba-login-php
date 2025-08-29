<?php
require_once __DIR__ . "/../db/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = trim($_POST["first_name"] ?? "");
    $last_name = trim($_POST["last_name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm_password"] ?? "";

    // Validar campos
    if (
        $first_name === "" ||
        $last_name === "" ||
        $email === "" ||
        $password === "" ||
        $confirm_password === ""
    ) {
        die("All fields are required.");
    }

    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash de contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertar en la tabla users
    $stmt = $conn->prepare(
        "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)",
    );
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Redirigir a login.php después del registro
        header("Location: /login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
