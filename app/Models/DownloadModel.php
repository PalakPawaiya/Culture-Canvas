<?php

namespace App\Models;
use CodeIgniter\Model;

class DownloadModel extends Model
{
   
  
		public function __construct()
	{
		$this->db = \Config\Database::connect();
	}
    // Count total downloads for one ppt
   public function addDownload( $pptId)
    {
        $builder = $this->db->table('downloads');
        return $builder->insert([
           
            'ppt_id'     => $pptId,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    // Count all downloads for this PPT
    
    public function countDownloadsById()
    {
        $builder = $this->db->table('downloads');
        $builder->select('ppt_id, COUNT(id) as no_of_downloads');
       $builder->groupBy('ppt_id');
        return $builder->get()->getResultArray();
       //return $row['total'] ?? 0;
    }
     public function countDownloads()
    {
        $builder = $this->db->table('downloads');
        $builder->selectCount('id', 'total');
       
        $row = $builder->get()->getRowArray();
        return $row['total'] ?? 0;
    }

    // Count downloads by this user for this PPT
    public function userDownloadCount($userId, $pptId)
    {
        $builder = $this->db->table('downloads');
        $builder->selectCount('id', 'total');
        $builder->where('user_id', $userId);
        $builder->where('ppt_id', $pptId);
        $row = $builder->get()->getRowArray();
        return $row['total'] ?? 0;
    }

}