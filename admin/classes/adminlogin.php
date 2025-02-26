<?php
include '../lib/session.php';
Session::checkLogin(); // Correct method call
include '../lib/database.php';
include '../helpers/format.php';
?>

<?php
class adminlogin 
{
    private $db; 
    private $fm; 

    public function __construct() // Corrected method name
    {
       $this->db = new Database();
       $this->fm = new Format(); // Corrected object instantiation
    }

    // Kiểm tra các biến, dấu câu
    public function login_admin($adminUser, $adminPass) {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        // Kết nối với CSDL
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

        if (empty($adminUser) || empty($adminPass)) { // Fixed typo
            $alert = "Vui lòng không để ô trống";
            return $alert; // Return the alert message
        } else {
            $query = "SELECT * FROM Admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set('adminlogin', true); // Use Session with correct casing
                Session::set('adminId', $value['adminId']);
                Session::set('adminUser', $value['adminUser']);
                Session::set('adminName', $value['adminName']); // Removed extra space
                header('Location:index.php');
            } else {
                $alert = "Tên hoặc mật khẩu không trùng khớp";
                return $alert;
            }

            // fetch_assoc tìm và trả về 1 kết quả truy vấn trong CSDL
        }
    }
}
?>