<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function index(){
		// Dekralasikan variabel awal dan akhir sesuai dengan apa yang diinput user.
		$awal = $this->input->post('awal');
		$akhir = $this->input->post('akhir');
		// Buat logika untuk men-cek apakah variabel diatas berisi atau tidak.
		if($awal == '' || $akhir == ''){ 
			// Jika variabel awal atau akhir tidak berisi, maka eksekusi queri berikut:
			$data['data'] = $this->db->query("SELECT *, jumlah_beli*harga_satuan 'subtotal', ((jumlah_beli*harga_satuan) - (jumlah_beli*harga_satuan / 100)) 'totalharga' FROM penjualan JOIN produk ON produk.`id_produk` = penjualan.`id_product` JOIN kategori ON kategori.`id_kategory` = produk.`id_kategory` ORDER BY id_penjualan ASC");
		}else{ 
			// Jika variabel awal atau akhirnya berisi, maka eksekusi queri berikut:
			$data['data'] = $this->db->query("SELECT *, jumlah_beli*harga_satuan 'subtotal', ((jumlah_beli*harga_satuan) - (jumlah_beli*harga_satuan / 100)) 'totalharga' FROM penjualan JOIN produk ON produk.`id_produk` = penjualan.`id_product` JOIN kategori ON kategori.`id_kategory` = produk.`id_kategory` WHERE tgl_penjualan BETWEEN '$awal' AND '$akhir' ORDER BY id_penjualan ASC");
		}
		// Hasil queri diatas telah ditampung kedalam variabel $data.
		// Panggil view "halaman-penjualan.php" dengan membawa data yang telah ada didalam variabel $data.
		$this->load->view('halaman-penjualan',$data);
	}

}
