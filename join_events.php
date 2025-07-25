<?php
// Database config
$host = "localhost";
$dbname = "ecomission";
$username = "root";
$password = "root";

// Connect to DB
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_POST['eventName'], $_POST['userName'], $_POST['userEmail'])
) {
    $event = $_POST['eventName'];
    $name = $_POST['userName'];
    $email = $_POST['userEmail'];
    $phone = isset($_POST['userPhone']) ? $_POST['userPhone'] : '';

    // Insert into DB
    $sql = "INSERT INTO event_participants (event_title, name, email, phone)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $event, $name, $email, $phone);

    if ($stmt->execute()) {
        echo "<div style='padding:2em;text-align:center;'><h2>Success!</h2><p>You have been registered for the event: <b>" . htmlspecialchars($event) . "</b></p><a href='view_issues.php'>Back to Events</a></div>";
    } else {
        echo "<div style='padding:2em;text-align:center;'><h2>Error</h2><p>" . htmlspecialchars($stmt->error) . "</p><a href='view_issues.php'>Back to Events</a></div>";
    }

    $stmt->close();
    $conn->close();
    exit;
}

// If GET, show the join form
$eventName = isset($_GET['event']) ? htmlspecialchars($_GET['event']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Event | EcoMission</title>
    <link rel="stylesheet" href="join_events.css">
</head>
<body>
    <main class="events-main">
        <section class="events-container">
            <h1 class="eco-title">Join an Event</h1>
            <form method="POST" class="join-form" style="max-width:400px;margin:auto;">
                <div class="form-group">
                    <label for="eventName">Event Name</label>
                    <input type="text" id="eventName" name="eventName" value="<?php echo $eventName; ?>" required readonly>
                </div>
                <div class="form-group">
                    <label for="userName">Your Name</label>
                    <input type="text" id="userName" name="userName" required>
                </div>
                <div class="form-group">
                    <label for="userEmail">Email</label>
                    <input type="email" id="userEmail" name="userEmail" required>
                </div>
                <div class="form-group">
                    <label for="userPhone">Phone <span class="optional">(optional)</span></label>
                    <input type="tel" id="userPhone" name="userPhone" pattern="[0-9\-\+\s]*">
                </div>
                <button type="submit" class="eco-btn">Join Event</button>
            </form>
        </section>
    </main>
</body>
</html>
