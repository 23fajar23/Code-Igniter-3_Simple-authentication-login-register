<?php

class Batch_model extends CI_Model
{
	function get_batch()
	{
		$query = $this->db->get('batch');
		$res = $query->result();
		return $res;
	}
}
