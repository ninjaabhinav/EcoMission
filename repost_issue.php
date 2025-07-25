<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // File handling
    if (isset($_FILES['media']) && $_FILES['media']['error'] === 0) {
        $uploadDir = 'uploads/';
        $fileName = basename($_FILES['media']['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $targetPath = $uploadDir . time() . '_' . $fileName;

        // Only allow image/video
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'mp4', 'mov', 'avi'];
        if (!in_array(strtolower($fileType), $allowedTypes)) {
            die("Unsupported file type.");
        }

        if (move_uploaded_file($_FILES['media']['tmp_name'], $targetPath)) {
            // Get other fields
            $description = $conn->real_escape_string($_POST['description']);
            $location = isset($_POST['location']) ? $conn->real_escape_string($_POST['location']) : NULL;
            $date = isset($_POST['date']) && !empty($_POST['date']) ? $_POST['date'] : NULL;

            // Insert into DB
            $stmt = $conn->prepare("INSERT INTO environmental_reports (file_path, file_type, description, location, action_date) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $targetPath, $fileType, $description, $location, $date);
            
            if ($stmt->execute()) {
                echo "Report submitted successfully!";
            } else {
                echo "Failed to save report.";
            }

            $stmt->close();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file uploaded or upload error.";
    }

    $conn->close();
}
?>
