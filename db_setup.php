<?php
// Create a connection
$mysqli = new mysqli("localhost", "root", "", "");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create database "WebAss" if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS WebAss";
if ($mysqli->query($sql) === TRUE) {
    echo "Database created successfully <br>";
} else {
    echo "Error creating database: " . $mysqli->error;
}

// Select the database
$mysqli->select_db("WebAss");

// Create table "users"
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";
if ($mysqli->query($sql) === TRUE) {
    echo "Table users created successfully <br>";
} else {
    echo "Error creating table: " . $mysqli->error;
}

// Create table "resumes" with userId column as a foreign key
$sql = "CREATE TABLE IF NOT EXISTS resumes (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userId INT(11) UNSIGNED,
    name VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    date_of_birth DATE NOT NULL,
    address VARCHAR(255) NOT NULL,
    introduction TEXT,
    phone_number TEXT NOT NULL,
    certificate TEXT,
    mail VARCHAR(255) NOT NULL,
    experience TEXT,
    education TEXT,
    skill TEXT,
    FOREIGN KEY (userId) REFERENCES users(id)
)";
if ($mysqli->query($sql) === TRUE) {
    echo "Table resumes created successfully <br>";
} else {
    echo "Error creating table: " . $mysqli->error;
}

// Close the connection
$mysqli->close();
