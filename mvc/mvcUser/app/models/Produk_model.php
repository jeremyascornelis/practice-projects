<?php
class Produk_model{
  
	private $table = "barang";
	private $table2 = "pesanan";
	private $db;

	public function __construct(){
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

	public function tambahDataPesanan($data) {
		$nama = $data['tnama'];
		$alamat = $data['talamat'];
		$telp = $data['ttelp'];
		$provinsi = $data['tprovinsi'];
		$jenis_pembayaran = $data['tbayar'];
		$norek_ewallet = $data['tnorek'];
		$jasa_pengiriman = $data['tjasakirim'];
		$biaya_pengiriman = $data['tbiayajasa'];
  
		$this->db->query('SELECT if(max(idorder)is null,1,max(idorder)+1) as maks_id  FROM ' . $this->table2);
		$data=$this->db->resultSet();
		foreach ($data as $rec){
			$id=$rec["maks_id"];
		}

		$this->db->query('INSERT INTO ' . $this->table2 . ' (idorder, nama_member, alamat, telp, provinsi, jenis_pembayaran, norek_ewallet, jasa_pengiriman, biaya_pengiriman) 
		VALUES(:id,:nama,:alamat,:telp,:provinsi,:jenis_pembayaran,:norek_ewallet,:jasa_pengiriman,:biaya_pengiriman)');
		$this->db->bind('id',$id);
		$this->db->bind('nama',$nama);
		$this->db->bind('alamat',$alamat);
		$this->db->bind('telp',$telp);
		$this->db->bind('provinsi',$provinsi);
		$this->db->bind('jenis_pembayaran',$jenis_pembayaran);
		$this->db->bind('norek_ewallet',$norek_ewallet);
		$this->db->bind('jasa_pengiriman',$jasa_pengiriman);
		$this->db->bind('biaya_pengiriman',$biaya_pengiriman);
  
		$this->db->execute();
  
		return $this->db->rowCount();
	  }
 
	public function uploadFoto($ft){
	    $namaFile = $ft['name'];
		$namaSementara = $ft['tmp_name'];
		// tentukan lokasi file akan dipindahkan
		$dirUpload = "img/daun/";
		// pindahkan file
		$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
		if ($terupload) {
			return true;
		} else {
			return false;
		}
	}

	public function add($data,$ff){
		$hasil=$this->uploadFoto($ff);
		if ($hasil){
			$foto=$ff['name'];	
			$nama = $data['tnama'];
			$hrg = $data['thrg'];
			$jml = $data['tjml'];
			$keterangan = $data['tket'];
			$this->db->query('SELECT if(max(id)is null,1,max(id)+1) as maks_id  FROM ' . $this->table);
			$data=$this->db->resultSet();
			foreach ($data as $rec){
			  $id=$rec["maks_id"];
			}		  
			$this->db->query('INSERT INTO ' . $this->table . ' (id,nama,hrg,jml,keterangan,foto) 
			VALUES(:id,:nama, :hrg, :jml,:keterangan,:foto)');
			$this->db->bind('id',$id);
			$this->db->bind('nama',$nama);
			$this->db->bind('hrg',$hrg);
			$this->db->bind('jml',$jml);
			$this->db->bind('keterangan',$keterangan);
			$this->db->bind('foto',$foto);
			$this->db->execute();
			return true;
		}else
			return false;
	}

	public function edit($data,$ff){
		$id=$data["tid"];
		$nama=$data['tnama'];
		$hrg=$data['thrg'];
		$jml=$data['tjml'];
		$keterangan=$data['tket'];				  
		$foto_lama=$data['foto_lama'];		  	
		if(isset($data['ubah_foto'])){ 
			if ($this->uploadFoto($ff)){
				$foto=$ff['name'];	
				$sql="update barang set nama='$nama',jml='$jml',hrg='$hrg',keterangan='$keterangan',foto='$foto' where id='$id'";
				$this->db->query($sql);
				$hasil=$this->db->execute();
				unlink("img/daun/".$foto_lama);		 		 			
			}	
		}else{
			$sql="update barang set nama='$nama',jml='$jml',hrg='$hrg',keterangan='$keterangan' where id='$id'";
			$this->db->query($sql);
			$this->db->execute();
		}

	}
	public function del($id){
	  	$data['produk']=$this->getProductById($id);
		$foto=$data['produk']['foto'];
		$sql="delete from barang where id='$id'";
		$hasil=$this->db->query($sql);
		$this->db->execute();		
		if ($foto!=""){
			unlink("img/daun/".$foto);
	  }		  
	}

	public function cariDataProduk() {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM barang WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}

