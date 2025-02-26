<?php
include 'config/config.php'; 

session_start(); 

if (isset($_POST['register'])) {
    $ten = $_POST['ten'];
    $tuoi = $_POST['tuoi'];
    $gioitinh = $_POST['gioitinh'];
    $email = $_POST['email'];
    $tentaikhoan = $_POST['tentaikhoan'];
    $matkhau = $_POST['matkhau'];

    // Check if username already exists
    $sql_check_username = "SELECT COUNT(*) AS count FROM nguoidung WHERE tentaikhoan='$tentaikhoan'";
    $result_check_username = $conn->query($sql_check_username);
    $row_check_username = $result_check_username->fetch_assoc();

    if ($row_check_username['count'] > 0) {
        echo "Tên tài khoản đã tồn tại. Vui lòng chọn tên tài khoản khác.";
    } else {
        // Get the maximum ID
        $sql_max_id = "SELECT MAX(id) AS max_id FROM nguoidung";
        $result_max_id = $conn->query($sql_max_id);
        $row_max_id = $result_max_id->fetch_assoc();
        $max_id = $row_max_id['max_id'];

        // Generate new ID
        $new_id = $max_id + 1;

        // Insert new user
        $sql_insert = "INSERT INTO nguoidung (id, ten, tuoi, gioitinh, email, tentaikhoan, matkhau) 
                       VALUES ('$new_id', '$ten', '$tuoi', '$gioitinh', '$email', '$tentaikhoan', '$matkhau')";
        
        if ($conn->query($sql_insert) === TRUE) {
            $_SESSION['message'] = "Đăng kí thành công <a href='dangnhap.php'>Login page</a>";
        } else {
          $_SESSION['message'] = "Error: " . $sql_insert . "<br>" . $conn->error;
        }
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
  background-color: #0b1320;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.Sign_up,
.Sign_in {
  background-color: #fff;
  padding: 40px;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  width: 400px;
  margin: 0 20px;
}
.Sign_up h3,
.Sign_in h3 {
  text-align: center;
  margin-bottom:20px;
  color:#333333;
  font-size: 20px;
}
.Sign_up h2,
.Sign_in h2 {
  text-align: center;
  margin-bottom: 30px;
  color:#000000;
  font-size: 35px;
}

.Sign_up label,
.Sign_in label {
  display: block;
  margin-bottom: 10px;
  color: #333;
}

.Sign_up input[type="text"],
.Sign_up input[type="email"],
.Sign_up input[type="password"],
.Sign_in input[type="text"],
.Sign_in input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 20px;
}

.Sign_up input[type="submit"],
.Sign_in input[type="submit"] {
  background-image: linear-gradient(to right, #4CAF50, #00C853);
  border:none;
  height: 40px;
  width: 150px;
  font-size: 16px;
  }
</style>

<body>
    <div class=" container">
    <div class="Sign_up">
    <h3> CHÀO MỪNG BẠN ĐẾN THẾ GIỚI MUA SẮM </h3>
    <h2> Đăng ký</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Tên:</label>
        <input type="text" name="ten" required><br><br>
        <label>Tuổi :</label>
        <input type="text" name="tuoi" required><br><br>
        <label>Giới tính:</label>
        <input type="text" name="gioitinh" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Tên tài khoản:</label>
        <input type="text" name="tentaikhoan" required><br><br>
        <label>Password:</label>
        <input type="password" name="matkhau" required><br><br>
        <?php
            if (isset($_SESSION['message'])) {
                echo "<p style='color: red; text-align: center;'>" . $_SESSION['message'] . "</p>";
                unset($_SESSION['message']);
            }
            ?>
        <input  style="background: linear-gradient(#fff0df, #6f6fe4);" type="submit" name="register" value=" Đăng ký " class="dangky"><div class="bottom-link" style="margin-top:20px ;">
                <p>Bạn đã có tài khoản ?</p>
                <a href="dangnhap.php" id="signup-link"> Đăng nhập ngay !</a></div>
    
    </form>
    </div>
    <div>
</body>
</html>