<?php
require_once __DIR__ . "/../db/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($email === "" || $password === "") {
        die("All fields are required.");
    }

    $stmt = $conn->prepare(
        "SELECT id, first_name, password FROM users WHERE email = ?",
    );
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $first_name, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            session_start();
            $_SESSION["user_id"] = $id;
            $_SESSION["first_name"] = $first_name;

            // Redirigir a index.php
            header("Location: /index.php");
            exit();
        } else {
            echo "Your password is incorrect.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
}
