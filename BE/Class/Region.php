<?php 
require_once("lib/database.php");
class Region{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function show_region(){
        $query = "SELECT * FROM region";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_tourRegion($id){
        $query = "SELECT * FROM region WHERE ID_region = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_schedule($id){
        $query = "DELETE FROM region WHERE ID_region = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }

    public function __destruct(){
        $this->db->link->close();
    }
}
?>