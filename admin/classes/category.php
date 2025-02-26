<?php
include '../lib/database.php';
include '../helpers/format.php';
?>
<?php
class category
{
    private $db; 
    private $fm; 

    public function __construct() // Corrected method name
    {
       $this->db = new Database();
       $this->fm = new Format(); // Corrected object instantiation
    }

    // Kiểm tra các biến, dấu câu
    public function insert_category($catName) {
        $catName = $this->fm->validation($catName);
        // Kết nối với CSDL
        $catName  = mysqli_real_escape_string($this->db->link, $catName);
      
        if (empty($catName)) { // Fixed typo
            $alert = "Vui lòng không để ô trống";
            return $alert; // Return the alert message
        } else { 
            $query = "INSERT INTO category(catName) VALUES ('$catName')";
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

        
     public function show_category(){
        $query = " SELECT * FROM category order by catId desc";
        $result = $this->db->select($query);
        return $result; 
        //ftim va suat gia tri dau 
     }
     
     public function update_category($catName,$id) {
        $catName = $this->fm->validation($catName);
        // Kết nối với CSDL
        $catName  = mysqli_real_escape_string($this->db->link, $catName);
        $id = mysqli_real_escape_string($this->db->link, $id);
      
        if (empty($catName)) { 
            $alert = "Vui lòng không để ô trống";
            return $alert; // Return the alert message
        } else { 
            $query = "UPDATE category SET catName ='$catName' WHERE catId = '$id'";
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


     public function del_category($id){
        $query = " DELETE FROM category where catId ='$id'";
        $result = $this->db->delete($query); 
        if($result){
            $alert = "<span class= 'success'> Xóa thành công </span> ";
            return $alert;
        }else {
            $alert ="<span class= 'error'> Xóa thất bại </span> ";
            return $alert; 

        }
     }
       
     public function getcatbyId($id){
        $query = " SELECT * FROM category where catId ='$id'" ;
        $result = $this->db->select($query);
        return $result; 
        

     }


    }

?>