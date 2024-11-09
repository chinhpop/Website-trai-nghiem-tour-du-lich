<?php 
require_once("lib/database.php");
class Tour_Schedule{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function show_schedule(){
        $query = "SELECT * FROM tour_schedule";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_schedule($id){
        $query = "SELECT * FROM tour_schedule WHERE ID_schedule = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_schedule($id){
        $query = "DELETE FROM tour_schedule WHERE ID_schedule = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }

    public function __destruct(){
        $this->db->link->close();
    }
}
?>