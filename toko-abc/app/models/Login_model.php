<?php

class Login_model {
    private $table = "tbl_user";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function cekUser($username, $pass) {
        $sql = "SELECT * FROM " . $this->table . " WHERE username='$username' and password='$pass'";
        $this->db->query($sql);
        return $this->db->single();
    }

    public function getAllUser() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getAllUserById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }


}