<?php 
require_once("lib/database.php");
class Tour_Visa{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function show_visa(){
        $query = "SELECT * FROM tour_visa";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_visa($id){
        $query = "SELECT * FROM tour_visa WHERE ID_visa = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_visa($id){
        $query = "DELETE FROM tour_visa WHERE ID_visa = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }

    public function __destruct(){
        $this->db->link->close();
    }
}
?>