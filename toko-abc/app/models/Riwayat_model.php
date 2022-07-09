<?php

class Riwayat_model {
    private $table = "tbl_pesanan";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTransaksiById($id){
		$sql="SELECT * FROM " . $this->table . " WHERE iduser=:id";
		$this->db->query($sql);
		$this->db->bind('id',$id);
		return $this->db->resultSet();
	}

}