<?php 
require_once("lib/database.php");
class Tour_Program{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function show_program(){
        $query = "SELECT * FROM tour_program";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_program($id){
        $query = "SELECT * FROM tour_program WHERE ID_tour = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_program($id){
        $query = "DELETE FROM tour_program WHERE ID_tour = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }

    public function __destruct(){
        $this->db->link->close();
    }
}
?>