<?php
// login_process.php

session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Perform your login logic here+

    // Replace the following line with your actual authentication logic
    // For demonstration purposes, let's assume the login is successful
    $authenticated = true;

    if ($authenticated) {
        // Store user information in the session (you can add more info as needed)
        $_SESSION['user_email'] = $_POST['email'];

        // Redirect to the desired page after successful login
        header("Location: mali_interface.html");
        exit();

    } else {
        // Redirect back to the login page if authentication fails
        header("Location: login.php");
        exit();
    }
} else {
    // Redirect back to the login page if accessed without a POST request
    header("Location: login.php");
    exit();
}
?>
