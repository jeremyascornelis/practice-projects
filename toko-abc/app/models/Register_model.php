<?php

class Register_model {
    private $table = "tbl_user";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addData($data) {
        $nama = $data['nama'];
        $username = $data['username'];
        $telp = $data['no_telp'];
        $password = $data['password'];
        $alamat = $data['alamat'];
        $provinsi = $data['nama_provinsi'];
        $gender = $data['gender'];

        $kota = $data['nama_distrik'];
        $detail_kota = explode(',', $kota);
        $idKota = $detail_kota[0];
        $namaKota = $detail_kota[1];

        $kodepos = $data['kodepos'];

        $this->db->query('SELECT if(max(iduser)is null,1,max(iduser)+1) as maks_id  FROM ' . $this->table);
        $data=$this->db->resultSet();
        foreach ($data as $rec){
            $id=$rec["maks_id"];
        }

        $this->db->query('INSERT INTO ' . $this->table . ' (iduser,nama_user,alamat,notelp,gender,distrik,id_distrik,kodepos,provinsi,username,password) 
        VALUES(:id,:nama_user, :alamat, :telp,:gender,:distrik,:id_distrik,:kodepos, :provinsi,:username, :password)');
        $this->db->bind('id',$id);
        $this->db->bind('nama_user',$nama);
        $this->db->bind('alamat',$alamat);
        $this->db->bind('telp',$telp);
        $this->db->bind('gender',$gender);
        $this->db->bind('distrik',$namaKota);
        $this->db->bind('id_distrik',$idKota);
        $this->db->bind('kodepos',$kodepos);
        $this->db->bind('provinsi',$provinsi);
        $this->db->bind('username',$username);
        $this->db->bind('password',$password);

        $res = $this->db->execute();

        if($res) {
            return true;
        } else {
            return false;
        }

    }

}