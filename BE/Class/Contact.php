<?php 
require_once("lib/database.php");
class Contact{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function show_contact(){
        $query = "SELECT * FROM contact";
        $result = $this->db->select($query);
        return $result;
    }

    public function insert_contact($fullname, $phone, $Address, $Email, $content, $ID_User){
        $query = "INSERT INTO contact (Fullname, Phone, Address, Email, Content, ID_User) 
        VALUES ('$fullname', '$phone', '$Address', '$Email', '$content', '$ID_User')";
        $result = $this->db->insert($query);
        return $result;
    }

    public function get_contact($id){
        $query = "SELECT * FROM contact WHERE ID_User = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_contact($id){
        $query = "DELETE FROM contact WHERE ID_Contact = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }
}
?>