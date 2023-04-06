<?php
// make connection with existing database (contain parameter "database"
// username and
$servername = "localhost";
$username = "root";
$password = null;
$dbname = "spring3_database";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected";
}

// Create table
// $sql = "CREATE TABLE users (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(30) NOT NULL,
//     userpass VARCHAR(30) NOT NULL
// )";

// for post
$sql = "CREATE TABLE post_history(
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(200) NOT NULL,
    tile VARCHAR(600) NOT NULL,
    like_count int(8),
    like_id  int(8),
    image_ID INT(8),
    comments_ID INT(8)  
    )";

$sql = "CREATE TABLE users_info (
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL, 
    lastname VARCHAR(30) NOT NULL, 
    age VARCHAR(10) NOT NULL,
    email VARCHAR(200) NOT NULL, 
    user_password VARCHAR(255) NOT NULL, 
    auth_token VARCHAR(255),
    user_profile_photo_filename VARCHAR(10) NOT NULL, 
    follows INT(8) NOT NULL,
    fans INT(8) NOT NULL, 
    blog_history_id INT(8) NOT NULL
)";




if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


// to Delete table
// $sql = "DROP TABLE users_info";
