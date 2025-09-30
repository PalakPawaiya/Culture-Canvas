<?php

namespace App\Models;

use CodeIgniter\Model;

class PptModel extends Model
{
		public function __construct()
	{
		$this->db = \Config\Database::connect();
	}
    public  function saveppt($save)
	{
		$builder = $this->db->table('ppts');
		if ($builder->insert($save)) {
			return True;
		} else {
			return False;
		}
	}
public function getTotalppt(){

		$builder = $this->db->table('ppts');
		$builder->where('status', 'active'); 
		$builderQry = $builder->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getNumRows();
		}else{
			return false;
		}
		
	}

	public function getppt()
	{
		
	 $builder = $this->db->table('ppts ppt');
		 $builder->select('ppt.*, ct.category_name');
		 $builder->join('categories ct', 'ct.id = ppt.category_id','inner');
		  $builder->where(array('ppt.status !='=>'deleted'));
		 $builderQry = $builder->get();
		
			return $builderQry->getResultArray();
		}
	
    public function getpptById($id)
	{
		$where = "id=$id";
		$builder = $this->db->table('ppts');
		$builderQry = $builder->select('*')->where($where)->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getResultArray();
		}
	}
    public function updateppt($id, $data)
	{
		$where = "id=$id";
		$builder = $this->db->table('ppts');
		$builder->where($where);
		if ($builder->update($data)) {
			return true;
		} else {
			return false;
		}
	}
	

	public  function deleteppt($id)
	{

		$deleteArr = array(
			'status' => 'deleted'

		);

		$where = "id=$id";
		$builder = $this->db->table('ppts');

		$builder->where($where);
		if ($builder->update($deleteArr)) {
			return true;
		} else {
			return false;
		}
	}
	public function inactiveppt($id, $status)
	{
		$currentStatus = $status == 'Active' ? 'Inactive' : 'Active';
		$statusArr = array(
			'status' => $currentStatus
		);


		$where = "id=$id";
		
		$builder = $this->db->table('ppts');
		$builder->where($where);

	
		if ($builder->update($statusArr)) {

			return true;
		} else {
			return false;
		}
	}
	public function getPptByCategoryID($id)
	{
		 $builder = $this->db->table('ppts ppt');
		 $builder->select('ppt.*, ct.category_name');
		 $builder->join('categories ct', 'ct.id = ppt.category_id','inner');
		  $builder->where(array( 'category_id' => $id ,'ppt.status !='=>'deleted'));
		 $builderQry = $builder->get();
	//	echo $builderQry->getNumRows(); exit;
		if ($builderQry->getNumRows() >= 1) {
		//	print_r($builderQry->getResultArray()); exit;
			return $builderQry->getResultArray();
		}
	}
	public function getppts($limit = null)
	{


		$builder = $this->db->table('ppts');
		$builder = $builder->select('*')
			->where('status =', 'Active');
			 if ($limit) {
        $builder->limit($limit); // 
    }
			   $query = $builder->get();
		

		if ($query->getNumRows() >= 1) {
			return $query->getResultArray();
		}

		return []; 
	}
}