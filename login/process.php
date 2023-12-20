<?php

require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_STRING);
    $password = password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);

    try {
        $query = "INSERT INTO users (firstname, lastname, email, phonenumber, password) 
                  VALUES (:firstname, :lastname, :email, :phonenumber, :password)";

        $statement = $db->prepare($query);
        $statement->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $statement->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':phonenumber', $phonenumber, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);

        $result = $statement->execute();

        if ($result) {
            echo 'Registration successful!';
        } else {
            echo 'Error while saving the data.';
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Invalid request.';
}
?>
