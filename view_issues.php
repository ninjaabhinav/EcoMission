<?php
include 'db_config.php';

// Fetch events
$events_sql = "SELECT * FROM events ORDER BY date, time";
$events_result = $conn->query($events_sql);

// Fetch reported issues
$reports_sql = "SELECT * FROM environmental_reports ORDER BY action_date DESC";
$reports_result = $conn->query($reports_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Environmental Events Near You | EcoMission</title>
    <link rel="stylesheet" href="view_issues.css">
</head>
<body>
    <header class="banner-section">
        <h1 class="eco-title">Upcoming Environmental Events Near You</h1>
        <p class="eco-subtitle">Find and join local cleanups, plantation drives, and more!</p>
    </header>
    <main class="issues-main">
        <section class="filters-section">
            <input type="text" class="filter-input" placeholder="Search by location or event type (optional)">
        </section>
        <section class="issues-list">
            <?php
            // Events
            if ($events_result && $events_result->num_rows > 0) {
                while($row = $events_result->fetch_assoc()) {
                    echo "<div class='issue-card'>
                        <img src='{$row['image_url']}' alt='Event Image' class='issue-image'>
                        <div class='issue-details'>
                            <h2 class='issue-title'>{$row['title']}</h2>
                            <div class='issue-meta'>
                                <span class='issue-location'>📍 {$row['location']}</span><br>
                                <span class='issue-date'>🕓 {$row['date']}, {$row['time']}</span>
                            </div>
                            <p class='issue-desc'>{$row['description']}</p>
                            <a href='join_event.php?event_id={$row['id']}' class='eco-btn'>Join Now</a>
                        </div>
                    </div>";
                }
            } else {
                echo "<p>No upcoming events found.</p>";
            }
            ?>
        </section>
        <h2 class="eco-title" style="margin-top:2em;">Reported Environmental Issues</h2>
        <section class="issues-list">
            <?php
            // Reported Issues
            if ($reports_result && $reports_result->num_rows > 0) {
                while($row = $reports_result->fetch_assoc()) {
                    echo "<div class='issue-card'>";
                    $is_video = in_array(strtolower($row['file_type']), ['mp4','mov','avi']);
                    if ($is_video) {
                        echo "<video class='issue-image' controls poster='uploads/placeholder.jpg'><source src='{$row['file_path']}' type='video/{$row['file_type']}'></video>";
                    } else {
                        echo "<img src='{$row['file_path']}' alt='Reported Issue' class='issue-image'>";
                    }
                    echo "<div class='issue-details'>
                        <h2 class='issue-title'>" . htmlspecialchars($row['description']) . "</h2>";
                    echo "<div class='issue-meta'>";
                    if (!empty($row['location'])) {
                        echo "<span class='issue-location'>📍 " . htmlspecialchars($row['location']) . "</span><br>";
                    }
                    if (!empty($row['action_date'])) {
                        echo "<span class='issue-date'>🕓 " . htmlspecialchars($row['action_date']) . "</span>";
                    }
                    echo "</div>";
                    echo "<p class='issue-desc'>Community action needed! Join or organize a cleanup event for this issue.</p>";
                    echo "</div></div>";
                }
            } else {
                echo "<p>No reported issues found.</p>";
            }
            $conn->close();
            ?>
        </section>
    </main>
    <footer class="eco-footer">
        <div class="footer-links">
            <a href="about.html">About</a> |
            <a href="abhimishra0205@gmail.com">Contact</a> |
            <a href="https://www.linkedin.com/in/ninjaabhinav/">Linkedin</a>
        </div>
        <div class="footer-credits">
            Built by Abhinav Mishra
        </div>
    </footer>
</body>
</html>
