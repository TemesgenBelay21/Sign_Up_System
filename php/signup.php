<?php
require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $errors = [];

    
    if (empty($username) || empty($email) || empty($password)) {
        $errors[] = "All fields are required";
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    
    if (!preg_match("/^[a-zA-Z_]{3,20}$/", $username)) {
        $errors[] = "Username must be 3-20 characters (letters or underscore only)";
    }

    
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d).{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters and include letters and numbers";
    }


    if (!empty($errors)) {
        foreach ($errors as $err) {
            echo "<p>$err</p>";
        }
        exit;
    }


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    
    try {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $email, $hashedPassword]);

        echo "Registered successfully";

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>