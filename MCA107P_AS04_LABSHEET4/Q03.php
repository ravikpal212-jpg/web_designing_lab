<?php
// Q3: Create college_db database
$host = "localhost";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);

$sql = "CREATE DATABASE IF NOT EXISTS college_db";
if ($conn->query($sql))
    echo "Database college_db created successfully.";
else
    echo "Error: ".$conn->error;

$conn->close();
?>