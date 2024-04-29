<?php

class User_model extends CI_Model
{
	function is_username_exist($username)
	{
		$query = $this->db->get_where('user', array('username' => $username));
		return $query->num_rows() > 0;
	}

	function register_user($data)
	{
		$username = $data['username'];
        
        if ($this->is_username_exist($username)) {
            return "Username sudah ada, silakan gunakan username lain.";
        } else {
            $this->db->insert('user', $data);
            return "Registrasi berhasil.";
        }
	}

	function login($username, $password){
		$query = $this->db->get_where('user', array('username' => $username, 'password' => $password));

		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return null;
		}
	}
}
