<?php

class Auth extends Controller
{
	public function login()
	{
		if (isset($_SESSION['id_user'])) {
			// Jika session id_user sudah ada, arahkan ke halaman obat
			$_SESSION['pesan'] = 'Anda sudah login, tidak bisa mengakses halaman ini lagi';
			header('Location: http://localhost/esbi/public/obat');
			exit;
		}
		$data['judul'] = "Login";
		$this->view('login', $data);
	}

	public function proses_login()
	{
		if (isset($_SESSION['id_user'])) {
			// Jika session id_user sudah ada, arahkan ke halaman obat
			$_SESSION['pesan'] = 'Anda sudah login, tidak bisa mengakses halaman ini lagi';
			header('Location: http://localhost/esbi/public/obat');
			exit;
		}

		$email = $_POST['email'];
		$password = $_POST['password'];

		$userModel = $this->model('User_model');
		$user = $userModel->getUserByEmail($email);
		if ($user) {
			if (password_verify($password, $user['password'])) {
				// Password cocok, lakukan proses login
				$_SESSION['id_user'] = $user['id_user']; // Menyimpan ID user di session
				$_SESSION['nama'] = $user['nama']; // Menyimpan nama user di session
				$_SESSION['email'] = $user['email']; // Menyimpan email user di session

				header('Location: ' . BASEURL . '/obat'); // Mengarahkan pengguna ke halaman dashboard
				exit;
			} else {
				// Password tidak cocok, beri pesan kesalahan
				$_SESSION['pesan'] = 'Password salah';
				header('Location: ' . BASEURL . '/auth/login');
				exit;
			}
		} else {
			$_SESSION['pesan'] = 'Akun tidak ditemukan, silahkan daftar terlebih dahulu';
			header('Location: ' . BASEURL . '/auth/login');
			exit;
		}
	}


	public function register()
	{
		if (isset($_SESSION['id_user'])) {
			// Jika session id_user sudah ada, arahkan ke halaman obat
			$_SESSION['pesan'] = 'Anda sudah login, tidak bisa mengakses halaman ini lagi';
			header('Location: http://localhost/esbi/public/obat');
			exit;
		}

		$data['judul'] = "Register";
		$this->view('register', $data);
	}

	public function proses_register()
	{
		if (isset($_SESSION['id_user'])) {
			// Jika session id_user sudah ada, arahkan ke halaman obat
			$_SESSION['pesan'] = 'Anda sudah login, tidak bisa mengakses halaman ini lagi';
			header('Location: http://localhost/esbi/public/obat');
			exit;
		}

		// Memeriksa apakah email sudah ada dalam database sebelum menambahkan user baru
		$userModel = $this->model('User_model');
		if ($userModel->getUserByEmail($_POST['email'])) {
			// Email sudah ada, beri pesan kesalahan
			$_SESSION['pesan'] = 'Email sudah terdaftar';
			header('Location: ' . BASEURL . '/auth/register');
			exit;
		}

		// Email belum ada, lanjutkan proses registrasi
		if ($userModel->tambahUser($_POST) > 0) {
			$_SESSION['pesan'] = 'Register Berhasil!';
			header('Location: ' . BASEURL . '/auth/login');
			exit;
		} else {
			$_SESSION['pesan'] = 'Register Gagal';
			header('Location: ' . BASEURL . '/auth/register');
			exit;
		}
	}

	public function logout()
	{
		// Hapus semua data sesi
		session_unset();

		// Hancurkan sesi
		session_destroy();

		session_start();
		$_SESSION['pesan'] = 'Anda berhasil logout';
		// Arahkan pengguna ke halaman login
		header('Location: ' . BASEURL . '/auth/login');
		exit;
	}
}
