<?php

class Operasi_db
{
    private $con;
 
    function __construct()
    {
        require_once dirname(__FILE__) . '/Koneksikan_ke_db.php';
        $db = new Koneksikan_ke_db();
        $this->con = $db->connect();
    }

	public function barang_keluar_create($id_keluar, $id_barang, $tanggal_keluar, $jumlah_keluar){
		$stmt = $this->con->prepare("INSERT INTO `barang_keluar` (`id_keluar`, `id_barang`, `tanggal_keluar`, `jumlah_keluar`) 
										VALUES (?, ?,?, ?,?)");
		$stmt->bind_param("sssss", $id_keluar, $id_barang, $tanggal_keluar, $jumlah_keluar);
		if($stmt->execute())
			return true; 
		return false; 
	}

	public function barang_masuk_create($id_masuk, $id_barang, $tanggal_masuk, $jumlah_masuk){
		$stmt = $this->con->prepare("INSERT INTO `barang_masuk` (`id_masuk`, `id_barang`, `tanggal_masuk`, `jumlah_masuk`) 
										VALUES (?, ?,?, ?,?)");
		$stmt->bind_param("sssss", $id_masuk, $id_barang, $tanggal_masuk, $jumlah_masuk);
		if($stmt->execute())
			return true; 
		return false; 
	}
	
	public function data_barang_create($id_barang, $nama_produk, $jumlah, $harga, $keterangan){
		$stmt = $this->con->prepare("INSERT INTO `data_barang` (`id_barang`, `nama_produk`, `jumlah`, `harga`, `keterangan` ) 
										VALUES (?, ?,?, ?,?)");
		$stmt->bind_param("sssss", $id_barang, $nama_produk, $jumlah, $harga, $keterangan);
		if($stmt->execute())
			return true; 
		return false; 
	}

	public function login_admin_create($id_operator, $nama_pengguna, $password){
		$stmt = $this->con->prepare("INSERT INTO `login_admin`(`id_operator`, `nama_pengguna`, `password`) 
										VALUES (?, ?,?, ?,?)");
		$stmt->bind_param("sssss", $id_operator, $nama_pengguna, $password);
		if($stmt->execute())
			return true; 
		return false; 
	}
 
	public function supplier_create($id_supplier, $nama_supplier, $alamat, $telp){
		$stmt = $this->con->prepare("INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `telp`) 
										VALUES (?, ?,?, ?,?)");
		$stmt->bind_param("sssss", $id_supplier, $nama_supplier, $alamat, $telp);
		if($stmt->execute())
			return true; 
		return false; 
	}

	
	
	public function barang_keluar_view(){
		$stmt = $this->con->prepare("SELECT * FROM barang_keluar");
		$stmt->execute();
		$stmt->bind_result($id_keluar, $id_barang, $tanggal_keluar, $jumlah_keluar);
		$barang_keluar = array();
		
		while($stmt->fetch()){
			$data = array(); 
			$data['id_keluar'] = $id_keluar; 
			$data['id_barang'] = $id_barang; 
			$data['tanggal_keluar'] = $tanggal_keluar; 
			$data['jumlah_keluar'] = $jumlah_keluar; 
			array_push($barang_keluar, $data);
		}
		return $barang_keluar; 
	}

	public function barang_masuk_view(){
		$stmt = $this->con->prepare("SELECT * FROM barang_masuk");
		$stmt->execute();
		$stmt->bind_result($id_masuk, $id_barang, $tanggal_masuk, $jumlah_masuk);
		$barang_keluar = array();
		
		while($stmt->fetch()){
			$data = array(); 
			$data['id_masuk'] = $id_masuk; 
			$data['id_barang'] = $id_barang; 
			$data['tanggal_masuk'] = $tanggal_masuk; 
			$data['jumlah_masuk'] = $jumlah_masuk; 
			array_push($barang_masuk, $data);
		}
		return $barang_masuk; 
	}

	public function data_barang_view(){
		$stmt = $this->con->prepare("SELECT * FROM data_barang");
		$stmt->execute();
		$stmt->bind_result($id_barang, $nama_produk, $jumlah, $harga, $keterangan );
		$barang_keluar = array();
		
		while($stmt->fetch()){
			$data = array(); 
			$data['id_barang'] = $id_barang; 
			$data['nama_produk'] = $nama_produk; 
			$data['jumlah'] = $jumlah; 
			$data['harga'] = $harga; 
			$data['keterangan'] = $keterangan; 

			array_push($data_barang, $data);
		}
		return $data_barang; 
	}

	public function login_admin_view(){
		$stmt = $this->con->prepare("SELECT * FROM login_admin");
		$stmt->execute();
		$stmt->bind_result($id_operator, $nama_pengguna, $password);
		$barang_keluar = array();
		
		while($stmt->fetch()){
			$data = array(); 
			$data['id_operator'] = $id_operator; 
			$data['nama_pengguna'] = $nama_pengguna; 
			$data['password'] = $password; 
			array_push($barang_masuk, $data);
		}
		return $login_admin;
	}

	public function supplier_view(){
		$stmt = $this->con->prepare("SELECT * FROM supplier");
		$stmt->execute();
		$stmt->bind_result($id_supplier, $nama_supplier, $alamat, $telp);
		$barang_keluar = array();
		
		while($stmt->fetch()){
			$data = array(); 
			$data['id_supplier'] = $id_supplier; 
			$data['nama_supplier'] = $nama_supplier; 
			$data['alamat'] = $alamat; 
			$data['telp'] = $telp; 
			array_push($barang_masuk, $data);
		}
		return $supplier; 
	}
	
}

