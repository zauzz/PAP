<?php
$con = mysqli_connect("localhost", 
                      "root", 
                      "", 
                      "db_connect");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$id = $_POST['id'];
$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $con->prepare("SELECT Id FROM tbl_contact WHERE Id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('Esse ID já está em uso. Por favor, escolha outro ID.');</script>";
    echo "<script>window.location.href = 'login.html';</script>";
} else {
    $stmt = $con->prepare("INSERT INTO tbl_contact (Id, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $id, $email, $password);

    if($stmt->execute())
    {
        echo "<script>alert('Registro feito, você será redirecionado para a pagina principal.');</script>";
        echo "<script>window.location.href = 'index.html';</script>";
    }
    else
    {
        echo "<script>alert('Erro ao realizar o registro: " . $stmt->error . "');</script>";
    }
}

$stmt->close();
$con->close();
?>


