<?php 
require_once("lib/database.php");
class Tour{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function show_tour(){
        $query = "SELECT * FROM thongtin_tour";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_tour($id){
        $query = "SELECT * FROM thongtin_tour WHERE ID_TourRegion = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_tour($id){
        $query = "DELETE FROM thongtin_tour WHERE ID_tour = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }
}
?>