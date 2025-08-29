<?php
require_once __DIR__ . "/../db/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            session_start();
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;

            echo "Login successful. Welcome $username!";
        } else {
            echo "Your password is incorrect.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
}
