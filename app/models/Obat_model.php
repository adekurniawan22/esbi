<?php
class Obat_model
{
	private $table = 'obat';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllObat()
	{
		$this->db->query('SELECT obat.*, users.nama AS nama_user FROM ' . $this->table . ' AS obat JOIN users ON obat.id_user = users.id_user');
		return $this->db->resultSet();
	}


	public function tambahDataObat($data)
	{
		$query = "INSERT INTO obat VALUES
				('', :nama_obat, :stok, :harga, :id_user)";
		$this->db->query($query);
		$this->db->bind('nama_obat', $data['nama_obat']);
		$this->db->bind('stok', $data['stok']);
		$this->db->bind('harga', $data['harga']);
		$this->db->bind('id_user', $_SESSION['id_user']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataObat($id_obat)
	{
		$query = "DELETE FROM obat WHERE id_obat=:id_obat";
		$this->db->query($query);
		$this->db->bind('id_obat', $id_obat);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function editDataObat($data)
	{
		$query = "UPDATE obat SET
			nama_obat=:nama_obat,
			stok=:stok,
			harga=:harga
			WHERE id_obat=:id_obat";
		$this->db->query($query);
		$this->db->bind('id_obat', $data['id_obat']);
		$this->db->bind('nama_obat', $data['nama_obat']);
		$this->db->bind('stok', $data['stok']);
		$this->db->bind('harga', $data['harga']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function hitungJumlahObat()
	{
		$this->db->query('SELECT COUNT(*) AS total_obat FROM ' . $this->table);
		return $this->db->single()['total_obat'];
	}

	public function hitungObatStokDibawah10()
	{
		$this->db->query('SELECT COUNT(*) AS total_obat_stok_dibawah_10 FROM ' . $this->table . ' WHERE stok < 10');
		return $this->db->single()['total_obat_stok_dibawah_10'];
	}

	public function hitungObatStokNol()
	{
		$this->db->query('SELECT COUNT(*) AS total_obat_stok_nol FROM ' . $this->table . ' WHERE stok = 0');
		return $this->db->single()['total_obat_stok_nol'];
	}
}
