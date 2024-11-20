<?php 
require_once("lib/database.php");
class Tour_Detail{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function get_detail_tourID($id){
        $query = "SELECT * from tour_schedule as A INNER JOIN tourcode as B INNER JOIN tour_price as C 
        ON A.ID_Code = B.ID_Code and B.ID_Tour = C.ID_tour and B.ID_Tour =$id";
        $result = $this->db->select($query);
        return $result;
    }

    public function __destruct(){
        $this->db->link->close();
    }
}
?>