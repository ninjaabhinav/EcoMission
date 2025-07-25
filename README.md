# EcoMission
# 🛠️ Community Issue Reporting & Event Participation Platform

A simple and effective web-based platform for **reporting local issues** (like potholes, garbage, broken lights, etc.) and **joining nearby community events** (like clean-up drives or awareness campaigns). This project aims to bridge the gap between citizens and authorities while encouraging active community participation.

## 🚨 Problem Statement

In many localities, citizens face problems such as broken roads, improper lighting, garbage dumps, and more — but there's no structured and public way to report them or follow up. Moreover, clean-up or awareness events are often organized with poor visibility and low public engagement.

## ✅ Solution

This platform lets users:
- 📝 **Report an issue** with details, image/video proof, and location
- 🧍‍♂️ **Join community events** based on interest and proximity
- 📍 **View nearby events** and **issues reported** in the locality
- 🔐 Simple **user authentication**
- 📂 Store reports, users, and events in a **MySQL database**

Built using:
- 🧱 **Frontend**: HTML, CSS
- 🧠 **Backend**: PHP
- 🗃️ **Database**: MySQL (via XAMPP)

## 🔧 Features Implemented

- User Registration & Login
- Report Issue Form (with image/video upload)
- Join Event Form
- View Nearby Events & Reported Issues (linked with MySQL)
- Fully structured UI for each page (responsive with basic CSS)

## 🧩 Still Upgradeable

This project was built in a short span as a minimum viable product (MVP). However, it has **real-world potential** and can be upgraded by:
- Adding **admin panel** for moderating reports & events
- Implementing **Google Maps API** for accurate location tagging
- Using **SMS/email notifications**
- Integrating **mobile responsiveness** or a React frontend
- Hosting on cloud platforms with security & scalability

## 🖥️ How to Run Locally

1. Install **XAMPP** and start Apache & MySQL
2. Place the project folder in `htdocs`
3. Import the provided `.sql` file into phpMyAdmin
4. Access the site via `http://localhost/your_project_name/index.html`

## 📂 Folder Structure
📁 EcoMission/
├── index.html
├── style.css
├── report.html
├── report_issue.php
├── join_event.html
├── join_event.php
├── view_issues.html
├── view_events.html
├── assets/ (images, CSS)
├── db/ (connection.php)
└── database.sql
