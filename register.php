<?php
// Include DB connection file
include 'db_config.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $dob = $_POST['dob'];
    $country = $_POST['country'];

    // Prepare and bind SQL
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, dob, country) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $email, $password, $dob, $country);

    if ($stmt->execute()) {
        echo "✅ User registered successfully! <a href='repost_issues.html'>Go Back</a>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
