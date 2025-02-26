<?php
include 'config/config.php'; // Bao gồm tệp kết nối cơ sở dữ liệu

session_start(); // Start the session


// Handle login form submission
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];

    // Truy xuất dữ liệu người dùng từ cơ sở dữ liệu dựa trên email
    $sql = "SELECT * FROM nguoidung WHERE email='$email' AND matkhau='$matkhau'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
      // Nếu người dùng tồn tại, hãy đặt biến phiên và chuyển hướng đến bảng điều khiển hoặc trang khác
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['tentaikhoan'] = $row['tentaikhoan'];
        $_SESSION['ten'] = $row['ten'];

        header('location:index.php'); // Chuyển hướng đến bảng điều khiển hoặc trang khác sau khi đăng nhập thành công
        exit();
    } else {
        $login_error_message = "Sai email hoặc mật khẩu";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    
</head>
<style>
body {
  font-family: Arial, sans-serif;
  background-color:  #0b1320;
}

    .container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.Sign_up {
  background-color: #fff;
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  width: 500px;
}

.Sign_up h2 {
  text-align: center;
  margin-bottom: 40px;
  color: #333;
}

.Sign_up label {
  display: block;
  margin-bottom: 10px;
  color: #666;
}

.Sign_up input[type="email"],
.Sign_up input[type="password"] {
  width: 100%;
  padding: 12px;
  border-radius: 5px;
  border: 1px solid #ddd;
  box-sizing: border-box;
  margin-bottom: 20px;
}

.Sign_up input[type="submit"] {
  background-image: linear-gradient(to right, #fff0df, #6f6fe4);
  color: #333;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
  width: 100%;
}

.Sign_up input[type="submit"]:hover {
  background-color: #f7f7f7;
}

.bottom-link {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 20px;
}

.forgot-pass-link {
  color: #666;
  text-decoration: none;
  transition: color 0.3s;
}

.forgot-pass-link:hover {
  color: #333;
}

#signup-link {
  color: #6f6fe4;
  text-decoration: none;
  transition: color 0.3s;
}

#signup-link:hover {
  color: #5f5fe3;
}

</style>


<body>
    <div class=" container">
    <div class="Sign_up">
    <h2> Đăng nhập</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Password:</label>
        <input type="password" name="matkhau" required><br><br>
        <input  style="background: linear-gradient(#fff0df, #6f6fe4);" type="submit" name="login" value=" Đăng nhập">
         <div class="bottom-link" style="margin-top:20px ;">
                <a href="demoqmk.php" class="forgot-pass-link"> Quên mật khẩu ? </a><br>
                <p>Bạn chưa có tài khoản ?</p>
                <a href="dangky.php" id="signup-link"> Đăng Ký ngay !</a>
     </div> 
</form>
    <?php if(isset($login_error_message)) { ?>
        <p><?php echo $login_error_message; ?></p>
    <?php } ?>
    </div>
    <div>
</body>
</html>s