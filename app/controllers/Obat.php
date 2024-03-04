<?php
if (!isset($_SESSION['id_user'])) {
	// Jika session id_user sudah ada, arahkan ke halaman obat
	$_SESSION['pesan'] = 'Anda belum login, tidak bisa mengakses halaman ini';
	header('Location: ' . BASEURL . '/auth/login');
	exit;
}

class Obat extends Controller
{
	public function index()
	{
		$data['judul'] = "Home";
		$data['obat'] = $this->model('Obat_model')->getAllObat();

		$data['totalObat'] = $this->model('Obat_model')->hitungJumlahObat();
		$data['totalObatStokDibawah10'] = $this->model('Obat_model')->hitungObatStokDibawah10();
		$data['totalObatStokNol'] = $this->model('Obat_model')->hitungObatStokNol();

		$this->view('templates/header', $data);
		$this->view('obat/index', $data);
		$this->view('templates/footer');
	}

	public function tambah_obat()
	{
		if ($this->model('Obat_model')->tambahDataObat($_POST) > 0) {
			$_SESSION['pesan'] = 'Tambah Data Obat Berhasil!';
			header('Location: ' . BASEURL . '/obat');
			exit;
		} else {
			$_SESSION['pesan'] = 'Tambah Data Obat Gagal';
			header('Location: ' . BASEURL . '/obat');
			exit;
		}
	}

	public function edit_obat()
	{
		if ($this->model('Obat_model')->editDataObat($_POST) > 0) {
			$_SESSION['pesan'] = 'Edit Data Obat Berhasil!';
			header('Location: ' . BASEURL . '/obat');
			exit;
		} else {
			$_SESSION['pesan'] = 'Edit Data Obat Gagal';
			header('Location: ' . BASEURL . '/obat');
			exit;
		}
	}

	public function hapus_obat()
	{
		if ($this->model('Obat_model')->hapusDataObat($_POST['id_obat']) > 0) {
			$_SESSION['pesan'] = 'Hapus Data Obat Berhasil!';
			header('Location: ' . BASEURL . '/obat');
			exit;
		} else {
			$_SESSION['pesan'] = 'Hapus Data Obat Gagal';
			header('Location: ' . BASEURL . '/obat');
			exit;
		}
	}
}
