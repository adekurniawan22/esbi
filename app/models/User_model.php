<?php
class User_model
{
	private $table = 'users';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllUsers()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getUserByEmail($email)
	{
		$query = "SELECT * FROM " . $this->table . " WHERE email = :email";
		$this->db->query($query);
		$this->db->bind('email', $email);
		return $this->db->single();
	}

	public function tambahUser($data)
	{
		$query = "INSERT INTO " . $this->table . " VALUES
            ('', :nama, :email, :password)";
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('email', $data['email']);

		// Hash password menggunakan password_hash
		$hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
		$this->db->bind('password', $hashedPassword);

		$this->db->execute();

		return $this->db->rowCount();
	}
}
