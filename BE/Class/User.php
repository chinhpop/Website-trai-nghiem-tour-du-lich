<?php 
require_once("lib/database.php");
class User{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }


    public function get_user($username, $password){
        $query = "SELECT * FROM account_user WHERE Username = '$username' AND Password = '$password'";
        $result = $this->db->select($query);
        return $result;
    }

    public function insert_user($username, $password, $Fullname, $Email, $Phone, $Address){
        $query = "INSERT INTO account_user (Username, Password, level, Fullname, Email, Phone, Address) 
        VALUES ('$username', '$password', '2', '$Fullname', '$Email', '$Phone', '$Address')";
        $result = $this->db->insert($query);
        return $result;
    }

    public function delete_user($id){
        $query = "DELETE FROM account_user WHERE ID_User = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }
}
?>