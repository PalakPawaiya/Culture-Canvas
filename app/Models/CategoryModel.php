<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
		public function __construct()
	{
		$this->db = \Config\Database::connect();
	}
    public  function savecategories($save)
	{
		$builder = $this->db->table('categories');
		if ($builder->insert($save)) {
			return True;
		} else {
			return False;
		}
	}
public function getTotalCategories(){
		$builder = $this->db->table('categories');
		$builder->where('status', 'active'); 
		$builderQry = $builder->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getNumRows();
		}else{
			return false;
		}
		
	}

	public function getCategories()
	{
		
		$builder = $this->db->table('categories');
		$builderQry = $builder->select('*')->where(array('status !=' => 'deleted'))->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getResultArray();
		}
	}
    public function getCategoriesById($id)
	{
		
		$where = "id=$id";
		$builder = $this->db->table('categories');
		$builderQry = $builder->select('*')->where($where)->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getResultArray();
		}
	}
    public function updateCategories($id, $data)
	{
		$where = "id=$id";
		$builder = $this->db->table('categories');
		$builder->where($where);
		if ($builder->update($data)) {
			return true;
		} else {
			return false;
		}
	}

	public  function deleteCategories($id)
	{

		$deleteArr = array(
			'status' => 'deleted'

		);

		$where = "id=$id";
		$builder = $this->db->table('categories');

		$builder->where($where);
		if ($builder->update($deleteArr)) {
			return true;
		} else {
			return false;
		}
	}
	public function inactiveCategories($id, $status)
	{
		$currentStatus = $status == 'Active' ? 'Inactive' : 'Active';
		$statusArr = array(
			'status' => $currentStatus
		);


		$where = "id=$id";
		
		$builder = $this->db->table('categories');
		$builder->where($where);

	
		if ($builder->update($statusArr)) {

			return true;
		} else {
			return false;
		}
	}
	public function getCategory($limit = null)
	{
		$builder = $this->db->table('categories');
		$builder = $builder->select('*')
			->where('status =', 'Active');
			 if ($limit) {
        $builder->limit($limit); // ✅ limit lagti hai query run hone se pehle
    }
			   $query = $builder->get();
		

		if ($query->getNumRows() >= 1) {
			return $query->getResultArray();
		}

		return []; // agar data na mile to empty array bhejo
	}
	
}