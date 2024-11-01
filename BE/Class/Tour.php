<?php 
    include("../lib/database.php");
?>

<?php 
Class Tour{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function show_tour(){
        $query = "SELECT * FROM tour";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_tour($id){
        $query = "SELECT * FROM tour WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_tour($id){
        $query = "DELETE FROM tour WHERE id = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }
}
?>