<?php
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("127.0.0.1", "root", "", "store");
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT c_mobile from customer where c_mobile = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['c_mobile'];
?>