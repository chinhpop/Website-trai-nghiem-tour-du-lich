<?php 
require_once("lib/database.php");
class Tour_Policy{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function show_policy(){
        $query = "SELECT * FROM tour_policy";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_policy($id){
        $query = "SELECT * FROM tour_policy WHERE ID_policy = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_policy($id){
        $query = "DELETE FROM tour_policy WHERE ID_policy = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }

    public function __destruct(){
        $this->db->link->close();
    }
}
?>