<?php 
require_once("lib/database.php");
class Tour_Region{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function show_tourRegion($name){
        $query = "SELECT * FROM tour_region ";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_tourRegion($id){
        $query = "SELECT * FROM tour_region WHERE ID_region = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_tourName($id){
        $query = "SELECT * FROM tour_region WHERE ID_TourRegion = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_schedule($id){
        $query = "DELETE FROM tour_region WHERE ID_TourRegion = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }

    public function __destruct(){
        $this->db->link->close();
    }
}
?>