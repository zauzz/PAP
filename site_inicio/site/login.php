<?php
include 'connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $connect->prepare("SELECT * FROM utilizadores WHERE email=? AND password=?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();

$result = $stmt->get_result()->fetch_assoc();

if ($result === false) {
    // Log the error
    error_log("Error executing SQL query: " . $stmt->error);
}

echo json_encode($result);

$stmt->close();
$connect->close();

?>