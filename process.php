<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $errors = [];

    // Validate Name
    if (empty($name)) {
        $errors['name_error'] = "Name is required.";
    }

    // Validate Email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email_error'] = "Valid email is required.";
    }

    // Validate Password
    if (empty($password) || $password !== $confirm_password) {
        $errors['password_error'] = "Passwords must match.";
    }

    if (!empty($errors)) {
        header("Location: index.php?" . http_build_query($errors));
        exit();
    } else {
        echo "<h2>Form submitted successfully!</h2>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
    }
}
?>
