<?php
$host = 'localhost';
$username = 'root';
$password = 'tuongvi147';
$dbname = 'assign';
$conn = mysqli_connect($host, $username, $password, $dbname);
if(mysqli_connect_errno() != 0) {
    echo "Kết nối không thành công!";
}
?>