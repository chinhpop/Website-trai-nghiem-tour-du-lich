<?php 
require_once("lib/database.php");
class Tour_Code{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function show_code(){
        $query = "SELECT * FROM tourcode";
        $result = $this->db->select($query);
        return $result;
    }


    public function get_code($id){
        $query = "SELECT * FROM tourcode WHERE ID_Code = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_code($id){
        $query = "DELETE FROM tourcode WHERE ID_Code = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }

    public function __destruct(){
        $this->db->link->close();
    }
}
?>