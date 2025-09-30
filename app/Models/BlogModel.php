<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
		public function __construct()
	{
		$this->db = \Config\Database::connect();
	}
    public  function saveblog($save)
	{
		$builder = $this->db->table('blogs');
		if ($builder->insert($save)) {
			return True;
		} else {
			return False;
		}
	}
public function getTotalBlog(){
		$builder = $this->db->table('blogs');
		$builder->where('status', 'active'); 
		$builderQry = $builder->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getNumRows();
		}else{
			return false;
		}
		
	}

	public function getblog()
	{
		 $builder = $this->db->table('blogs blg');
		 $builder->select('blg.*, ct.category_name');
		 $builder->join('categories ct', 'ct.id = blg.category_id','inner');
		  $builder->where(array('blg.status !='=>'deleted'));
		 $builderQry = $builder->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getResultArray();
		}
	}
    public function getBlogById($id)
	{
		$where = "id=$id";
		$builder = $this->db->table('blogs');
		$builderQry = $builder->select('*')->where($where)->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getResultArray();
		}
	}
    public function updateblog($id, $data)
	{
		$where = "id=$id";
		$builder = $this->db->table('blogs');
		$builder->where($where);
		if ($builder->update($data)) {
			return true;
		} else {
			return false;
		}
	}

	public  function deleteblog($id)
	{

		$deleteArr = array(
			'status' => 'deleted'

		);

		$where = "id=$id";
		$builder = $this->db->table('blogs');

		$builder->where($where);
		if ($builder->update($deleteArr)) {
			return true;
		} else {
			return false;
		}
	}
	public function inactiveblog($id, $status)
	{
		$currentStatus = $status == 'Active' ? 'Inactive' : 'Active';
		$statusArr = array(
			'status' => $currentStatus
		);


		$where = "id=$id";
		
		$builder = $this->db->table('blogs');
		$builder->where($where);

	
		if ($builder->update($statusArr)) {

			return true;
		} else {
			return false;
		}
	}
	public function getBlogByCategoryID($id)
	{
		 $builder = $this->db->table('blogs blog');
		 $builder->select('blog.*, ct.category_name');
		 $builder->join('categories ct', 'ct.id = blog.category_id','inner');
		  $builder->where(array( 'category_id' => $id ,'blog.status !='=>'deleted'));
		 $builderQry = $builder->get();
	//	echo $builderQry->getNumRows(); exit;
		if ($builderQry->getNumRows() >= 1) {
		//	print_r($builderQry->getResultArray()); exit;
			return $builderQry->getResultArray();
		}
	}
	public function getblogs($limit = null)
	{


		$builder = $this->db->table('blogs');
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