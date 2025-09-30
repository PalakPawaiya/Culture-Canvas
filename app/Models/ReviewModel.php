<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
		public function __construct()
	{
		$this->db = \Config\Database::connect();
	}

public function saveReview()
{
    $builder = $this->db->table('reviews');
    if ($builder->insert($save)) {
        return true;
    }
    return false;

}
public function getTotalreviews(){
    $builder = $this->db->table('reviews');
   $builderQry = $builder->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getNumRows();
		}else{
			return false;
		}
}

public function getreviews()
{
   $builder = $this->db->table('reviews');
		$builderQry = $builder->select('*')->where(array('status !=' => 'deleted'))->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getResultArray();
		}
}


public function getReviewById($id)
{
   $where = "id=$id";
		$builder = $this->db->table('reviews');
		$builderQry = $builder->select('*')->where($where)->get();
		if ($builderQry->getNumRows() >= 1) {
			return $builderQry->getResultArray();
		}
}

public function updateReview($id, $data)
{
    $where = "id=$id";
		$builder = $this->db->table('reviews');
		$builder->where($where);
		if ($builder->update($data)) {
			return true;
		} else {
			return false;
		}
}

public function deleteReview($id)
{
    $deleteArr = array(
			'status' => 'deleted'

		);

		$where = "id=$id";
		$builder = $this->db->table('reviews');

		$builder->where($where);
		if ($builder->update($deleteArr)) {
			return true;
		} else {
			return false;
		}
}
public function inactiveReview($id, $status)
	{
		$currentStatus = $status == 'Active' ? 'Inactive' : 'Active';
		$statusArr = array(
			'status' => $currentStatus
		);


		$where = "id=$id";
		
		$builder = $this->db->table('reviews');
		$builder->where($where);

	
		if ($builder->update($statusArr)) {

			return true;
		} else {
			return false;
		}
	}

public function getReviewCountByUserId($userId)
{
    $builder = $this->db->table('reviews');
    $builderQry = $builder->select('*')->where(array('user_id' => $userId))->get();
    if ($builderQry->getNumRows() >= 1) {
        return $builderQry->getNumRows();
    } else {
        return false;
    }
}
public function getReviewByThumbnailID($id)
	{
		 $builder = $this->db->table('videothumbnails tmb');
		 $builder->select('tmb.*, rv.review_type');
		 $builder->join('reviews rv', 'rv.id = tmb.category_id','inner');
		  $builder->where(array( 'review_type' => $id ,'tmb.status !='=>'deleted'));
         $builderQry = $builder->get();
		 if ($builderQry->getNumRows() >= 1) {
            return $builderQry->getResultArray();
        }
	}
}