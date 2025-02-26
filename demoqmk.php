<?php
function sendEmail($toEmail, $password) {
    $subject = "Nhận mật khẩu!";
    $content = "Mật khẩu của bạn là '" . $password . "' vui lòng đừng quên nữa nhé! Thân ái cảm ơn!";
    $headers = 'From: trannguyentuongvy6578@gmail.com';
    return mail($toEmail, $subject, $content, $headers);
}

if (isset($_POST['submit'])) {
    $conn = new mysqli('localhost', 'root', 'tuongvi147', 'assign');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $conn->real_escape_string($_POST['email']);
        $sql = "SELECT * FROM nguoidung WHERE email = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $password = $row['matkhau'];

            if (sendEmail($email, $password)) {
                $message = "Vui lòng check mail để xem mật khẩu";
            } else {
                $message = "Gửi email thất bại!";
            }
        } else {
            $message = "Không tìm thấy tài khoản";
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quên mật khẩu</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
.register_form {
    border-radius: 10px;
    width: 400px;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
form h2 {
    font-size: 24px;
    text-align: center;
    margin-bottom: 30px;
}
form label {
    font-weight: 600;
    font-size: 18px;
}
form input {
    margin-top: 10px;
    margin-bottom: 10px;
    width: calc(100% - 22px);
    height: 35px;
    border: 1px solid gray;
    border-radius: 5px;
    padding-left: 10px;
}
form button {
    width: 100px;
    height: 35px;
    font-size: 15px;
    background-color: #ffffff;
    border: 2px solid gray;
    border-radius: 10px;
    margin-top: 20px;
    margin-left: calc(50% - 50px);
    cursor: pointer;
}
form button:hover {
    background-color: rgb(255, 225, 0);
    border: 2px solid rgb(255, 225, 0);
    color: #FFFFFF;
}
.message {
    text-align: center;
    font-size: 16px;
    color: red;
    margin-top: 20px;
}
</style>
</head>
<body>
<div class="register_form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Quên mật khẩu</h2>
        <label for="email">Email :</label>
        <input type="email" name="email" placeholder="Nhập email" required>
        <button name="submit" class="btn">Gửi</button>
        <?php
        if (isset($message)) {
            echo "<div class='message'>$message</div>";
        }
        ?>
    </form>
</div>
</body>
</html>
