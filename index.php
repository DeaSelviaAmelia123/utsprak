<?php 
	require_once 'Operasi_db.php';
	
	$response = array(); 
	
	
	if(isset($_GET['op'])){
		
		switch($_GET['op']){
			
			case 'barang_keluar':
				if(isset($_GET['id_keluar']) && isset($_GET['id_barang']) && isset($_GET['tanggal_keluar']) && isset($_GET['jumlah_keluar'])){
					$db = new Operasi_db(); 
					if($db->barang_keluar($_GET['id_keluar'] , $_GET['id_barang'] , $_GET['tanggal_keluar'] , $_GET['jumlah_keluar'])){
						$response['error'] = false;
						$response['message'] = 'Data barang keluar berhasil diinput';
					}else{
						$response['error'] = true;
						$response['message'] = 'Data barang keluar berhasil diinput';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Error, data yang dikirimkan kurang';
				}
			break; 

			case 'barang_masuk':
				if(isset($_GET['id_masuk']) && isset($_GET['id_barang']) && isset($_GET['tanggal_masuk']) && isset($_GET['jumlah_masuk'])){
					$db = new Operasi_db(); 
					if($db->barang_masuk($_GET['id_masuk'] , $_GET['id_barang'] , $_GET['tanggal_masuk'] , $_GET['jumlah_masuk'])){
						$response['error'] = false;
						$response['message'] = 'Data barang masuk berhasil diinput';
					}else{
						$response['error'] = true;
						$response['message'] = 'Data barang masuk berhasil diinput';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Error, data yang dikirimkan kurang';
				}
			break; 

			case 'data_barang':
				if(isset($_GET['id_barang']) && isset($_GET['nama_produk']) && isset($_GET['jumlah']) && isset($_GET['harga']) && isset($_GET['keterangan'])){
					$db = new Operasi_db(); 
					if($db->data_barang($_GET['id_barang'] , $_GET['nama_produk'] , $_GET['jumlah'] , $_GET['harga']) && isset($_GET['keterangan'])){
						$response['error'] = false;
						$response['message'] = 'Data barang berhasil diinput';
					}else{
						$response['error'] = true;
						$response['message'] = 'Data barang berhasil diinput';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Error, data yang dikirimkan kurang';
				}
			break; 

			case 'login_admin':
				if(isset($_GET['id_operator']) && isset($_GET['nama_pengguna']) && isset($_GET['password'])){
					$db = new Operasi_db(); 
					if($db->barang_keluar($_GET['id_operator'] , $_GET['nama_pengguna'] , $_GET['password']){
						$response['error'] = false;
						$response['message'] = 'Data admin berhasil diinput';
					}else{
						$response['error'] = true;
						$response['message'] = 'Data admin berhasil diinput';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Error, data yang dikirimkan kurang';
				}
			break; 

			case 'supplier':
				if(isset($_GET['id_supplier']) && isset($_GET['nama_supplier']) && isset($_GET['alamat']) && isset($_GET['telp'])){
					$db = new Operasi_db(); 
					if($db->barang_keluar($_GET['id_barang'] , $_GET['nama_produk'] , $_GET['jumlah'] , $_GET['harga']) && isset($_GET['keterangan'])){
						$response['error'] = false;
						$response['message'] = 'Data supplier berhasil diinput';
					}else{
						$response['error'] = true;
						$response['message'] = 'Data supplier berhasil diinput';
					}
				}else{
					$response['error'] = true; 
					$response['message'] = 'Error, data yang dikirimkan kurang';
				}
			break; 
			

			
			case 'barang_keluar_view':
				$db = new Operasi_db();
				$barang_keluar = $db->barang_keluar_view();
				if(count($barang_keluar)<=0){
					$response['error'] = true; 
					$response['message'] = 'data tidak ditemukan';
				}else{
					$response['error'] = false; 
					$response['barang_keluar'] = $barang_keluar;
				}
			break; 

			case 'barang_masuk_view':
				$db = new Operasi_db();
				$barang_masuk = $db->barang_masuk_view();
				if(count($barang_masuk)<=0){
					$response['error'] = true; 
					$response['message'] = 'data tidak ditemukan';
				}else{
					$response['error'] = false; 
					$response['barang_masuk'] = $barang_masuk;
				}
			break; 
			
			case 'data_barang_view':
				$db = new Operasi_db();
				$data_barang = $db->data_barang_view();
				if(count($data_barang<=0){
					$response['error'] = true; 
					$response['message'] = 'data tidak ditemukan';
				}else{
					$response['error'] = false; 
					$response['data_barang'] = $data_barang;
				}
			break; 

			case 'login_admin_view':
				$db = new Operasi_db();
				$login_admin = $db->login_admin_view();
				if(count($login_admin)<=0){
					$response['error'] = true; 
					$response['message'] = 'data tidak ditemukan';
				}else{
					$response['error'] = false; 
					$response['login_admin'] = $login_admin;
				}
			break; 

			case 'supplier_view':
				$db = new Operasi_db();
				$supplier = $db->supplier_view();
				if(count($supplier)<=0){
					$response['error'] = true; 
					$response['message'] = 'data tidak ditemukan';
				}else{
					$response['error'] = false; 
					$response['supplier'] = $supplier;
				}
			break; 
			default:
				$response['error'] = true;
				$response['message'] = 'Anda tidak ingin ngapa ngapain';
			
		}
		
	}else{
		$response['error'] = false; 
		$response['message'] = 'Permintaan anda tidak dapat diterima';
	}
	
	echo json_encode($response);