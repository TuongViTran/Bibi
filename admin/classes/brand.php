<?php
include '../lib/database.php';
include '../helpers/format.php';
?>
<?php
class brand
{
    private $db; 
    private $fm; 

    public function __construct() // Corrected method name
    {
       $this->db = new Database();
       $this->fm = new Format(); // Corrected object instantiation
    }

    // Kiểm tra các biến, dấu câub
    public function insert_brand($brandName) {
        $brandName= $this->fm->validation($brandName);
        // Kết nối với CSDL
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
      
        if (empty($brandName)) { // Fixed typo
            $alert = "Vui lòng không để ô trống";
            return $alert; // Return the alert messages
        } else { 
            $query = "INSERT INTO brand(brandName) VALUES ('$brandName')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class= 'success'> Thêm mới thành công </span> ";
                return $alert;
            }else {
                $alert ="<span class= 'error'> Thêm mới thất bại </span> ";
                return $alert; 

            }
            }
            

            // fetch_assoc tìm và trả về 1 kết quả truy vấn trong CSDL
        }

        
     public function show_brand(){
        $query = " SELECT * FROM brand order by brandId desc";
        $result = $this->db->select($query);
        return $result; 
        //ftim va suat gia tri dau 

     }
     public function update_brand($brandName ,$id) {
        $brandName  = $this->fm->validation($brandName );
        // Kết nối với CSDL
        $brandName   = mysqli_real_escape_string($this->db->link, $brandName );
        $id = mysqli_real_escape_string($this->db->link, $id);
      
        if (empty($brandName )) { 
            $alert = "Vui lòng không để ô trống";
            return $alert; // Return the alert message
        } else { 
            $query = "UPDATE brand SET brandName  ='$brandName ' WHERE brandId = '$id'";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class= 'success'> Sửa thành công </span> ";
                return $alert;
            }else {
                $alert ="<span class= 'error'> Sửa thất bại </span> ";
                return $alert; 

            }
            }
            

            // fetch_assoc tìm và trả về 1 kết quả truy vấn trong CSDL
        } 


     public function del_brand($id){
        $query = " DELETE FROM brand where brandId ='$id'";
        $result = $this->db->delete($query); 
        if($result){
            $alert = "<span class= 'success'> Xóa thành công </span> ";
            return $alert;
        }else {
            $alert ="<span class= 'error'> Xóa thất bại </span> ";
            return $alert; 

        }
     }
       
     public function getbrandbyId($id){
        $query = " SELECT * FROM brand where brandId ='$id'" ;
        $result = $this->db->select($query);
        return $result; 
        

     }


    }

?>