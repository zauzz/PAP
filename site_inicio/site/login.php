<?php
$connect = new mysqli("localhost", "root", "", "db_connect");

$id = $_POST['id'];
$password = $_POST['password'];

$stmt = $connect->prepare("SELECT * FROM tbl_contact WHERE id=? ; ");
$stmt->bind_param("s", $id);
$stmt->execute();

$result = $stmt->get_result()->fetch_assoc();

if ($result === null) {
    // Log the error
    //redirecionar para página que queres com msg/sub menu
    $response = array("success" => false, "message" => "ID INCORRETO");
} else {
    if ($result['password'] === $password) {
        // Password matches, login successful
        $response = array("success" => true, "message" => "Login successful", "user" => $result);

    } else {
        // Password does not match, return error message or handle accordingly
        $response = array("success" => false, "message" => "PASSWORD INCORRETA  ");
    }
}

$stmt->close();
$connect->close();

if($response['success'] == true){
    header('location: ja_logado.html');
}
else{
    header('location: login.html?message=' .$response['message']);
}
// Convertendo o array de resposta em JSON
$response_json = json_encode($response);



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CONFUSAO ZE</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        text-align: center;
    }

    .message {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .countdown {
        font-size: 18px;
        color: #888;
    }
</style>



</head>
<body>
<!-- Exibindo a mensagem de redirecionamento e a contagem regressiva -->
<p><span id="message"><?php echo $response["message"]; ?></span>. Você será redirecionado em <span id="countdown">5</span> segundos.</p>
</body>
</html>
