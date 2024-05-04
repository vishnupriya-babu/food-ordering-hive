<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    // Connect to the database
    $pdo = new PDO('mysql:host=localhost;dbname=student', 'root', '');

    // Retrieve form data from signup.html
    $full_name = $_POST['full_name'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query
    $query = "INSERT INTO login (full_name, student_id, email, password) VALUES (:full_name, :student_id, :email, :password)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":full_name", $full_name);
    $stmt->bindParam(":student_id", $student_id);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    // Check if the query was successful
    if ($stmt->rowCount() > 0) {
        // Redirect to the login page
        header('location: /login/index.html');
        exit;
    } else {
        // Display an error message
        echo 'An error occurred while signing up.';
    }
}
?>
