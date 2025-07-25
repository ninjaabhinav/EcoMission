# EcoMission
# 🛠️ Community Issue Reporting & Event Participation Platform

A simple web-based system to **report local community issues**, **join community events**, and **view reported problems**—all in one place.

---

## 📌 Table of Contents

- [🚩 Problem Statement](#-problem-statement)  
- [✅ Solution](#-solution)  
- [🚀 Technologies Used](#-technologies-used)  
- [📂 Project Structure](#-project-structure)  
- [📸 Features](#-features)  
- [🛠️ How to Run Locally](#-how-to-run-locally)  
- [🌐 Deployment Guide](#-deployment-guide)  
- [🧠 Future Scope](#-future-scope)  
- [🤝 Contribution](#-contribution)  
- [📬 Contact](#-contact)

---

## 🚩 Problem Statement

Many local issues go unreported due to a lack of centralized systems, and people often miss local events due to poor communication. This platform enables users to report problems in their locality, view existing ones, and participate in events to help improve their community.

---

## ✅ Solution

A basic platform for:
- 📝 **Registering Users**
- 🚩 **Reporting Issues** (with media + description)
- 🎉 **Joining Events**
- 👀 **Viewing Local Issues**

---

## 🚀 Technologies Used

- **Frontend:** HTML, CSS  
- **Backend:** PHP  
- **Database:** MySQL  
- **Server:** XAMPP (Apache + MySQL)

---

## 📂 Project Structure

```bash
.
├── db_config.php                  # MySQL DB connection config
├── index.html                    # Landing + registration page
├── style.css                     # Styles for index page
├── register.php                  # Handles user registration

├── report.html                   # Report page
├── report.css                    # Styles for report.html

├── report_issues.html            # Issue submission form
├── report_style.css              # Styles for report_issues.html
├── report_issue.php              # PHP backend to handle issue report

├── join_events.php               # PHP to handle event joining
├── join_events.css               # Event page styles

├── view_issues.php               # Displays list of reported issues
├── view_issues.css               # Styling for issue view
```

# 📸 Features
👤 User Registration: Collects name, email, DOB, gender, etc.

📝 Report Issues: Upload images/videos + write about the issue + location.

🎉 Join Community Events: Sign up for events aimed at solving local problems.

👁️ View Issues: All reported issues are publicly visible.

# 🛠️ How to Run Locally
🧑‍💻 Prerequisites:

XAMPP installed

A browser like Chrome or Firefox

✅ Step-by-step Setup
Start XAMPP

Run Apache & MySQL from the XAMPP Control Panel.

Clone or Download this repo

```bash


git clone https://github.com/your-username/project-name.git
```
Move project folder to htdocs

Copy the entire folder to:
```C:\xampp\htdocs\your-folder-name```

Setup the MySQL database

Open your browser and go to:
```http://localhost/phpmyadmin```

Create a new database (e.g., community_db)

Import the provided SQL file (if any) or create tables manually as per your PHP code.

Update DB Credentials

Open db_config.php and change database name, username, and password as needed:

```php
$conn = new mysqli('localhost', 'root', '', 'community_db');
```
Run the app

In browser, go to:
```http://localhost/your-folder-name/index.html```

# 🧠 Future Scope
Add user authentication & password hashing

Add dashboard for each user

Use AJAX for form submissions

Geolocation tagging using Google Maps API

Add issue filtering by location/category

# 🤝 Contribution
This is an open-source beginner-friendly project.
Feel free to fork, improve, and submit pull requests!

## 📬 Contact

Made with 💙 by **Abhinav Mishra**  
📧 ninjaabhinav02@gmail.com
🌐 LinkedIn: ((https://www.linkedin.com/in/ninjaabhinav/))
