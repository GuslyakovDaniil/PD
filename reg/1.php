<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', 'mysql', 'register-bd');

// Query the database
$result = mysqli_query($conn, "SELECT username FROM users WHERE id = 1");

// Fetch the result
$row = mysqli_fetch_assoc($result);

// Save the text in a variable
$text = $row['username'];

// Close the database connection
mysqli_close($conn);

echo $text
?>