<?php

class Produk_model {
    private $table = "tbl_produk";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllProduct(){
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getProductById($id){
		$sql="SELECT * FROM " . $this->table . " WHERE id=:id";
		$this->db->query($sql);
		$this->db->bind('id',$id);
		return $this->db->single();
	}


}