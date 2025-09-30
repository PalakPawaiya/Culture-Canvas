<?php

namespace App\Models;

use CodeIgniter\Model;

class ThumbnailModel extends Model
{
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}
	public  function saveThumbnail($save)
	{
		$builder = $this->db->table('videothumbnails');
		if ($builder->insert($save)) {
			return True;
		} else {
			return False;
		}
	}
	public function getTotalThumbnail()
	{
		$builder = $this->db->table('videothumbnails');
		$builder->where('status', 'active'); 
		$builderQry = $builder->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getNumRows();
		} else {
			return false;
		}
	}

	public function getThumbnail()
	{
		$builder = $this->db->table('videothumbnails tmb');
		$builder->select('tmb.*, ct.category_name');
		$builder->join('categories ct', 'ct.id = tmb.category_id', 'inner');
		$builder->where(array('tmb.status !=' => 'deleted'));
		$builderQry = $builder->get();

		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getResultArray();
		}
	}
	public function getThumbnailById($id)
	{
		$where = "id=$id";
		$builder = $this->db->table('videothumbnails');
		$builderQry = $builder->select('*')->where($where)->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getResultArray();
		}
	}
	public function updateThumbnail($id, $data)
	{
		$where = "id=$id";
		$builder = $this->db->table('videothumbnails');
		$builder->where($where);
		if ($builder->update($data)) {
			return true;
		} else {
			return false;
		}
	}

	public  function deleteThumbnail($id)
	{

		$deleteArr = array(
			'status' => 'deleted'

		);

		$where = "id=$id";
		$builder = $this->db->table('videothumbnails');

		$builder->where($where);
		if ($builder->update($deleteArr)) {
			return true;
		} else {
			return false;
		}
	}
	public function inactiveThumbnail($id, $status)
	{
		$currentStatus = $status == 'Active' ? 'Inactive' : 'Active';
		$statusArr = array(
			'status' => $currentStatus
		);


		$where = "id=$id";

		$builder = $this->db->table('videothumbnails');
		$builder->where($where);


		if ($builder->update($statusArr)) {

			return true;
		} else {
			return false;
		}
	}
	public function getthumbnailByCategoryID($id)
	{
		$builder = $this->db->table('videothumbnails tmb');
		$builder->select('tmb.*, ct.category_name');
		$builder->join('categories ct', 'ct.id = tmb.category_id', 'inner');
		$builder->where(array('category_id' => $id, 'tmb.status !=' => 'deleted'));
		$builderQry = $builder->get();
		//	echo $builderQry->getNumRows(); exit;
		if ($builderQry->getNumRows() >= 1) {
			//	print_r($builderQry->getResultArray()); exit;
			return $builderQry->getResultArray();
		}
	}
	public function getthumbnails($limit = null)
	{


		$builder = $this->db->table('videothumbnails');
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
public function getThumbnailss($perPage = 6, $page = 1, $search = null)
{
    $builder = $this->db->table('videothumbnails');

    if (!empty($search)) {
        $builder->like('title', $search)
                ->orLike('description', $search);
    }

    // Total count for pagination
    $total = $builder->countAllResults(false); // false = reset query nahi kare

    // Offset calculate karo
    $offset = ($page - 1) * $perPage;

    $builder->limit($perPage, $offset);

    $data = $builder->get()->getResultArray();

    return [
        'data'  => $data,
        'total' => $total,
        'page'  => $page,
        'perPage' => $perPage,
        'totalPages' => ceil($total / $perPage)
    ];
}
}
