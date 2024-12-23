<?php 
require_once("lib/database.php");
class Payment{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function show_payment()
    {
       $query= "SELECT * FROM payment";
       $result= $this->db->select($query);  
       return $result;    
       }

    public function get_payment($id){
        $query = "SELECT * FROM payment WHERE ID_User=$id";
        $result = $this->db->select($query);
        return $result;
    }


    public function insert_payment($ID_CodeTour, $Date, $tong, $price_sum,  $id_user){
        $query = "INSERT INTO payment (ID_CodeTour, Date, tong, price_sum, status,  ID_User) 
        VALUES ('$ID_CodeTour', '$Date', '$tong', '$price_sum', '0',  '$id_user')";
        $result = $this->db->insert($query);
        return $result;
    }

    public function update_payment($status, $id_payment){
        $query = "UPDATE payment SET status = '$status' WHERE ID_payment = '$id_payment'";
        $result = $this->db->update($query);
        return $result;
    }

    public function delete_payment($id){
        $query = "DELETE FROM payment WHERE ID_payment = '$id'";
        $result = $this->db->delete($query);
        return $result;
    }
}
?>