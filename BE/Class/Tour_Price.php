<?php 
require_once("lib/database.php");
class Tour_Price{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function show_price(){
        $query = "SELECT * FROM tour_price";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_price($id){
        $query = "SELECT * FROM tour_price WHERE ID_tour = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_price($id){
        $query = "DELETE FROM tour_price WHERE ID_price = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }

    public function __destruct(){
        $this->db->link->close();
    }
}
?>