<?php

class Produk_model {
    private $table = "tbl_produk";
	private $table2 = "tbl_pesanan";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllProduct(){
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getProductById($id){
		$sql="SELECT * FROM " . $this->table . " WHERE idproduk=:id";
		$this->db->query($sql);
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahDataPesanan($data) {
		$iduser = $data["iduser"];
		$nama = $data["nama"];
		$telp = $data["telp"];
		$jenis_bayar = $data["jenisbayar"];
		$no_rekening = $data["norek"];
		$jasa_pengiriman = $data["jasakirim"];
		$jenis_paket = $data["jenispaket"];
		$total_produk = $data["total_produk"];
		$total_bayar = $data["total_bayar"];

		$this->db->query('SELECT if(max(idorder)is null,1,max(idorder)+1) as maks_id  FROM ' . $this->table2);
		$data=$this->db->resultSet();
		foreach ($data as $rec){
			$id=$rec["maks_id"];
		}

		$this->db->query('INSERT INTO ' . $this->table2 . ' (idorder,iduser,nama_pemesan,telp,jenis_pembayaran,no_rekening,jasa_pengiriman,jenis_paket,total_produk,total_bayar) 
		VALUES(:id,:iduser,:nama,:telp, :jenispembayaran, :norekening , :jasa_pengiriman,:jenis_paket,:totalproduk,:totalbayar)');
		$this->db->bind('id',$id);
		$this->db->bind('iduser',$iduser);
		$this->db->bind('nama',$nama);
		$this->db->bind('telp',$telp);
		$this->db->bind('jenispembayaran',$jenis_bayar);
		$this->db->bind('norekening',$no_rekening);
		$this->db->bind('jasa_pengiriman',$jasa_pengiriman);
		$this->db->bind('jenis_paket',$jenis_paket);
		$this->db->bind('totalproduk',$total_produk);
		$this->db->bind('totalbayar',$total_bayar);
		$res=$this->db->execute();
		if($res){
			return true;
		}else{
			return false;
		}

	}

}