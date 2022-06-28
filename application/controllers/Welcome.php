<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_app');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function app()
	{

		$option = array(
			'Lampu' 		=> 'Lampu',
			'Ban Luar'		=> 'Ban Luar',
			'Ban Tubles'	=> 'Ban Tubles',
			'Oli Mesin'		=> 'Oli Mesin',
			'Oli Gardan'	=> 'Oli Gardan',
			'Karbulator'	=> 'Karbulator',
			'Velg'			=> 'Velg',
			'Kampas Rem'	=> 'Kampas Rem',
			'Ban Dalam'		=> 'Ban Dalam',
			'Busi'			=> 'Busi'
		);

		$data = array(
			'sparepart' => $option,
			'transaksi' => $this->M_app->get_app()
		);

		$this->load->view('app', $data);
	}

	public function tambah()
	{
		$pelanggan = $this->input->post('nama_pelanggan');
		$nama = $this->input->post('nama_barang');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('qty');

		$tot = $harga * $jumlah;

		if ($tot < 250000) {
			$diskon = 0;
		} else if ($tot == 250000 || $tot < 300000) {
			$diskon = 25000;
		} else if ($tot == 300000 || $tot < 400000) {
			$diskon = 30000;
		} else if ($tot == 400000 || $tot < 600000) {
			$diskon = 40000;
		} else if ($tot >= 600000) {
			$diskon = 60000;
		}

		$sub_total = $tot;
		$data = array(
			'nama_pelanggan'	=> $pelanggan,
			'nama_barang' 		=> $nama,
			'harga' 			=> $harga,
			'qty' 				=> $jumlah,
			'diskon' 			=> $diskon,
			'sub_total'			=> $sub_total
		);

		$this->M_app->tambah($data);

		redirect('app');
	}

	public function update($id)
	{
		$pelanggan = $this->input->post('nama_pelanggan');
		$nama = $this->input->post('nama_barang');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('qty');

		$tot = $harga * $jumlah;

		if ($tot < 250000) {
			$diskon = 0;
		} else if ($tot == 250000 || $tot < 300000) {
			$diskon = 25000;
		} else if ($tot == 300000 || $tot < 400000) {
			$diskon = 30000;
		} else if ($tot == 400000 || $tot < 600000) {
			$diskon = 40000;
		} else if ($tot >= 600000) {
			$diskon = 60000;
		}

		$sub_total = $tot;
		$data = array(
			'nama_pelanggan'	=> $pelanggan,
			'nama_barang' 		=> $nama,
			'harga' 			=> $harga,
			'qty' 				=> $jumlah,
			'diskon' 			=> $diskon,
			'sub_total'			=> $sub_total
		);

		$this->M_app->edit($id, $data);
		redirect('app');
	}

	public function delete($id)
	{
		$this->M_app->delete($id);
		redirect('app');
	}
}
