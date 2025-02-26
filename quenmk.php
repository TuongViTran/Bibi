<?php 
   
            if(isset($_POST['submit'])){
                $conn = new mysqli('localhost','root','tuongvi147','assign');
                if($_SERVER['REQUEST_METHOD']=='    '){
                    $data = json_decode(file_get_contents('php://input'),true);
                    $email = $data['email'];
                    $sql = "SELECT * FROM nguoidung WHERE email = '$email'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        $row = $result->fetch_assoc();
                        $mk = $row['pass'];
                        if(sendemail($email,$mk)){
                            echo json_encode(['one' => 'Vui lòng check mail để xem mật khẩu']);
                        }else{
                            $kq = array('Mật khẩu của bạn là ' => $mk);
                            echo json_encode($kq);
                        }
                    }else{
                        echo json_encode(['one'=>'không tìm thấy tài khoản']);
                    }
                }
                
                $to_Mail = $_POST['email'];
                $subject = "Nhận mật khẩu!";
                $content = "Mật khẩu của bạn là '" .$mk. "' vui lòng đừng quên nữa nhé! Thân ái cảm ơn!";
                $headers = 'From:trannguyentuongvy6578@gmail.com';
                if(mail($to_Mail, $subject, $content, $headers)) {
                    echo 'Send mail thành công!'; 
                } else {
                    echo 'Send mail thất bại!';
                }


            }
?>
           

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<style>
body{
  
   width: 100%;
   
}
.register_form{
   border-radius: 10px;
   margin: auto;
   margin-top: 50px;
   width: 400px;
   min-height: 330px;
   text-align: left;
   background-color: rgb(237, 237, 237);
   padding: 20px;
}
form h2{
   font-size: 24px;
   text-align: center;
   margin-bottom: 30px;
}
form label{
   font-weight: 600;
   font-size: 18px;
   
}
form input{
   margin-top: 10PX;
   margin-bottom: 10px;
   width: 390px;
   height: 27px;
   border: 1px gray solid;
   border-radius: 5px;
   padding-left: 10px;
}
form button{
   width: 100px;
   height: 30px;
   font-size: 15px;
   background-color: #ffffff;
   border: 2px solid gray;
   border-radius: 10px;
   margin-top: 20px;
   justify-content: center;
   margin-left: 150px;

}
form button:hover{
background-color: rgb(255, 225, 0);
   border:2px solid rgb(255, 225, 0) ;
   color: #FFFFFF;
}
a{
   text-decoration:none;
   color: blue;
}


</style>
</head>
<body>
<div class="register_form">
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  >
   <h2>Quên mật khẩu </h2>
   <label for="Email">Email :</label>
   <input type="email" name="email" placeholder="Enter email" >
<button name='submit' class='btn'  >Send</button><br>
   
  
</form>

</div>
</body>
</html>