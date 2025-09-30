<?php

namespace App\Models;

use CodeIgniter\Model;

class UserlogsModel extends Model
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}
	public function checkUser($conditionArray)
	{
		$builder = $this->db->table('userlogs');
		$builder->where($conditionArray);
		$builderQry = $builder->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getResultArray();
		} else {
			return false;
		}
	}
	 public  function saveuser($save)
	{
		$builder = $this->db->table('userlogs');
		if ($builder->insert($save)) {
			return True;
		} else {
			return False;
		}
	}
}
