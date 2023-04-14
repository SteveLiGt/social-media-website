<?php
header('Access-Control-Allow-Origin: *');

//use file_get_contents('php://input') for better compatibility
//$mypost = $GLOBALS['HTTP_RAW_POST_DATA'];
//$postdata = json_decode($mypost);


//$username = $postdata->user_email;
//$password = $postdata->user_password;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $received_data = file_get_contents('php://input');
    $received_data = json_decode($received_data, true);
    $user_email = $received_data ["user_email"];
    // echo '$user_email = ' . $user_email . "\r\n";
    $user_password = $received_data ["user_password"];
    // echo '$user_password = ' . $user_password . "\r\n";
    $first_name = $received_data ["user_first_name"];
    $last_name = $received_data ["user_last_name"];

    $date_of_birth = $received_data ["user_date_of_birth"];
//    $age = $received_data ["user_age"];
//    echo '$age = ' . $age . "\r\n";



    $servername = "localhost";
    $username = "root";
    $db_password = null;
    $dbname = "spring3_database";
    // Create connection
    $conn = mysqli_connect($servername, $username, $db_password, $dbname);
    // checking if duplicated (zhexi)
    $result = mysqli_query($conn, "SELECT * FROM users_info WHERE email= '$user_email' LIMIT 1");

    if (mysqli_num_rows($result) == 0) {
        $user_password = password_hash($user_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare(
            "INSERT INTO users_info (
        firstname, lastname, date_of_birth, email, user_password, auth_token,
        user_profile_photo_filename, follows, fans, blog_history_id
        ) VALUES (
                  ?, ?, ?, ?, ?, NULL,
                  NULL, NULL, NULL, NULL)"
        );
        $stmt->bind_param('sssss', $first_name, $last_name, $date_of_birth, $user_email, $user_password);
        $stmt->execute();
        echo json_encode(['repeated_email' => false]);

    } else {
        echo json_encode(['repeated_email' => true]);
    }

    $conn->close();

}

