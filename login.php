<?php
// Start session (if not already started)
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $student_id = $_POST['username'];
  $password = $_POST['password'];

  // Connect to the database
  $pdo = new PDO('mysql:host=localhost;dbname=student', 'root', '');

  // Prepare and execute the SQL query
  $stmt = $pdo->prepare('SELECT * FROM login WHERE student_id = :student_id');
  $stmt->execute(['student_id' => $student_id]);

  // Fetch the user from the database
  $student_id = $stmt->fetch();

  // Check if a user was found and the password is correct
  if ($student_id && password_verify($password, $student_id['password'])) {
    // The user is authenticated
    $_SESSION['student_id'] = $student_id;
    header('location: /login/index.html');
    exit;
  } else {
    // Invalid username or password
    echo 'Invalid username or password.';
  }
// Check if a user was found and the password is correct
}
?>